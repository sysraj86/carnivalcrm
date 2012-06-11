<?php
    require_once('modules/AOS_PDF_Templates/clsMsDocGenerator.php');
    require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
    require_once('modules/AOS_PDF_Templates/templateParser.php');
    require_once('modules/AOS_PDF_Templates/sendEmail.php');
    require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');
    global $mod_strings;
    global $db;

    $module_type = $_REQUEST['module'];
    $module = new ContractAppendixs(); 
                         
    $module_type_file = strtoupper(ltrim(rtrim($module_type,'s'),''));
    $module_type_low = strtolower($module_type);
    $module->retrieve($_REQUEST['contractid']);

    $task = $_REQUEST['task'];
    $doc = new clsMsDocGenerator();

    $contractappendixvalue = array();
    $sql = "SELECT * FROM contractappendixvalues WHERE contract_appendixs_value_id ='".$module->id."'and deleted = 0";
    $res = $module->db->query($sql);
    while($row = $module->db->fetchByAssoc($res)){
        $contractappendixvalue[$row['id']] = $row['contract_appendixs_value_id'];
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

    $contract = new Contract();
    $contract->retrieve($module->contract);
    $object_arr = array();
    $object_arr[$module_type] = $module->id;
    $object_arr['Contracts'] = $contract->id;


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
      
    $printable = str_replace("\r\n","<br />",$text);

    global    $sugar_config;

    $firstValue = '';
    $firstNum = 0;

    $lastValue = '';
    $lastNum = 0;

    $contractappendixvalues = new ContractAppendixValues();
    foreach($contractappendixvalues->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
            $curNum = strpos($text,'$contractappendixvalues_'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = '$contractappendixvalues_'.$name;
                    $firstNum = $curNum;
                }
                else if($curNum > $lastNum){
                        $lastValue = '$contractappendixvalues_'.$name;
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
        if(count($contractappendixvalue) != 0){
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
            foreach($contractappendixvalue as $id => $contractappendixId){
                $obb['ContractAppendixValues'] = $id;
                $obb['ContractAppendixs'] = $contractappendixId;
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
            $curNum = strpos($text,'$contractconditions_'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = '$contractconditions_'.$name;
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
            foreach($contract_condition as $id => $contractappendixId){
                $obb['ContractCondition'] = $id;
                $obb['ContractAppendixs'] = $contractappendixId;
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
            $curNum = strpos($text,'$transportcontracts_'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = '$transportcontracts_'.$name;
                    $firstNum = $curNum;
                }
                else if($curNum > $lastNum){
                        $lastValue = '$transportcontracts_'.$name;
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
        if(count($transport_contract) != 0){
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
            foreach($transport_contract as $id => $contractappendixId){
                $obb['TransportContracts'] = $id;
                $obb['ContractAppendixs'] = $contractappendixId;
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

    //$doc->setCSSFile("modules/AOS_PDF_Templates/export.css");
    //$doc->newSession("WordSection1", $sugar_config['site_url'].'/modules/AOS_PDF_Templates/test_files/header.htm', $sugar_config['site_url'].'/modules/AOS_PDF_Templates/test_files/header.htm' );
    //$doc->addText($printable);
    //$doc->endSession();

    $header_t =    '<html xmlns:v="urn:schemas-microsoft-com:vml"
                xmlns:o="urn:schemas-microsoft-com:office:office"
                xmlns:w="urn:schemas-microsoft-com:office:word"
                xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
                xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
                xmlns="http://www.w3.org/TR/REC-html40">

    <head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <meta name=ProgId content=Word.Document>
    <meta name=Generator content="Microsoft Word 14">
    <meta name=Originator content="Microsoft Word 14">

    <link rel=File-List href="'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/filelist.xml">
    <!--[if !mso]>
    <style>
    v\:* {behavior:url(#default#VML);}
    o\:* {behavior:url(#default#VML);}
    w\:* {behavior:url(#default#VML);}
    .shape {behavior:url(#default#VML);}
    </style>
    <![endif]-->
    <title>Ms</title>
    <o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
    name="place"/>
    <o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
    name="country-region"/>
    <o:SmartTagType namespaceuri="urn:schemas-microsoft-com:office:smarttags"
    name="City"/>

    <!--[if gte mso 9]><xml>
    <o:DocumentProperties>
    <o:Author>zen</o:Author>
    <o:Template>Template</o:Template>
    <o:LastAuthor>HocBui</o:LastAuthor>
    <o:Revision>2</o:Revision>
    <o:TotalTime>1</o:TotalTime>
    <o:LastPrinted>2011-01-12T00:38:00Z</o:LastPrinted>
    <o:Created>2011-09-29T09:20:00Z</o:Created>
    <o:LastSaved>2011-09-29T09:20:00Z</o:LastSaved>
    <o:Pages>1</o:Pages>
    <o:Words>2</o:Words>
    <o:Characters>13</o:Characters>
    <o:Company>DongTam Group</o:Company>
    <o:Lines>1</o:Lines>
    <o:Paragraphs>1</o:Paragraphs>
    <o:CharactersWithSpaces>14</o:CharactersWithSpaces>
    <o:Version>14.00</o:Version>
    </o:DocumentProperties>
    <o:OfficeDocumentSettings>
    <o:RelyOnVML/>
    <o:AllowPNG/>
    <o:TargetScreenSize>800x600</o:TargetScreenSize>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->

    <link rel=dataStoreItem href="'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/item0001.xml" target="'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/props002.xml">
    <link rel=themeData href="'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/themedata.thmx">
    <link rel=colorSchemeMapping href="'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/colorschememapping.xml">

    <!--[if gte mso 9]><xml>
    <w:WordDocument>
    <w:View>Print</w:View> 
    <w:SpellingState>Clean</w:SpellingState>
    <w:GrammarState>Clean</w:GrammarState>
    <w:TrackMoves>false</w:TrackMoves>
    <w:TrackFormatting/>
    <w:PunctuationKerning/>
    <w:DrawingGridHorizontalSpacing>5.5 pt</w:DrawingGridHorizontalSpacing>
    <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
    <w:ValidateAgainstSchemas/>
    <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
    <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
    <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
    <w:DoNotPromoteQF/>
    <w:LidThemeOther>EN-US</w:LidThemeOther>
    <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
    <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
    <w:Compatibility>
    <w:BreakWrappedTables/>
    <w:SnapToGridInCell/>
    <w:WrapTextWithPunct/>
    <w:UseAsianBreakRules/>
    <w:DontGrowAutofit/>
    <w:DontUseIndentAsNumberingTabStop/>
    <w:FELineBreak11/>
    <w:WW11IndentRules/>
    <w:DontAutofitConstrainedTables/>
    <w:AutofitLikeWW11/>
    <w:HangulWidthLikeWW11/>
    <w:UseNormalStyleForList/>
    <w:SplitPgBreakAndParaMark/>
    <w:DontVertAlignCellWithSp/>
    <w:DontBreakConstrainedForcedTables/>
    <w:DontVertAlignInTxbx/>
    <w:Word11KerningPairs/>
    <w:CachedColBalance/>
    </w:Compatibility>
    <m:mathPr>
    <m:mathFont m:val="Cambria Math"/>
    <m:brkBin m:val="before"/>
    <m:brkBinSub m:val="&#45;-"/>
    <m:smallFrac m:val="off"/>
    <m:dispDef/>
    <m:lMargin m:val="0"/>
    <m:rMargin m:val="0"/>
    <m:defJc m:val="centerGroup"/>
    <m:wrapIndent m:val="1440"/>
    <m:intLim m:val="subSup"/>
    <m:naryLim m:val="undOvr"/>
    </m:mathPr></w:WordDocument>
    </xml><![endif]-->
    <!--[if gte mso 9]><xml>
    <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
    DefSemiHidden="true" DefQFormat="false" DefPriority="99"
    LatentStyleCount="267">
    <w:LsdException Locked="false" Priority="0" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
    <w:LsdException Locked="false" Priority="9" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
    <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
    <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
    <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
    <w:LsdException Locked="false" Priority="10" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Title"/>
    <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
    <w:LsdException Locked="false" Priority="0" Name="Body Text"/>
    <w:LsdException Locked="false" Priority="11" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
    <w:LsdException Locked="false" Priority="22" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
    <w:LsdException Locked="false" Priority="20" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
    <w:LsdException Locked="false" Priority="59" SemiHidden="false"
    UnhideWhenUsed="false" Name="Table Grid"/>
    <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
    <w:LsdException Locked="false" Priority="1" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List Accent 1"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
    <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
    <w:LsdException Locked="false" Priority="34" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
    <w:LsdException Locked="false" Priority="29" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
    <w:LsdException Locked="false" Priority="30" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List Accent 1"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List Accent 2"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List Accent 2"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List Accent 3"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List Accent 3"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List Accent 4"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List Accent 4"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List Accent 5"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List Accent 5"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
    <w:LsdException Locked="false" Priority="60" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
    <w:LsdException Locked="false" Priority="61" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light List Accent 6"/>
    <w:LsdException Locked="false" Priority="62" SemiHidden="false"
    UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
    <w:LsdException Locked="false" Priority="63" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
    <w:LsdException Locked="false" Priority="64" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
    <w:LsdException Locked="false" Priority="65" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
    <w:LsdException Locked="false" Priority="66" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
    <w:LsdException Locked="false" Priority="67" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
    <w:LsdException Locked="false" Priority="68" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
    <w:LsdException Locked="false" Priority="69" SemiHidden="false"
    UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
    <w:LsdException Locked="false" Priority="70" SemiHidden="false"
    UnhideWhenUsed="false" Name="Dark List Accent 6"/>
    <w:LsdException Locked="false" Priority="71" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
    <w:LsdException Locked="false" Priority="72" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
    <w:LsdException Locked="false" Priority="73" SemiHidden="false"
    UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
    <w:LsdException Locked="false" Priority="19" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
    <w:LsdException Locked="false" Priority="21" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
    <w:LsdException Locked="false" Priority="31" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
    <w:LsdException Locked="false" Priority="32" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
    <w:LsdException Locked="false" Priority="33" SemiHidden="false"
    UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
    <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
    <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
    </w:LatentStyles>
    </xml><![endif]-->

    ';
    $doc->addText($header_t);

    //style
    $style_t = '<style>
    <!--
    /* Font Definitions */
    @font-face
    {font-family:Calibri;
    panose-1:2 15 5 2 2 2 4 3 2 4;
    mso-font-charset:0;
    mso-generic-font-family:swiss;
    mso-font-pitch:variable;
    mso-font-signature:-520092929 1073786111 9 0 415 0;}
    @font-face
    {font-family:Tahoma;
    panose-1:2 11 6 4 3 5 4 4 2 4;
    mso-font-charset:0;
    mso-generic-font-family:swiss;
    mso-font-pitch:variable;
    mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
    /* Style Definitions */
    p.MsoNormal, li.MsoNormal, div.MsoNormal
    {mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-parent:"";
    margin-top:0in;
    margin-right:0in;
    margin-bottom:10.0pt;
    margin-left:0in;
    line-height:115%;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
    p.MsoHeader, li.MsoHeader, div.MsoHeader
    {mso-style-priority:99;
    mso-style-link:"Header Char";
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.25in right 6.5in;
    font-size:11.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
    p.MsoFooter, li.MsoFooter, div.MsoFooter
    {mso-style-priority:99;
    mso-style-link:"Footer Char";
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.25in right 6.5in;
    font-size:11.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
    p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
    {mso-style-noshow:yes;
    mso-style-link:"Body Text Char";
    margin:0in;
    margin-bottom:.0001pt;
    text-align:justify;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    mso-bidi-font-size:10.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";
    mso-bidi-font-family:Arial;
    mso-ansi-language:VI;
    mso-bidi-font-style:italic;}
    a:link, span.MsoHyperlink
    {mso-style-noshow:yes;
    mso-style-priority:99;
    mso-style-parent:"";
    color:blue;
    text-decoration:underline;
    text-underline:single;}
    a:visited, span.MsoHyperlinkFollowed
    {mso-style-noshow:yes;
    mso-style-priority:99;
    color:purple;
    mso-themecolor:followedhyperlink;
    text-decoration:underline;
    text-underline:single;}
    p.MsoDocumentMap, li.MsoDocumentMap, div.MsoDocumentMap
    {mso-style-noshow:yes;
    mso-style-priority:99;
    mso-style-link:"Document Map Char";
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    font-size:8.0pt;
    font-family:"Tahoma","sans-serif";
    mso-fareast-font-family:"Times New Roman";}
    p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
    {mso-style-noshow:yes;
    mso-style-priority:99;
    mso-style-link:"Balloon Text Char";
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    font-size:8.0pt;
    font-family:"Tahoma","sans-serif";
    mso-fareast-font-family:"Times New Roman";}
    span.HeaderChar
    {mso-style-name:"Header Char";
    mso-style-priority:99;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-parent:"";
    mso-style-link:Header;
    font-family:"Calibri","sans-serif";
    mso-ascii-font-family:Calibri;
    mso-hansi-font-family:Calibri;
    mso-bidi-font-family:"Times New Roman";}
    span.FooterChar
    {mso-style-name:"Footer Char";
    mso-style-priority:99;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-parent:"";
    mso-style-link:Footer;
    font-family:"Calibri","sans-serif";
    mso-ascii-font-family:Calibri;
    mso-hansi-font-family:Calibri;
    mso-bidi-font-family:"Times New Roman";}
    span.BodyTextChar
    {mso-style-name:"Body Text Char";
    mso-style-noshow:yes;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-parent:"";
    mso-style-link:"Body Text";
    mso-ansi-font-size:12.0pt;
    mso-bidi-font-size:10.0pt;
    font-family:"Times New Roman","serif";
    mso-ascii-font-family:"Times New Roman";
    mso-hansi-font-family:"Times New Roman";
    mso-bidi-font-family:Arial;
    mso-ansi-language:VI;
    mso-bidi-font-style:italic;}
    span.DocumentMapChar
    {mso-style-name:"Document Map Char";
    mso-style-noshow:yes;
    mso-style-priority:99;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-parent:"";
    mso-style-link:"Document Map";
    mso-ansi-font-size:8.0pt;
    mso-bidi-font-size:8.0pt;
    font-family:"Tahoma","sans-serif";
    mso-ascii-font-family:Tahoma;
    mso-hansi-font-family:Tahoma;
    mso-bidi-font-family:Tahoma;}
    span.BalloonTextChar
    {mso-style-name:"Balloon Text Char";
    mso-style-noshow:yes;
    mso-style-priority:99;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-parent:"";
    mso-style-link:"Balloon Text";
    mso-ansi-font-size:8.0pt;
    mso-bidi-font-size:8.0pt;
    font-family:"Tahoma","sans-serif";
    mso-ascii-font-family:Tahoma;
    mso-hansi-font-family:Tahoma;
    mso-bidi-font-family:Tahoma;}
    span.SpellE
    {mso-style-name:"";
    mso-spl-e:yes;}
    .MsoChpDefault
    {mso-style-type:export-only;
    mso-default-props:yes;
    font-size:10.0pt;
    mso-ansi-font-size:10.0pt;
    mso-bidi-font-size:10.0pt;}
    /* Page Definitions */
    @page
    {mso-footnote-separator:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") fs;
    mso-footnote-continuation-separator:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") fcs;
    mso-endnote-separator:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") es;
    mso-endnote-continuation-separator:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") ecs;}
    @page WordSection1
    {size:8.27in 11.69in;
    margin:0.5in 0.5in 0.5in 0.5in;
    mso-header-margin:.5in;
    mso-footer-margin:.5in;


    mso-even-header:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") eh1;
    mso-header:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") h1;
    mso-even-footer:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") ef1;
    mso-footer:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") f1;
    mso-first-header:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") fh1;
    mso-first-footer:url("'.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm") ff1;

    mso-paper-source:0;}
    div.WordSection1
    {page:WordSection1;}
    -->
    </style>
    <!--[if gte mso 10]>
    <style>
    /* Style Definitions */
    table.MsoNormalTable
    {mso-style-name:"Table Normal";
    mso-tstyle-rowband-size:0;
    mso-tstyle-colband-size:0;
    mso-style-noshow:yes;
    mso-style-priority:99;
    mso-style-parent:"";
    mso-padding-alt:0in 5.4pt 0in 5.4pt;
    mso-para-margin:0in;
    mso-para-margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    font-size:10.0pt;
    font-family:"Times New Roman","serif";}
    table.MsoTableGrid
    {mso-style-name:"Table Grid";
    mso-tstyle-rowband-size:0;
    mso-tstyle-colband-size:0;
    mso-style-priority:59;
    mso-style-unhide:no;
    border:solid windowtext 1.0pt;
    mso-border-alt:solid windowtext .5pt;
    mso-padding-alt:0in 5.4pt 0in 5.4pt;
    mso-border-insideh:.5pt solid windowtext;
    mso-border-insidev:.5pt solid windowtext;
    mso-para-margin:0in;
    mso-para-margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    font-size:10.0pt;
    font-family:"Calibri","sans-serif";
    mso-bidi-font-family:"Times New Roman";}
    
    /* List Definitions */
 @list l0
    {mso-list-id:386760313;
    mso-list-type:simple;
    mso-list-template-ids:-1064774846;}
@list l0:level1
    {mso-level-start-at:354;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:54.0pt;
    mso-level-number-position:left;
    margin-left:54.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";}
@list l1
    {mso-list-id:769621805;
    mso-list-type:hybrid;
    mso-list-template-ids:-992699046 4349960 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l1:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:36.0pt;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"\.VnTime";
    mso-fareast-font-family:"Times New Roman";
    mso-bidi-font-family:"Times New Roman";}
@list l1:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:72.0pt;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l2
    {mso-list-id:834347792;
    mso-list-template-ids:-1722805456;}
@list l2:level1
    {mso-level-start-at:6;
    mso-level-text:%1;
    mso-level-tab-stop:27.0pt;
    mso-level-number-position:left;
    margin-left:27.0pt;
    text-indent:-27.0pt;}
@list l2:level2
    {mso-level-start-at:2;
    mso-level-text:"%1\.%2";
    mso-level-tab-stop:45.0pt;
    mso-level-number-position:left;
    margin-left:45.0pt;
    text-indent:-27.0pt;}
@list l2:level3
    {mso-level-text:"%1\.%2\.%3";
    mso-level-tab-stop:72.0pt;
    mso-level-number-position:left;
    margin-left:72.0pt;
    text-indent:-36.0pt;}
@list l2:level4
    {mso-level-text:"%1\.%2\.%3\.%4";
    mso-level-tab-stop:90.0pt;
    mso-level-number-position:left;
    margin-left:90.0pt;
    text-indent:-36.0pt;}
@list l2:level5
    {mso-level-text:"%1\.%2\.%3\.%4\.%5";
    mso-level-tab-stop:126.0pt;
    mso-level-number-position:left;
    margin-left:126.0pt;
    text-indent:-54.0pt;}
@list l2:level6
    {mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6";
    mso-level-tab-stop:144.0pt;
    mso-level-number-position:left;
    margin-left:144.0pt;
    text-indent:-54.0pt;}
@list l2:level7
    {mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7";
    mso-level-tab-stop:180.0pt;
    mso-level-number-position:left;
    margin-left:180.0pt;
    text-indent:-72.0pt;}
@list l2:level8
    {mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8";
    mso-level-tab-stop:198.0pt;
    mso-level-number-position:left;
    margin-left:198.0pt;
    text-indent:-72.0pt;}
@list l2:level9
    {mso-level-text:"%1\.%2\.%3\.%4\.%5\.%6\.%7\.%8\.%9";
    mso-level-tab-stop:234.0pt;
    mso-level-number-position:left;
    margin-left:234.0pt;
    text-indent:-90.0pt;}
@list l3
    {mso-list-id:2010713368;
    mso-list-type:hybrid;
    mso-list-template-ids:218498588 725664524 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l3:level1
    {mso-level-start-at:3;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:99.0pt;
    mso-level-number-position:left;
    margin-left:99.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
@list l3:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:135.0pt;
    mso-level-number-position:left;
    margin-left:135.0pt;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l3:level3
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:171.0pt;
    mso-level-number-position:left;
    margin-left:171.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";}
@list l3:level4
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:207.0pt;
    mso-level-number-position:left;
    margin-left:207.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";}
@list l3:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:243.0pt;
    mso-level-number-position:left;
    margin-left:243.0pt;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l3:level6
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:279.0pt;
    mso-level-number-position:left;
    margin-left:279.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";}
@list l3:level7
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:315.0pt;
    mso-level-number-position:left;
    margin-left:315.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";}
@list l3:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:351.0pt;
    mso-level-number-position:left;
    margin-left:351.0pt;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l3:level9
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:387.0pt;
    mso-level-number-position:left;
    margin-left:387.0pt;
    text-indent:-18.0pt;
    font-family:"Times New Roman","serif";}
ol
    {margin-bottom:0cm;}
ul
    {margin-bottom:0cm;}
    
    </style>
    <![endif]-->
    <!--[if gte mso 9]><xml>
    <o:shapedefaults v:ext="edit" spidmax="1026"/>
    </xml><![endif]-->
    <!--[if gte mso 9]><xml>
    <o:shapelayout v:ext="edit">
    <o:idmap v:ext="edit" data="1"/>
    </o:shapelayout></xml><![endif]-->


    ';

    $doc->addText($style_t);

    //end head
    $doc->addText("</head>");
    $doc->addText("<body lang=VI style='tab-interval:36.0pt'>");
    $doc->addText("<div class=WordSection1>");

    //body
    $doc->addText($printable);

    $doc->addText("</div>");    
    $doc->addText("</body></html>");




    $file_name = "Contract_Appendix_".$module->number.".doc";

    $doc->output("$file_name");
?>
