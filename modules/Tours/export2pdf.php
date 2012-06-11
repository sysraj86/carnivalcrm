<?php
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');
    require_once("custom/include/MPDF54/mpdf.php");


    $tour = new Tour();

    global $sugar_config, $db;
   // $ss = new Sugar_Smarty();
    //$db = DBManagerFactory::getInstance();
    // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
    // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

    $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
    $tour->retrieve($record);
    $template = file_get_contents('modules/Tours/tpls/exports/template-dos.htm');
    $template = str_replace('${SITE_URL}',$sugar_config['site_url'],$template);
    //$sql = "select * from tours where id ='".$record."' and deleted = 0";
    /*$sql = " SELECT t.id,t.name,t.tour_code,t.picture,
                t.duration,t.transport2, t.operator,t.description,
                t.deleted,t.tour_code,t.from_place,t.to_place,
                t.start_date,t.end_date,t.division,contract_value,currency_id,
                currency,u.first_name,u.last_name
            FROM tours t
            INNER JOIN users u
            ON t.assigned_user_id = u.id
            WHERE t.id = '".$record."' AND t.deleted = 0 AND u.deleted = 0 ";
    $result = $db->query($sql);
    $row = $db->fetchByAssoc($result); 

     $template = str_replace("{ID}",$row['id'],$template);
    if(!empty($row['name'])){
         $template = str_replace("{NAME}",$row['name'],$template ); 
    }
    else{
         $template = str_replace("{NAME}",'',$template);
    }
    $template = str_replace("{CODE}",$row['tour_code'],$template );
    
    
    //Kiem tra ton tai cua hinh   
    if(!empty($row['picture'])){
         $img = "<img src='".$sugar_config['site_url']."/modules/images/".$row['picture']."' width='500' height='350'/>";
         $template = str_replace('{PICTURE}',$img,$template);
    }else{
         $template = str_replace('{PICTURE}',"",$template);
    }
    
    
    //transport           
    /*$values = explode('^,^', $row['transport']);
    
    $transport = array();
    foreach($values as $val){
        $transport[] = translate('transport_dom', '', $val);
    }
    $transport = implode(", ",$transport );*/

  /*  $template = str_replace("{TRANSPORT}",$row['transport2'],$template);
    $template = str_replace("{DURATION}",$row['duration'],$template);   
    $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
    $template = str_replace("{TOURCODE}",$row['tour_code'],$template );  
    $template = str_replace("{FROM}", $row['from_place'],$template);  
    $template = str_replace("{TO}", $row['to_place'],$template ); 
    $template = str_replace("{START_DATE}", $row['start_date'],$template); 
    $template = str_replace("{END_DATE}", $row['end_date'],$template); 
    $template = str_replace("{VALUE}", $row['contract_value'],$template);  
    $template = str_replace("{CURRENCY}",   translate('currency_dom','',$row['currency']),$template);  
    $template = str_replace("{DIVISION}",   translate('division_dom','',$row['division']),$template);  
    $template = str_replace("{ASSIGNED_TO}", $row['first_name'].' '.$row['last_name'],$template);  
    $template = str_replace("{OPERATOR}", $row['operator'],$template);  
    $template = str_replace("{DESCRIPTION}", html_entity_decode(nl2br( $row['description'])),$template);  
    $template = str_replace("{TOUR_PROGRAM_LINE_DETAIL}", $tour->get_data_to_expor2word($record),$template);*/

    $template = str_replace('${CODE}',$tour->tour_code,$template);
    $template = str_replace('${NAME}',$tour->name, $template);
    $template = str_replace('${TRANSPORT}',$tour->transport2, $template);
    $template = str_replace('${START_DATE}',$tour->start_date, $template);
    $template = str_replace('${DURATION}',$tour->duration, $template);
    $template = str_replace('${PICTURE}',$sugar_config['site_url']."/modules/images/".$tour->picture, $template);
    $template = str_replace('${TOUR_PROGRAM_LINES}',html_entity_decode_utf8($tour->get_data_to_expor2word()),$template);
    $size=strlen($template);
    
    /*$filename = "TOUR_PROGRAM_".$tour->name.".doc";
    ob_end_clean();
    header("Cache-Control: private");
    header("Content-Type: application/force-download;");
    header("Content-Disposition:attachment; filename=\"$filename\"");
    header("Content-length:$size");
    echo $template;
    ob_flush();*/ 
    //added 09-06-2012
    $filename = "TOUR_PROGRAM_".$tour->name;
    /*$mpdf=new mPDF(); 

    $mpdf->WriteHTML($template);
    $mpdf->Output($filename, "D");//D=Download; I-Internal - xem trực tiếp file*/
    
    $mpdf=new mPDF(); 
    //$mpdf->SetImportUse();    

//    $mpdf->SetDocTemplate('modules/Tours/tpls/tour.pdf',1);    // 1|0 to continue after end of document or not - used on matching page numbers

    //===================================================
//    $mpdf->AddPage();
//    $mpdf->WriteHTML('Hallo World');
//    $mpdf->AddPage();
//    $mpdf->WriteHTML('Hallo World');
//    $mpdf->AddPage();
//    $mpdf->WriteHTML('Hallo World');
    //===================================================

//    $mpdf->RestartDocTemplate();

    //===================================================
//    $mpdf->AddPage();
//    $mpdf->WriteHTML('Hallo World');
//    $mpdf->AddPage();
//    $mpdf->WriteHTML('Hallo World');
//    $mpdf->AddPage();
//    $mpdf->WriteHTML('Hallo World');
    //===================================================
    $html = '
<h1><a name="top"></a>mPDF</h1>
<h2>Basic HTML Example</h2>
This file demonstrates most of the HTML elements.
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>
<p>P: Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus. Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla. Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci. </p>

<hr />

<div><img src="tiger.wmf" style="float:right;">DIV: Proin aliquet lorem id felis. Curabitur vel libero at mauris nonummy tincidunt. Donec imperdiet. Vestibulum sem sem, lacinia vel, molestie et, laoreet eget, urna. Curabitur viverra faucibus pede. Morbi lobortis. Donec dapibus. Donec tempus. Ut arcu enim, rhoncus ac, venenatis eu, porttitor mollis, dui. Sed vitae risus. In elementum sem placerat dui. Nam tristique eros in nisl. Nulla cursus sapien non quam porta porttitor. Quisque dictum ipsum ornare tortor. Fusce ornare tempus enim. </div>
<div><img src="klematis.jpg" style="opacity: 0.5; float: left;" />DIV: Proin aliquet lorem id felis. Curabitur vel libero at mauris nonummy tincidunt. Donec imperdiet. Vestibulum sem sem, lacinia vel, molestie et, laoreet eget, urna. Curabitur viverra faucibus pede. Morbi lobortis. Donec dapibus. Donec tempus. Ut arcu enim, rhoncus ac, venenatis eu, porttitor mollis, dui. Sed vitae risus. In elementum sem placerat dui. Nam tristique eros in nisl. Nulla cursus sapien non quam porta porttitor. Quisque dictum ipsum ornare tortor. Fusce ornare tempus enim. </div>

<blockquote>Blockquote: Maecenas arcu justo, malesuada eu, dapibus ac, adipiscing vitae, turpis. Fusce mollis. Aliquam egestas. In purus dolor, facilisis at, fermentum nec, molestie et, metus. Maecenas arcu justo, malesuada eu, dapibus ac, adipiscing vitae, turpis. Fusce mollis. Aliquam egestas. In purus dolor, facilisis at, fermentum nec, molestie et, metus.</blockquote>

<address>Address: Vestibulum feugiat, orci at imperdiet tincidunt, mauris erat facilisis urna, sagittis ultricies dui nisl et lectus. Sed lacinia, lectus vitae dictum sodales, elit ipsum ultrices orci, non euismod arcu diam non metus.</address>

<pre>PRE: Cum sociis natoque penatibus et magnis dis parturient montes, 
nascetur ridiculus mus. In suscipit turpis vitae odio. Integer convallis 
dui at metus. Fusce magna. Sed sed lectus vitae enim tempor cursus. Cras 
sed, posuere et, urna. Quisque ut leo. Aliquam interdum hendrerit tortor. 
Vestibulum elit. Vestibulum et arcu at diam mattis commodo. Nam ipsum sem, 
ultricies at, rutrum sit amet, posuere nec, velit. Sed molestie mollis dui.</pre>

<div><a href="#top">Hyperlink (&lt;a&gt;)</a></div>
<div><a href="http://www.pallcare.info">Hyperlink (&lt;a&gt;)</a></div>

<div>Styles - <tt>tt(teletype)</tt> <i>italic</i> <b>bold</b> <big>big</big> <small>small</small> <em>emphasis</em> <strong>strong</strong> <br />new lines<br>
<code>code</code> <samp>sample</samp> <kbd>keyboard</kbd> <var>variable</var> <cite>citation</cite> <abbr>abbr.</abbr> <acronym>ACRONYM</acronym> <sup>sup</sup> <sub>sub</sub> <strike>strike</strike> <s>strike-s</s> <u>underline</u> <del>delete</del> <ins>insert</ins> <q>To be or not to be</q> <font face="sans-serif" color="#880000" size="5">font changing face, size and color</font>
</div>

<p style="font-size:15pt; color:#440066">Paragraph using the in-line style to determine the font-size (15pt) and colour</p>


<h3>Testing BIG, SMALL, UNDERLINE, STRIKETHROUGH, FONT color, ACRONYM, SUPERSCRIPT and SUBSCRIPT</h3>
<p>This is <s>strikethrough</s> in <b><s>block</s></b> and <small>small <s>strikethrough</s> in <i>small span</i></small> and <big>big <s>strikethrough</s> in big span</big> and then <u>underline and <s>strikethrough and <sup>sup</sup></s></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</p>

<p>This is a <font color="#008800">green reference<sup>32-47</sup></font> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> then <s>Strikethrough reference<sup>32-47</sup></s> and <s>strikethrough reference<sub>32-47</sub></s></p> 

<p><big>Repeated in <u>BIG</u>: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</big></p> 

<p><small>Repeated in small: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</small></p>

<p>The above repeated, but starting with a paragraph with font-size specified (7pt)</p>

<p style="font-size:7pt;">This is <s>strikethrough</s> in block and <small>small <s>strikethrough</s> in small span</small> and then <u>underline</u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</p>

<p style="font-size:7pt;">This is <s>strikethrough</s> in block and <big>big <s>strikethrough</s> in big span</big> and then <u>underline</u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</p>

<p style="font-size:7pt;">This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> then <s>Strikethrough reference<sup>32-47</sup></s> and <s>strikethrough reference<sub>32-47</sub></s></p>

<p><small>This tests <u>underline</u> and <s>strikethrough</s> when they are <s><u>used together</u></s> as they both use text-decoration</small></p>


<p><small>Repeated in small: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</small></p> 

<p style="font-size:7pt;"><big>Repeated in BIG but with font-size set to 7pt by in-line css: This is reference<sup>32-47</sup> and <u>underlined reference<sup>32-47</sup></u> then reference<sub>32-47</sub> and <u>underlined reference<sub>32-47</sub></u> but out of span again but <font color="#000088">blue</font> font and <acronym>ACRONYM</acronym> text</big></p>

<ol>
<li>Item <b><u>1</u></b></li>
<li>Item 2<sup>32</sup></li>
<li><small>Item</small> 3</li>
<li>Praesent pharetra nulla in turpis. Sed ipsum nulla, sodales nec, vulputate in, scelerisque vitae, magna. Sed egestas justo nec ipsum. Nulla facilisi. Praesent sit amet pede quis metus aliquet vulputate. Donec luctus. Cras euismod tellus vel leo. 
<ul>
<li>Praesent pharetra nulla in turpis. Sed ipsum nulla, sodales nec, vulputate in, scelerisque vitae, magna. Sed egestas justo nec ipsum. Nulla facilisi. Praesent sit amet pede quis metus aliquet vulputate. Donec luctus. Cras euismod tellus vel leo. </li>
<li>Subitem 2
<ul>
<li>
Level 3 subitem
</li>
</ul>
</li>
</ul>
</li>
<li>Item 5</li>
</ol>

<dl>
<dt>Definition list</dt>
<dd>List defined by DL, DD and DT tags</dd>
</dl>

<p>Sed bibendum. Nunc eleifend ornare velit. Sed consectetuer urna in erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris sodales semper metus. Maecenas justo libero, pretium at, malesuada eu, mollis et, arcu. Ut suscipit pede in nulla. Praesent elementum, dolor ac fringilla posuere, elit libero rutrum massa, vel tincidunt dui tellus a ante. Sed aliquet euismod dolor. Vestibulum sed dui. Duis lobortis hendrerit quam. Donec tempus orci ut libero. Pellentesque suscipit malesuada nisi. </p>

<table border="1">
<thead>
<tr>
<th>Data</th>
<td>Data</td>
<td>Data</td>
<td>Data<br />2nd line</td>
</tr>
</thead>
<tbody>
<tr>
<th>More Data</th>
<td>More Data</td>
<td>More Data</td>
<td>Data<br />2nd line</td>
</tr>
<tr>
<th>Data</th>
<td>Data</td>
<td>Data</td>
<td>Data<br />2nd line</td>
</tr>
<tr>
<th>Data</th>
<td>Data</td>
<td>Data</td>
<td>Data<br />2nd line</td>
</tr>
</tbody>
</table>

<p>Praesent pharetra nulla in turpis. Sed ipsum nulla, sodales nec, vulputate in, scelerisque vitae, magna. Sed egestas justo nec ipsum. Nulla facilisi. Praesent sit amet pede quis metus aliquet vulputate. Donec luctus. Cras euismod tellus vel leo. Cras tellus. Fusce aliquet. Curabitur tincidunt viverra ligula. Fusce eget erat. Donec pede. Vestibulum id felis. Phasellus tincidunt ligula non pede. Morbi turpis. In vitae dui non erat placerat malesuada. Mauris adipiscing congue ante. Proin at erat. Aliquam mattis. </p>

<form>

<b>Textarea</b>
<textarea name="authors" rows="5" cols="80" wrap="virtual">Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. Quisque viverra. Etiam id libero at magna pellentesque aliquet. Nulla sit amet ipsum id enim tempus dictum. </textarea>
<br /><br />

<b>Select</b>
<select size="1" name="status"><option value="A">Active</option><option value="W" >New item from auto_manager: pending validation</option><option value="I" selected="selected">Incomplete record - pending</option><option value="X" >Flagged for Deletion</option> </select> followed by text
<br /><br />



<b>Input Radio</b>
<input type="radio" name="pre_publication" value="0" checked="checked" > No &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="pre_publication" value="1" > Yes 
<br /><br />


<b>Input Radio</b>
<input type="radio" name="recommended" value="0" > No &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="recommended" value="1" > Keep &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="recommended" value="2"  checked="checked" > Choice 
<br /><br />


<b>Input Text</b>
<input type="text" size="190" name="doi" value="10.1258/jrsm.100.5.211"> 
<br /><br />

<b>Input Password</b>
<input type="password" size="40" name="password" value="secret"> 
<br /><br />


<input type="checkbox" name="QPC" value="ON" > Checkboxes<br>
<input type="checkbox" name="QPA" value="ON" > Not selected<br>
<input type="checkbox" name="QLY" value="ON" checked="checked" > Selected<br>
<input type="checkbox" name="QLY" value="ON" disabled="disabled" > Disabled
<br /><br />

<input type="submit" name="submit" value="Submit" /> 
<input type="image" name="submit" src="goto.gif" />
<input type="button" name="submit" value="Button" />
<input type="reset" name="submit" value="Reset" />

</form>

';
    $mpdf->WriteHTML($html);

    $mpdf->Output($filename, "D");

    exit;
                        

?>
