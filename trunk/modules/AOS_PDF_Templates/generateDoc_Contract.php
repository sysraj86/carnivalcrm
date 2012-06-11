<?php
    require_once('modules/AOS_PDF_Templates/clsMsDocGenerator.php');
    require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
    require_once('modules/AOS_PDF_Templates/templateParser.php');
    require_once('modules/AOS_PDF_Templates/sendEmail.php');
    require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');
    global $mod_strings;


    $module_type = $_REQUEST['module'];
    $module = new Contract(); 
                         
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
      
    $printable = str_replace("\r\n","<br />",$text);

    global    $sugar_config;

    $firstValue = '';
    $firstNum = 0;

    $lastValue = '';
    $lastNum = 0;

    $contract_value = new ContractValue();
    foreach($contract_value->field_defs as $name => $arr){
        if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
            $curNum = strpos($text,'$contractvalues_'.$name);
            if($curNum){
                if($curNum < $firstNum || $firstNum == 0){
                    $firstValue = '$contractvalues_'.$name;
                    $firstNum = $curNum;
                }
                else if($curNum > $lastNum){
                        $lastValue = '$contractvalues_'.$name;
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

   

    $header_t = '<html xmlns:v="urn:schemas-microsoft-com:vml"
                xmlns:o="urn:schemas-microsoft-com:office:office"
                xmlns:w="urn:schemas-microsoft-com:office:word"
                xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
                xmlns:st1="urn:schemas-microsoft-com:office:smarttags"
                xmlns="http://www.w3.org/TR/REC-html40">

    <head>
    <meta http-equiv=Content-Type content="text/html; charset=unicode">
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
    $style_t = '

<style>
<!--
 /* Font Definitions */
 @font-face
    {font-family:Wingdings;
    panose-1:5 0 0 0 0 0 0 0 0 0;
    mso-font-charset:2;
    mso-generic-font-family:auto;
    mso-font-pitch:variable;
    mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
    {font-family:Wingdings;
    panose-1:5 0 0 0 0 0 0 0 0 0;
    mso-font-charset:2;
    mso-generic-font-family:auto;
    mso-font-pitch:variable;
    mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
    {font-family:"\.VnTime";
    panose-1:0 0 0 0 0 0 0 0 0 0;
    mso-font-alt:"Times New Roman";
    mso-font-charset:0;
    mso-generic-font-family:roman;
    mso-font-format:other;
    mso-font-pitch:auto;
    mso-font-signature:0 0 0 0 0 0;}
@font-face
    {font-family:Verdana;
    panose-1:2 11 6 4 3 5 4 4 2 4;
    mso-font-charset:0;
    mso-generic-font-family:swiss;
    mso-font-pitch:variable;
    mso-font-signature:-1593833729 1073750107 16 0 415 0;}
@font-face
    {font-family:Webdings;
    panose-1:5 3 1 2 1 5 9 6 7 3;
    mso-font-charset:2;
    mso-generic-font-family:roman;
    mso-font-pitch:variable;
    mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
    {font-family:VNI-Centur;
    mso-font-charset:0;
    mso-generic-font-family:auto;
    mso-font-pitch:variable;
    mso-font-signature:3 0 0 0 1 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
    {mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-parent:"";
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    font-size:12.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
h1
    {mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-link:"Heading 1 Char";
    mso-style-next:Normal;
    margin-top:12.0pt;
    margin-right:0in;
    margin-bottom:3.0pt;
    margin-left:0in;
    mso-pagination:widow-orphan;
    page-break-after:avoid;
    mso-outline-level:1;
    font-size:12.0pt;
    mso-bidi-font-size:16.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";
    mso-fareast-theme-font:major-fareast;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:major-bidi;
    mso-font-kerning:16.0pt;}
h4
    {mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-next:Normal;
    margin-top:0in;
    margin-right:-.9pt;
    margin-bottom:0in;
    margin-left:0in;
    margin-bottom:.0001pt;
    text-align:justify;
    mso-pagination:widow-orphan;
    page-break-after:avoid;
    mso-outline-level:4;
    font-size:12.0pt;
    font-family:VNI-Centur;
    mso-bidi-font-weight:normal;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
    {mso-style-unhide:no;
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.0in right 6.0in;
    font-size:12.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
    {mso-style-unhide:no;
    margin:0in;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 3.0in right 6.0in;
    font-size:12.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
    {mso-style-unhide:no;
    margin-top:0in;
    margin-right:0in;
    margin-bottom:6.0pt;
    margin-left:0in;
    mso-pagination:widow-orphan;
    font-size:12.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
p.MsoBodyTextIndent, li.MsoBodyTextIndent, div.MsoBodyTextIndent
    {mso-style-unhide:no;
    margin-top:0in;
    margin-right:0in;
    margin-bottom:6.0pt;
    margin-left:.25in;
    mso-pagination:widow-orphan;
    font-size:12.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
p.MsoBodyTextIndent3, li.MsoBodyTextIndent3, div.MsoBodyTextIndent3
    {mso-style-unhide:no;
    margin-top:0in;
    margin-right:0in;
    margin-bottom:6.0pt;
    margin-left:.25in;
    mso-pagination:widow-orphan;
    font-size:8.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
p.CharCharCharChar, li.CharCharCharChar, div.CharCharCharChar
    {mso-style-name:" Char Char Char Char";
    mso-style-update:auto;
    mso-style-unhide:no;
    mso-style-next:Normal;
    margin-top:0in;
    margin-right:0in;
    margin-bottom:8.0pt;
    margin-left:0in;
    line-height:12.0pt;
    mso-line-height-rule:exactly;
    mso-pagination:widow-orphan;
    font-size:10.0pt;
    font-family:"Verdana","sans-serif";
    mso-fareast-font-family:"Times New Roman";
    mso-bidi-font-family:"Times New Roman";}
span.Heading1Char
    {mso-style-name:"Heading 1 Char";
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-link:"Heading 1";
    mso-ansi-font-size:12.0pt;
    mso-bidi-font-size:16.0pt;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";
    mso-fareast-theme-font:major-fareast;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:major-bidi;
    mso-font-kerning:16.0pt;
    font-weight:bold;}
span.GramE
    {mso-style-name:"";
    mso-gram-e:yes;}
 /* Page Definitions */
 @page
    {}
@page WordSection1
    {size:595.35pt 841.95pt;
    margin:1.0in 1.0in 1.0in 1.0in;
    mso-header-margin:.5in;
    mso-footer-margin:47.05pt;
    mso-footer:url('.$sugar_config['site_url'].'/modules/AOS_PDF_Templates/hd_files/header.htm) f1;
    mso-paper-source:0;}
div.WordSection1
    {page:WordSection1;}
 /* List Definitions */
 @list l0
    {mso-list-id:386760313;
    mso-list-type:simple;
    mso-list-template-ids:-1064774846;}
@list l0:level1
    {mso-level-start-at:354;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:.75in;
    mso-level-number-position:left;
    margin-left:.75in;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l1
    {mso-list-id:567569604;
    mso-list-type:hybrid;
    mso-list-template-ids:-464193592 338438482 -708555368 448675270 671917592 -2016520096 -494096472 1739985832 1363863858 -1138316128;}
@list l1:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:.75in;
    mso-level-number-position:left;
    margin-left:.75in;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l1:level2
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:1.25in;
    mso-level-number-position:left;
    margin-left:1.25in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l1:level3
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:1.75in;
    mso-level-number-position:left;
    margin-left:1.75in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l1:level4
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:2.25in;
    mso-level-number-position:left;
    margin-left:2.25in;
    text-indent:-.25in;
    font-family:Symbol;}
@list l1:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:2.75in;
    mso-level-number-position:left;
    margin-left:2.75in;
    text-indent:-.25in;
    font-family:"Courier New";
    mso-bidi-font-family:"Times New Roman";}
@list l1:level6
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:3.25in;
    mso-level-number-position:left;
    margin-left:3.25in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l1:level7
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:3.75in;
    mso-level-number-position:left;
    margin-left:3.75in;
    text-indent:-.25in;
    font-family:Symbol;}
@list l1:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:4.25in;
    mso-level-number-position:left;
    margin-left:4.25in;
    text-indent:-.25in;
    font-family:"Courier New";
    mso-bidi-font-family:"Times New Roman";}
@list l1:level9
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:4.75in;
    mso-level-number-position:left;
    margin-left:4.75in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l2
    {mso-list-id:769621805;
    mso-list-type:hybrid;
    mso-list-template-ids:-992699046 4349960 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l2:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:.5in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:".VnTime","serif";
    mso-fareast-font-family:"Times New Roman";
    mso-bidi-font-family:"Times New Roman";}
@list l2:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:1.0in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:"Courier New";}
@list l2:level3
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:1.5in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l2:level4
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:2.0in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:Symbol;}
@list l2:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:2.5in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:"Courier New";}
@list l2:level6
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:3.0in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l2:level7
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:3.5in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:Symbol;}
@list l2:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:4.0in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:"Courier New";}
@list l2:level9
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:4.5in;
    mso-level-number-position:left;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l3
    {mso-list-id:982585858;
    mso-list-type:hybrid;
    mso-list-template-ids:-464193592 338438482 -1062938868 1668304034 1280375002 -2017664952 -997325382 244464444 -1223892614 -1159444342;}
@list l3:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:.75in;
    mso-level-number-position:left;
    margin-left:.75in;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l3:level2
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:1.25in;
    mso-level-number-position:left;
    margin-left:1.25in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l3:level3
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:1.75in;
    mso-level-number-position:left;
    margin-left:1.75in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l3:level4
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:2.25in;
    mso-level-number-position:left;
    margin-left:2.25in;
    text-indent:-.25in;
    font-family:Symbol;}
@list l3:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:2.75in;
    mso-level-number-position:left;
    margin-left:2.75in;
    text-indent:-.25in;
    font-family:"Courier New";
    mso-bidi-font-family:"Times New Roman";}
@list l3:level6
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:3.25in;
    mso-level-number-position:left;
    margin-left:3.25in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l3:level7
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:3.75in;
    mso-level-number-position:left;
    margin-left:3.75in;
    text-indent:-.25in;
    font-family:Symbol;}
@list l3:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:4.25in;
    mso-level-number-position:left;
    margin-left:4.25in;
    text-indent:-.25in;
    font-family:"Courier New";
    mso-bidi-font-family:"Times New Roman";}
@list l3:level9
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:4.75in;
    mso-level-number-position:left;
    margin-left:4.75in;
    text-indent:-.25in;
    font-family:Wingdings;}
@list l4
    {mso-list-id:2010713368;
    mso-list-type:hybrid;
    mso-list-template-ids:218498588 725664524 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l4:level1
    {mso-level-start-at:3;
    mso-level-number-format:bullet;
    mso-level-text:-;
    mso-level-tab-stop:99.0pt;
    mso-level-number-position:left;
    margin-left:99.0pt;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";
    mso-fareast-font-family:"Times New Roman";}
@list l4:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:135.0pt;
    mso-level-number-position:left;
    margin-left:135.0pt;
    text-indent:-.25in;
    font-family:"Courier New";}
@list l4:level3
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:171.0pt;
    mso-level-number-position:left;
    margin-left:171.0pt;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l4:level4
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:207.0pt;
    mso-level-number-position:left;
    margin-left:207.0pt;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l4:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:243.0pt;
    mso-level-number-position:left;
    margin-left:243.0pt;
    text-indent:-.25in;
    font-family:"Courier New";}
@list l4:level6
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:279.0pt;
    mso-level-number-position:left;
    margin-left:279.0pt;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l4:level7
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:315.0pt;
    mso-level-number-position:left;
    margin-left:315.0pt;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
@list l4:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:351.0pt;
    mso-level-number-position:left;
    margin-left:351.0pt;
    text-indent:-.25in;
    font-family:"Courier New";}
@list l4:level9
    {mso-level-number-format:bullet;
    mso-level-text:;
    mso-level-tab-stop:387.0pt;
    mso-level-number-position:left;
    margin-left:387.0pt;
    text-indent:-.25in;
    font-family:"Times New Roman","serif";}
ol
    {margin-bottom:0in;}
ul
    {margin-bottom:0in;}
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
    mso-style-unhide:no;
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
    font-family:"Times New Roman","serif";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2049"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
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


    $file_name = "Contract_".$module->number.".doc"; 


    $doc->output("$file_name");
?>