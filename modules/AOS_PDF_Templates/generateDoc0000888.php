<?php
    require_once('modules/AOS_PDF_Templates/clsMsDocGenerator.php');

    require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
    require_once('modules/AOS_PDF_Templates/templateParser.php');
    require_once('modules/AOS_PDF_Templates/sendEmail.php');
    require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');
    global $mod_strings;



    $module = new Contract(); 
    $module_type = $_REQUEST['module']; 
    $module_type_file = strtoupper(ltrim(rtrim($module_type,'s'),''));
    $module_type_low = strtolower($module_type);
    $module->retrieve($_REQUEST['contractid']);

    $task = $_REQUEST['task'];
    $doc = new clsMsDocGenerator();

    $contractvalue = array();
    $sql = "SELECT * FROM contract_values WHERE contract_value_id ='".$module->id."'and deleted = 0";
    $res = $module->db->query($sql);
    while($row = $module->db->fetchByAssoc($res)){
        $contractvalue[$row['id']] = $row['contract_value_id'];
    }
    
    $contract_condition = array();
    $sql1 = "SELECT * FROM contract_conditions WHERE contract_condition_id ='".$module->id."' AND deleted = 0";
    $res1 = $module->db->query($sql1);
    while($row1 = $module->db->fetchByAssoc($res1)){
        $contract_condition[$row1['id']] = $row1['contract_condition_id'];
    }
    
    $transport_contract = array();
    $sql2 = "SELECT * FROM transportcontracts WHERE contract_id='".$this->id."' AND deleted =0";
    $res2 = $module->db->query($sql2);
    while($row2 = $module->db->fetchByAssoc($res2)){
        $transport_contract[$row2['id']] = $row2['contract_id'];
    }
    $doc->setFontFamily("Time New Roman");

    $template = new AOS_PDF_Templates();
    $template->retrieve($_REQUEST['templateID']);

    $object_arr = array();
    $object_arr[$module_type] = $module->id;


    $search = array ('@<script[^>]*?>.*?</script>@si',         // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',        // Strip out HTML tags
    '@([\r\n])[\s]+@',            // Strip out white space
    '@&(quot|#34);@i',            // Replace HTML entities
    '@&(amp|#38);@i',
    '@&(lt|#60);@i',
    '@&(gt|#62);@i',
    '@&(nbsp|#160);@i',
    '@&(iexcl|#161);@i',
    '@&#(\d+);@e',
    '@<address[^>]*?>@si'
    );

    $replace = array ('',
    '',
    '\1',
    '"',
    '&',
    '<',
    '>',
    ' ',
    chr(161),
    'chr(\1)',
    '<br>'
    );

    $header = preg_replace($search, $replace, $template->pdfheader);
    $footer = preg_replace($search, $replace, $template->pdffooter);
    $text = preg_replace($search, $replace, $template->description);   
    $text = preg_replace('/\{DATE\s+(.*?)\}/e',"date('\\1')",$text );
    $text = str_replace("\$contracts","\$".$module_type_low,$text); 
    $text = str_replace("\$travelguide_name","Bui cao Học",$text);   
    $printable = str_replace("\n","<br />",$text);

    global    $sugar_config;

    $firstValue = '';
    $firstNum = 0;

    $lastValue = '';
    $lastNum = 0;
     
    $contract_value = new ContractValue();
    foreach($contract_value->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
            $curNum = strpos($text,'$'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = $name;
                    $firstNum = $curNum;
                }
                else if($curNum > $lastNum){
                    $lastValue = $name;
                    $lastNum = $curNum;
                }
            }
        }
    }
    
    if($firstValue !== '' && $lastvalue !== ''){
        //Converting Text
        $parts = explode($firstValue,$text);
        $text = $parts[0];
        $parts = explode($lastValue,$parts[1]);
        $linePart = $firstValue . $parts[0] . $lastValue;
        if(count($contract_condition) != 0){
            //Read line start <tr> value
            $tcount = strrpos($text,"<tr");
            $lsValue = substr($text,$tcount);
            $tcount = strpos($lsValue,">")+1;
            $lsValue = substr($lsValue,0,$tcount);
        
            //Read line end values
            $tcount=strpos($parts[1],"</tr>")+5;
            $leValue = substr($parts[1],0,$tcount);
            
            //Converting Line contract condition
            $obb = array();
            $sep = '';
            $tdTemp = explode($lsValue,$text);
            foreach($contractvalue as $id => $contractId){
                $obb['ContractValue'] = $id;
                $obb['Contracts'] = $contractId;
                $text .= $sep . templateParser::parse_template($linePart, $obb);
                $sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
            }
        }
        else{
            $tcount = strrpos($text,"<tr");
            $text = substr($text,0,$tcount);
            
            $tcount=strpos($parts[1],"</tr>")+5;
            $parts[1]= substr($parts[1],$tcount);
        }
        $text .= $parts[1];
    }

    $firstValue = '';
    $firstNum = 0;
    
    $lastValue = '';
    $lastNum = 0;
    //Find first and last valid line values
    $contractcondition = new ContractCondition();
    foreach($contractcondition->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
            $curNum = strpos($text,'$'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = $name;
                    $firstNum = $curNum;
                }
                else if($curNum > $lastNum){
                    $lastValue = $name;
                    $lastNum = $curNum;
                }
            }
        }
    }
    if($firstValue !== '' && $lastvalue !== ''){
        //Converting Text
        $parts = explode($firstValue,$text);
        $text = $parts[0];
        $parts = explode($lastValue,$parts[1]);
        $linePart = $firstValue . $parts[0] . $lastValue;
        if(count($contract_condition) != 0){
            //Read line start <tr> value
            $tcount = strrpos($text,"<tr");
            $lsValue = substr($text,$tcount);
            $tcount=strpos($lsValue,">")+1;
            $lsValue = substr($lsValue,0,$tcount);
        
            //Read line end values
            $tcount=strpos($parts[1],"</tr>")+5;
            $leValue = substr($parts[1],0,$tcount);
            
            //Converting Line contract condition
            $obb = array();
            $sep = '';
            $tdTemp = explode($lsValue,$text);
            foreach($contract_condition as $id => $contractId){
                $obb['ContractCondition'] = $id;
                $obb['Contracts'] = $contractId;
                $text .= $sep . templateParser::parse_template($linePart, $obb);
                $sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
            }
        }
        else{
            $tcount = strrpos($text,"<tr");
            $text = substr($text,0,$tcount);
            
            $tcount=strpos($parts[1],"</tr>")+5;
            $parts[1]= substr($parts[1],$tcount);
        }
        $text .= $parts[1];
    }
    
    $firstValue = '';
    $firstNum = 0;
    
    $lastValue = '';
    $lastNum = 0;
    
    $transportcontract = new TransportContracts();
        foreach($transportcontract->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
            $curNum = strpos($text,'$'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = $name;
                    $firstNum = $curNum;
                }
                else if($curNum > $lastNum){
                    $lastValue = $name;
                    $lastNum = $curNum;
                }
            }
        }
    }
    
    if($firstValue !== '' && $lastvalue !== ''){
        //Converting Text
        $parts = explode($firstValue,$text);
        $text = $parts[0];
        $parts = explode($lastValue,$parts[1]);
        $linePart = $firstValue . $parts[0] . $lastValue;
        if(count($contract_condition) != 0){
            //Read line start <tr> value
            $tcount = strrpos($text,"<tr");
            $lsValue = substr($text,$tcount);
            $tcount=strpos($lsValue,">")+1;
            $lsValue = substr($lsValue,0,$tcount);
        
            //Read line end values
            $tcount=strpos($parts[1],"</tr>")+5;
            $leValue = substr($parts[1],0,$tcount);
            
            //Converting Line contract condition
            $obb = array();
            $sep = '';
            $tdTemp = explode($lsValue,$text);
            foreach($transport_contract as $id => $contractId){
                $obb['TransportContracts'] = $id;
                $obb['Contracts'] = $contractId;
                $text .= $sep . templateParser::parse_template($linePart, $obb);
                $sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
            }
        }
        else{
            $tcount = strrpos($text,"<tr");
            $text = substr($text,0,$tcount);
            
            $tcount=strpos($parts[1],"</tr>")+5;
            $parts[1]= substr($parts[1],$tcount);
        }
        $text .= $parts[1];
    }
    $converted = templateParser::parse_template($text, $object_arr);
    $header = templateParser::parse_template($header, $object_arr);
    $footer = templateParser::parse_template($footer, $object_arr);
    $printable = str_replace("\n","<br />",$converted); 

    $doc->setCSSFile("modules/AOS_PDF_Templates/export.css");
    $doc->newSession("WordSection1", $sugar_config['site_url'].'/modules/AOS_PDF_Templates/test_files/header.htm', $sugar_config['site_url'].'/modules/AOS_PDF_Templates/test_files/header.htm' );
    $doc->addText($printable);
    $doc->endSession();


    $file_name = "HopDong.doc"; 


    $doc->output("$file_name");
?>