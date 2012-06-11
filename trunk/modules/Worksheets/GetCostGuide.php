<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
  if(isset($_POST['area'])&& isset($_POST['id'])){
      $area = isset($_POST['area'])? htmlspecialchars($_POST['area']):"";
      $id = isset($_POST['id'])? htmlspecialchars($_POST['id']):""; 
      $costarr = Worksheets::getCostGuide($id,$area);
      $key = array_keys($costarr);
      $label = getFieldLabel();
      $listArr = array();
      for($i =0; $i<count($key);$i++){
         $listArr[]  = array('value' =>$costarr[$key[$i]], 'label' => $label[$key[$i]] );
      }
      echo json_encode($listArr);
  }
  else{
      echo 'not found';
  }
  
   /**
   * Lay label cua cac chi phi
   * 
   */
  function getFieldLabel(){
      $costguide = new CostGuides();
      $label = array();
        foreach($costguide->field_defs as $name => $arr){
            if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
                if($arr['vname'] != 'LBL_DELETED'){
                    $label[$name] = translate($arr['vname'],'CostGuides');
                }
            }
        }
        return $label;
  }
?>
