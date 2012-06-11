<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version
 * 1.1.3 ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied.  See the License
 * for the specific language governing rights and limitations under the
 * License.
 * All copies of the Covered Code must include on each user interface screen:
 *    (i) the "Powered by SugarCRM" logo and
 *    (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 *
 * Portions created by SYNOLIA are Copyright (C) 2004-2010 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/
/**********************************************************************************
 * The Original Code is:    SYNOFIELDPHOTO by SYNOLIA
 *                          www.synolia.com - sugar@synolia.com
 * Contributor(s):          ______________________________________.
 * Description :            ______________________________________.
 **********************************************************************************/
require_once('modules/DynamicFields/templates/Fields/TemplateText.php');

class Templatephoto extends TemplateText{
    
    var $type='photo';
    
    function get_field_def(){
		$def = parent::get_field_def();
		
		$def['dbType'] = 'varchar';
		$def['massupdate'] = 0;
		$def['importable'] = 0;
		$def['duplicate_merge'] = 0;
		$def['reportable'] = 0;
		$def['len'] = 255;
        $def['studio'] = 'visible';
        
        //Max Width
        $def['max_width'] = !empty($this->max_width) ? $this->max_width : $this->ext2;
        
        //Max Height
        $def['max_height'] = !empty($this->max_height) ? $this->max_height : $this->ext3;
        
        //Style CSS
        $def['style'] = !empty($this->style) ? $this->style : $this->ext4;
		return $def;	
	}
}


?>
