<?php
$viewdefs ['ProspectLists'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="campaign_id" value="{$smarty.request.campaign_id}">',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'javascript' => '<script type="text/javascript">
function toggle_domain_name(list_type)  {ldelim} 
    domain_name = document.getElementById(\'domain_name_div\');
    domain_label = document.getElementById(\'domain_label_div\');
    if (list_type.value == \'exempt_domain\')  {ldelim} 
        domain_name.style.display=\'block\'; 
        domain_label.style.display=\'block\';
     {rdelim}  else  {ldelim} 
        domain_name.style.display=\'none\';
        domain_label.style.display=\'none\';
     {rdelim} 
 {rdelim} 
</script>',
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'list_type',
            'displayParams' => 
            array (
              'required' => true,
              'javascript' => 'onchange="toggle_domain_name(this);"',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
          ),
          1 => 
          array (
            'name' => 'domain_name',
            'customLabel' => '<div {if $fields.list_type.value != "exempt_domain"} style=\'display:none\'{/if} id=\'domain_label_div\'>{$MOD.LBL_DOMAIN}</div>',
            'customCode' => '<div {if $fields.list_type.value != "exempt_domain"} style=\'display:none\'{/if} id=\'domain_name_div\'><input name="domain_name" id="domain_name" maxlength="255" type="text" value="{$fields.domain_name.value}"></div>',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
      ),
    ),
  ),
);
?>
