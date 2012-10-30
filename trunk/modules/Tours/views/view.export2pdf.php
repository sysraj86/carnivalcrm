<?php
    
    class ViewExport2PDF extends SugarView{
        
        function ViewExport2PDF() {
            parent::SugarView();
        }

        function display(){
$html = '
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


//==============================================================
//==============================================================
//==============================================================

include("custom/include/MPDF54/mpdf.php");
$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output("abc.pdf", "D");
exit; 
        }  // end function
    } // end class
?>
