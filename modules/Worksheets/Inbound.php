<?php
    require_once("include/Sugar_Smarty.php");
    $ss = new Sugar_Smarty();
    echo "\n<p>\n";
    if (!empty($focus->type)) {
        $worksheet_type = $focus->type;
    }
    else {
        $worksheet_type = $_REQUEST['type'];
    }
    echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'] . ": " . $focus->name . " :" . $worksheet_type, true);
    echo "\n</p>\n";
    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);
    $ss->assign("ASSIGNED_USER_NAME", $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID", $focus->assigned_user_id);

    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id'])) $ss->assign("RETURN_ID", $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    $ss->assign("ID", $focus->id);
    if (!empty($focus->type)) {
        $ss->assign("TYPE", $focus->type);
    }
    else {
        $type = $_REQUEST['type'];
        $ss->assign("TYPE", $type);
    }

    $width = '<script> window.screen.availWidth </script>';
    $height = '<script> window.screen.height </script>';

    $temp = base64_decode($focus->content);
    $noidung = json_decode($temp);
    $ss->assign("name", $focus->name);
    $ss->assign("TOUR_NAME", $focus->worksheet_tour_name);
    $ss->assign("TOUR_ID", $focus->worksheet_tour_id);
    $ss->assign("TOURCODE", $focus->tourcode);
    $ss->assign("DURATION", $focus->duration);
    $ss->assign("MADETOUR_NAME", $focus->groupprograorksheets_name);
    $ss->assign("MADETOUR_ID", $focus->groupprogrd737rograms_ida);
    $ss->assign("THUESUATHOA", $focus->thuesuathoa);
    $ss->assign("SOKHACH", $focus->sokhach);
    $ss->assign("TYLE", $focus->tyle);
    $ss->assign("VERSION", $focus->version);
    $ss->assign("NOTE", $focus->note);
    $ss->assign("LOTRINH", $focus->lotrinh);
    $ss->assign('TRANSPORT', $focus->transport);
    $ss->assign('huongdanvien', $noidung->huongdanvien);
    $ss->assign('ngaybatdau', $noidung->ngaybatdau);
    $ss->assign('ngayketthuc', $noidung->ngayketthuc);
    $ss->assign('chiphikhac_tongcong', $noidung->chiphikhac_tongcong);
    $ss->assign('chiphikhac_tongthue', $noidung->chiphikhac_tongthue);


    $ss->assign('soluongkh1', $noidung->soluongkh1);
    $ss->assign('soluongkh2', $noidung->soluongkh2);
    $ss->assign('soluongkh3', $noidung->soluongkh3);
    $ss->assign('soluongkh4', $noidung->soluongkh4);
    $ss->assign('soluongkh5', $noidung->soluongkh5);
    $ss->assign('soluongkh6', $noidung->soluongkh6);
    $ss->assign('soluongkh7', $noidung->soluongkh7);
    $ss->assign('soluongkh8', $noidung->soluongkh8);
    $ss->assign('soluongkh9', $noidung->soluongkh9);
    $ss->assign('soluongkh10', $noidung->soluongkh10);
    $ss->assign('soluongkh11', $noidung->soluongkh11);
    $ss->assign('soluongkh12', $noidung->soluongkh12);
    $ss->assign('soluongkh13', $noidung->soluongkh13);
    $ss->assign('soluongkh14', $noidung->soluongkh14);
    $ss->assign('soluongkh15', $noidung->soluongkh15);

    $ss->assign('transfer1', $noidung->transfer1);
    $ss->assign('transfer2', $noidung->transfer2);
    $ss->assign('transfer3', $noidung->transfer3);
    $ss->assign('transfer4', $noidung->transfer4);
    $ss->assign('transfer5', $noidung->transfer5);
    $ss->assign('transfer6', $noidung->transfer6);
    $ss->assign('transfer7', $noidung->transfer7);
    $ss->assign('transfer8', $noidung->transfer8);
    $ss->assign('transfer9', $noidung->transfer9);
    $ss->assign('transfer10', $noidung->transfer10);
    $ss->assign('transfer11', $noidung->transfer11);
    $ss->assign('transfer12', $noidung->transfer12);
    $ss->assign('transfer13', $noidung->transfer13);
    $ss->assign('transfer14', $noidung->transfer14);
    $ss->assign('transfer15', $noidung->transfer15);
    $ss->assign('transfer16', $noidung->transfer16);
    $ss->assign('transfer17', $noidung->transfer17);
    $ss->assign('transfer18', $noidung->transfer18);
    $ss->assign('transfer19', $noidung->transfer19);
    $ss->assign('transfer20', $noidung->transfer20);
    $ss->assign('transfer21', $noidung->transfer21);
    $ss->assign('transfer22', $noidung->transfer22);
    $ss->assign('transfer23', $noidung->transfer23);
    $ss->assign('transfer24', $noidung->transfer24);
    $ss->assign('transfer25', $noidung->transfer25);
    $ss->assign('transfer26', $noidung->transfer26);
    $ss->assign('transfer27', $noidung->transfer27);
    $ss->assign('transfer28', $noidung->transfer28);
    $ss->assign('transfer29', $noidung->transfer29);
    $ss->assign('transfer30', $noidung->transfer30);


    $ss->assign('transfer_south', $noidung->transfer_south);
    $ss->assign('transfer_south_km1', $noidung->transfer_south_km1);
    $ss->assign('transfer_south_km2', $noidung->transfer_south_km2);
    $ss->assign('transfer_south_km3', $noidung->transfer_south_km3);
    $ss->assign('transfer_south_km4', $noidung->transfer_south_km4);
    $ss->assign('transfer_south_km5', $noidung->transfer_south_km5);
    $ss->assign('transfer_south_km6', $noidung->transfer_south_km6);

    $ss->assign('transfer_middle', $noidung->transfer_middle);
    $ss->assign('transfer_middle_km1', $noidung->transfer_middle_km1);
    $ss->assign('transfer_middle_km2', $noidung->transfer_middle_km2);
    $ss->assign('transfer_middle_km3', $noidung->transfer_middle_km3);
    $ss->assign('transfer_middle_km4', $noidung->transfer_middle_km4);
    $ss->assign('transfer_middle_km5', $noidung->transfer_middle_km5);
    $ss->assign('transfer_middle_km7', $noidung->transfer_middle_km6);

    $ss->assign('transfer_north', $noidung->transfer_north);
    $ss->assign('transfer_north_km1', $noidung->transfer_north_km1);
    $ss->assign('transfer_north_km2', $noidung->transfer_north_km2);
    $ss->assign('transfer_north_km3', $noidung->transfer_north_km3);
    $ss->assign('transfer_north_km4', $noidung->transfer_north_km4);
    $ss->assign('transfer_north_km5', $noidung->transfer_north_km5);
    $ss->assign('transfer_north_km6', $noidung->transfer_north_km6);

    $ss->assign('south_package1', $noidung->south_package1);
    $ss->assign('south_package2', $noidung->south_package2);
    $ss->assign('south_package3', $noidung->south_package3);
    $ss->assign('south_package4', $noidung->south_package4);
    $ss->assign('south_package5', $noidung->south_package5);
    $ss->assign('south_package6', $noidung->south_package6);


    $ss->assign('middle_package1', $noidung->middle_package1);
    $ss->assign('middle_package2', $noidung->middle_package2);
    $ss->assign('middle_package3', $noidung->middle_package3);
    $ss->assign('middle_package4', $noidung->middle_package4);
    $ss->assign('middle_package5', $noidung->middle_package5);
    $ss->assign('middle_package6', $noidung->middle_package6);


    $ss->assign('north_package1', $noidung->north_package1);
    $ss->assign('north_package2', $noidung->north_package2);
    $ss->assign('north_package3', $noidung->north_package3);
    $ss->assign('north_package4', $noidung->north_package4);
    $ss->assign('north_package5', $noidung->north_package5);
    $ss->assign('north_package6', $noidung->north_package6);

    $ss->assign('boat_sum', $noidung->boat_sum);
    $ss->assign('boat1', $noidung->boat1);
    $ss->assign('boat2', $noidung->boat2);
    $ss->assign('boat3', $noidung->boat3);
    $ss->assign('boat4', $noidung->boat4);
    $ss->assign('boat5', $noidung->boat5);
    $ss->assign('boat6', $noidung->boat6);
    $ss->assign('boat7', $noidung->boat7);
    $ss->assign('boat8', $noidung->boat8);
    $ss->assign('boat9', $noidung->boat9);
    $ss->assign('boat10', $noidung->boat10);
    $ss->assign('boat11', $noidung->boat11);
    $ss->assign('boat12', $noidung->boat12);
    $ss->assign('boat13', $noidung->boat13);
    $ss->assign('boat14', $noidung->boat14);
    $ss->assign('boat15', $noidung->boat15);
    $ss->assign('boat16', $noidung->boat16);
    $ss->assign('boat17', $noidung->boat17);
    $ss->assign('boat18', $noidung->boat18);
    $ss->assign('boat19', $noidung->boat19);
    $ss->assign('boat20', $noidung->boat20);
    $ss->assign('boat21', $noidung->boat21);
    $ss->assign('boat22', $noidung->boat22);
    $ss->assign('boat23', $noidung->boat23);
    $ss->assign('boat24', $noidung->boat24);
    $ss->assign('boat25', $noidung->boat25);
    $ss->assign('boat26', $noidung->boat26);
    $ss->assign('boat27', $noidung->boat27);
    $ss->assign('boat28', $noidung->boat28);
    $ss->assign('boat29', $noidung->boat29);
    $ss->assign('boat30', $noidung->boat30);

    $boat = $noidung->boat;
    if(count($boat)>0){
        foreach($boat as $value){
            $boat_html .='<tr>
            <td class="dataLabel" style="border-left:1px solid #999"><input name="boat_service[]" type="text" id="boat_service" size="30" value="'.$value->boat_service.'" /></td>
            <td><input class="calculate boat_price" name="boat_price[]" type="text" id="boat_price" size="10" value="'.$value->boat_price.'" /></td>
            <td><input class="calculate boat_num" name="boat_num[]" type="text" id="boat_num[]" size="10" value="'.$value->boat_num.'" /></td>
            <td><input class="calculate boat_money" readonly="true" name="boat_money[]" type="text" id="boat_money" size="10" value="'.$value->boat_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }
    
    $ss->assign('count_boat',count($boat));
    $ss->assign('boat_html', $boat_html);




    $ss->assign('guide_sum', $noidung->guide_sum);
    $ss->assign('guide1', $noidung->guide1);
    $ss->assign('guide2', $noidung->guide2);
    $ss->assign('guide3', $noidung->guide3);
    $ss->assign('guide4', $noidung->guide4);
    $ss->assign('guide5', $noidung->guide5);
    $ss->assign('guide6', $noidung->guide6);
    $ss->assign('guide7', $noidung->guide7);
    $ss->assign('guide8', $noidung->guide8);
    $ss->assign('guide9', $noidung->guide9);
    $ss->assign('guide10', $noidung->guide10);
    $ss->assign('guide11', $noidung->guide11);
    $ss->assign('guide12', $noidung->guide12);
    $ss->assign('guide13', $noidung->guide13);
    $ss->assign('guide14', $noidung->guide14);
    $ss->assign('guide15', $noidung->guide15);
    $ss->assign('guide16', $noidung->guide16);
    $ss->assign('guide17', $noidung->guide17);
    $ss->assign('guide18', $noidung->guide18);
    $ss->assign('guide19', $noidung->guide19);
    $ss->assign('guide20', $noidung->guide20);
    $ss->assign('guide21', $noidung->guide21);
    $ss->assign('guide22', $noidung->guide22);
    $ss->assign('guide23', $noidung->guide23);
    $ss->assign('guide24', $noidung->guide24);
    $ss->assign('guide25', $noidung->guide25);
    $ss->assign('guide26', $noidung->guide26);
    $ss->assign('guide27', $noidung->guide27);
    $ss->assign('guide28', $noidung->guide28);
    $ss->assign('guide29', $noidung->guide29);
    $ss->assign('guide30', $noidung->guide30);


    $ss->assign('guide_south_price', $noidung->guide_south_price);
    $ss->assign('guide_south_num', $noidung->guide_south_num);
    $ss->assign('guide_south_money', $noidung->guide_south_money);
    $ss->assign('guide_middle_price', $noidung->guide_middle_price);
    $ss->assign('guide_middle_num', $noidung->guide_middle_num);
    $ss->assign('guide_middle_money', $noidung->guide_middle_money);
    $ss->assign('guide_north_price', $noidung->guide_north_price);
    $ss->assign('guide_north_num', $noidung->guide_north_num);
    $ss->assign('guide_north_money', $noidung->guide_north_money);


    $ss->assign('group_sum', $noidung->group_sum);
    $ss->assign('group1', $noidung->group1);
    $ss->assign('group2', $noidung->group2);
    $ss->assign('group3', $noidung->group3);
    $ss->assign('group4', $noidung->group4);
    $ss->assign('group5', $noidung->group5);
    $ss->assign('group6', $noidung->group6);
    $ss->assign('group7', $noidung->group7);
    $ss->assign('group8', $noidung->group8);
    $ss->assign('group9', $noidung->group9);
    $ss->assign('group10', $noidung->group10);
    $ss->assign('group11', $noidung->group11);
    $ss->assign('group12', $noidung->group12);
    $ss->assign('group13', $noidung->group13);
    $ss->assign('group14', $noidung->group14);
    $ss->assign('group15', $noidung->group15);
    $ss->assign('group16', $noidung->group16);
    $ss->assign('group17', $noidung->group17);
    $ss->assign('group18', $noidung->group18);
    $ss->assign('group19', $noidung->group19);
    $ss->assign('group20', $noidung->group20);
    $ss->assign('group21', $noidung->group21);
    $ss->assign('group22', $noidung->group22);
    $ss->assign('group23', $noidung->group23);
    $ss->assign('group24', $noidung->group24);
    $ss->assign('group25', $noidung->group25);
    $ss->assign('group26', $noidung->group26);
    $ss->assign('group27', $noidung->group27);
    $ss->assign('group28', $noidung->group28);
    $ss->assign('group29', $noidung->group29);
    $ss->assign('group30', $noidung->group30);

    $group1_fit = $noidung->group1_fit;
    if(count($group1_fit) >0){
        foreach($group1_fit as $value){
            $group1_html .= '<tr>
            <td style="border-left:1px solid #999"><input name="group1_service[]" type="text" id="group1_service[]" size="30" value="'.$value->group1_service.'" /></td>
            <td><input class="calculate group_price"  name="group1_price[]" type="text" id="group1_price" size="10" value="'.$value->group1_price.'" /></td>
            <td><input class="calculate group_num"  name="group1_num[]" type="text" id="group1_num" size="10" value="'.$value->group1_num.'" /></td>
            <td><input class="calculate group_money" readonly="readonly" name="group1_money[]" type="text" id="group1_money" size="10" value="'.$value->group1_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }
    $ss->assign('count_group1_fit',count($group1_fit));
    $ss->assign('group1_html',$group1_html);

    $group2_fit = $noidung->group2_fit;
    if(count($group2_fit) >0){
        foreach($group2_fit as $value){
            $group2_html .= '<tr>
            <td style="border-left:1px solid #999"><input name="group2_service[]" type="text" id="group2_service[]" size="30" value="'.$value->group2_service.'" /></td>
            <td><input class="calculate group_price" name="group2_price[]" type="text" id="group2_price" size="10" value="'.$value->group2_price.'" /></td>
            <td><input class="calculate group_num" name="group2_num[]" type="text" id="group2_num[]" size="10" value="'.$value->group2_num.'" /></td>
            <td><input class="calculate group_money" readonly="readonly" name="group2_money[]" type="text" id="group2_money[]" size="10" value="'.$value->group2_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>' ;
        }
    }

    $ss->assign('count_group2',count($group2_fit));
    $ss->assign('group2_html',$group2_html);



    $ss->assign('entrance_sum', $noidung->entrance_sum);
    $ss->assign('entrance1', $noidung->entrance1);
    $ss->assign('entrance2', $noidung->entrance2);
    $ss->assign('entrance3', $noidung->entrance3);
    $ss->assign('entrance4', $noidung->entrance4);
    $ss->assign('entrance5', $noidung->entrance5);
    $ss->assign('entrance6', $noidung->entrance6);
    $ss->assign('entrance7', $noidung->entrance7);
    $ss->assign('entrance8', $noidung->entrance8);
    $ss->assign('entrance9', $noidung->entrance9);
    $ss->assign('entrance10', $noidung->entrance10);
    $ss->assign('entrance11', $noidung->entrance11);
    $ss->assign('entrance12', $noidung->entrance12);
    $ss->assign('entrance13', $noidung->entrance13);
    $ss->assign('entrance14', $noidung->entrance14);
    $ss->assign('entrance15', $noidung->entrance15);
    $ss->assign('entrance16', $noidung->entrance16);
    $ss->assign('entrance17', $noidung->entrance17);
    $ss->assign('entrance18', $noidung->entrance18);
    $ss->assign('entrance19', $noidung->entrance19);
    $ss->assign('entrance20', $noidung->entrance20);
    $ss->assign('entrance21', $noidung->entrance21);
    $ss->assign('entrance22', $noidung->entrance22);
    $ss->assign('entrance23', $noidung->entrance23);
    $ss->assign('entrance24', $noidung->entrance24);
    $ss->assign('entrance25', $noidung->entrance25);
    $ss->assign('entrance26', $noidung->entrance26);
    $ss->assign('entrance27', $noidung->entrance27);
    $ss->assign('entrance28', $noidung->entrance28);
    $ss->assign('entrance29', $noidung->entrance29);
    $ss->assign('entrance30', $noidung->entrance30);


    $entrance = $noidung->entrance;
    if(count($entrance)>0){
        foreach($entrance as $value){
            $html_entrance .= ' <tr>
            <td style="border-left:1px solid #999"><input name="entrance_service[]" type="text" id="entrance_service[]" value="'.$value->entrance_service.'" size="30" /></td>
            <td><input class="calculate entrance_price" name="entrance_price[]" type="text" id="entrance_price" size="10" value="'.$value->entrance_price.'" /></td>
            <td><input class="calculate entrance_num" name="entrance_num[]" type="text" id="entrance_num" size="10" value="'.$value->entrance_num.'" /></td>
            <td><input class="calculate entrance_money" readonly="readonly" name="entrance_money[]" type="text" id="entrance_money" size="10" value="'.$value->entrance_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }

    $ss->assign('count_entrance',count($entrance));
    $ss->assign('entrance_html', $html_entrance);

    $ss->assign('ticket_sum', $noidung->ticket_sum);
    $ss->assign('ticket1', $noidung->ticket1);
    $ss->assign('ticket2', $noidung->ticket2);
    $ss->assign('ticket3', $noidung->ticket3);
    $ss->assign('ticket4', $noidung->ticket4);
    $ss->assign('ticket5', $noidung->ticket5);
    $ss->assign('ticket6', $noidung->ticket6);
    $ss->assign('ticket7', $noidung->ticket7);
    $ss->assign('ticket8', $noidung->ticket8);
    $ss->assign('ticket9', $noidung->ticket9);
    $ss->assign('ticket10', $noidung->ticket10);
    $ss->assign('ticket11', $noidung->ticket11);
    $ss->assign('ticket12', $noidung->ticket12);
    $ss->assign('ticket13', $noidung->ticket13);
    $ss->assign('ticket14', $noidung->ticket14);
    $ss->assign('ticket15', $noidung->ticket15);
    $ss->assign('ticket16', $noidung->ticket16);
    $ss->assign('ticket17', $noidung->ticket17);
    $ss->assign('ticket18', $noidung->ticket18);
    $ss->assign('ticket19', $noidung->ticket19);
    $ss->assign('ticket20', $noidung->ticket20);
    $ss->assign('ticket21', $noidung->ticket21);
    $ss->assign('ticket22', $noidung->ticket22);
    $ss->assign('ticket23', $noidung->ticket23);
    $ss->assign('ticket24', $noidung->ticket24);
    $ss->assign('ticket25', $noidung->ticket25);
    $ss->assign('ticket26', $noidung->ticket26);
    $ss->assign('ticket27', $noidung->ticket27);
    $ss->assign('ticket28', $noidung->ticket28);
    $ss->assign('ticket29', $noidung->ticket29);
    $ss->assign('ticket30', $noidung->ticket30);

    $ticket = $noidung->ticket;
    if(count($ticket)>0){
        foreach($ticket as $value){
            $html_ticket .= '<tr>
            <td style="border-left:1px solid #999"><input name="tickets_service[]" type="text" id="tickets_service[]" size="30" value="'.$value->tickets_service.'" /></td>
            <td><input class="calculate tickets_price" name="tickets_price[]" type="text" id="tickets_price" size="10" value="'.$value->tickets_price.'"/></td>
            <td><input class="calculate tickets_num" name="tickets_num" type="text" id="tickets_num[]" size="10" value="'.$value->tickets_num.'" /></td>
            <td><input class="calculate tickets_money" readonly="readonly" name="tickets_money[]" type="text" id="tickets_money" size="10" value="'.$value->tickets_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }

    
    $ss->assign('count_ticket',count($ticket));
    $ss->assign('html_ticket',$html_ticket);



    $ss->assign('fit_sum', $noidung->fit_sum);
    $ss->assign('fit1', $noidung->fit1);
    $ss->assign('fit2', $noidung->fit2);
    $ss->assign('fit3', $noidung->fit3);
    $ss->assign('fit4', $noidung->fit4);
    $ss->assign('fit5', $noidung->fit5);
    $ss->assign('fit6', $noidung->fit6);
    $ss->assign('fit7', $noidung->fit7);
    $ss->assign('fit8', $noidung->fit8);
    $ss->assign('fit9', $noidung->fit9);
    $ss->assign('fit10', $noidung->fit10);
    $ss->assign('fit11', $noidung->fit11);
    $ss->assign('fit12', $noidung->fit12);
    $ss->assign('fit13', $noidung->fit13);
    $ss->assign('fit14', $noidung->fit14);
    $ss->assign('fit15', $noidung->fit15);
    $ss->assign('fit16', $noidung->fit16);
    $ss->assign('fit17', $noidung->fit17);
    $ss->assign('fit18', $noidung->fit18);
    $ss->assign('fit19', $noidung->fit19);
    $ss->assign('fit20', $noidung->fit20);
    $ss->assign('fit21', $noidung->fit21);
    $ss->assign('fit22', $noidung->fit22);
    $ss->assign('fit23', $noidung->fit23);
    $ss->assign('fit24', $noidung->fit24);
    $ss->assign('fit25', $noidung->fit25);
    $ss->assign('fit26', $noidung->fit26);
    $ss->assign('fit27', $noidung->fit27);
    $ss->assign('fit28', $noidung->fit28);
    $ss->assign('fit29', $noidung->fit29);
    $ss->assign('fit30', $noidung->fit30);

    $fit1_line = $noidung->fit1_line;

    if(count($fit1_line)>0){
        foreach($fit1_line as $value){
            $html_fit1 .= '<tr>
            <td style="border-left:1px solid #999"><input name="fit1_service[]" type="text" id="fit1_service[]" size="30" value="'.$value->fit1_service.'" /></td>
            <td><input class="calculate fit_price" name="fit1_price[]" type="text" id="fit1_price" size="10" value="'.$value->fit1_price.'"/></td>
            <td><input class="calculate fit_num" name="fit1_num[]" type="text" id="fit1_num[]" size="10" value="'.$value->fit1_num.'"/></td>
            <td><input class="calculate fit_money" readonly="readonly" name="fit1_money[]" type="text" id="fit1_money" size="10" value="'.$value->fit1_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }

    $ss->assign('count_fit1',count($fit1_line));
    $ss->assign('html_fit1',$html_fit1);

    $fit2_line = $noidung->fit2_line;
    if(count($fit2_line) > 0){
        foreach($fit2_line as $value){
            $html_fit2 .= '<tr>
            <td style="border-left:1px solid #999"><input name="fit2_service[]" type="text" id="fit2_service[]" size="30" value="'.$value->fit2_service.'" /></td>
            <td><input class="calculate fit_price" name="fit2_price[]" type="text" id="fit2_price" size="10" value="'.$value->fit2_price.'" /></td>
            <td><input class="calculate fit_num" name="fit2_num[]" type="text" id="fit2_num" size="10" value="'.$value->fit2_num.'" /></td>
            <td><input class="calculate fit_money" readonly="readonly" name="fit2_money[]" type="text" id="fit2_money" size="10" value="'.$value->fit2_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }
    
    $ss->assign('count_fit2',count($fit2_line));
    $ss->assign('html_fit2',$html_fit2);
    $ss->assign('meal1_sum', $noidung->meal1_sum);
    $ss->assign('meal1_1', $noidung->meal1_1);
    $ss->assign('meal1_2', $noidung->meal1_2);
    $ss->assign('meal1_3', $noidung->meal1_3);
    $ss->assign('meal1_4', $noidung->meal1_4);
    $ss->assign('meal1_5', $noidung->meal1_5);
    $ss->assign('meal1_6', $noidung->meal1_6);
    $ss->assign('meal1_7', $noidung->meal1_7);
    $ss->assign('meal1_8', $noidung->meal1_8);
    $ss->assign('meal1_9', $noidung->meal1_9);
    $ss->assign('meal1_10', $noidung->meal1_10);
    $ss->assign('meal1_11', $noidung->meal1_11);
    $ss->assign('meal1_12', $noidung->meal1_12);
    $ss->assign('meal1_13', $noidung->meal1_13);
    $ss->assign('meal1_14', $noidung->meal1_14);
    $ss->assign('meal1_15', $noidung->meal1_15);
    $ss->assign('meal1_16', $noidung->meal1_16);
    $ss->assign('meal1_17', $noidung->meal1_17);
    $ss->assign('meal1_18', $noidung->meal1_18);
    $ss->assign('meal1_19', $noidung->meal1_19);
    $ss->assign('meal1_20', $noidung->meal1_20);
    $ss->assign('meal1_21', $noidung->meal1_21);
    $ss->assign('meal1_22', $noidung->meal1_22);
    $ss->assign('meal1_23', $noidung->meal1_23);
    $ss->assign('meal1_24', $noidung->meal1_24);
    $ss->assign('meal1_25', $noidung->meal1_25);
    $ss->assign('meal1_26', $noidung->meal1_26);
    $ss->assign('meal1_27', $noidung->meal1_27);
    $ss->assign('meal1_28', $noidung->meal1_28);
    $ss->assign('meal1_29', $noidung->meal1_29);
    $ss->assign('meal1_30', $noidung->meal1_30);


    $ss->assign('meal1_south_sum', $noidung->meal1_south_sum);
    $ss->assign('meal1_south1', $noidung->meal1_south1);
    $ss->assign('meal1_south2', $noidung->meal1_south2);
    $ss->assign('meal1_south3', $noidung->meal1_south3);
    $ss->assign('meal1_south4', $noidung->meal1_south4);
    $ss->assign('meal1_south5', $noidung->meal1_south5);
    $ss->assign('meal1_south6', $noidung->meal1_south6);
    $ss->assign('meal1_south7', $noidung->meal1_south7);
    $ss->assign('meal1_south8', $noidung->meal1_south8);
    $ss->assign('meal1_south9', $noidung->meal1_south9);
    $ss->assign('meal1_south10', $noidung->meal1_south10);
    $ss->assign('meal1_south11', $noidung->meal1_south11);
    $ss->assign('meal1_south12', $noidung->meal1_south12);
    $ss->assign('meal1_south13', $noidung->meal1_south13);
    $ss->assign('meal1_south14', $noidung->meal1_south14);
    $ss->assign('meal1_south15', $noidung->meal1_south15);
    $ss->assign('meal1_south16', $noidung->meal1_south16);
    $ss->assign('meal1_south17', $noidung->meal1_south17);
    $ss->assign('meal1_south18', $noidung->meal1_south18);
    $ss->assign('meal1_south19', $noidung->meal1_south19);
    $ss->assign('meal1_south20', $noidung->meal1_south20);
    $ss->assign('meal1_south21', $noidung->meal1_south21);
    $ss->assign('meal1_south22', $noidung->meal1_south22);
    $ss->assign('meal1_south23', $noidung->meal1_south23);
    $ss->assign('meal1_south24', $noidung->meal1_south24);
    $ss->assign('meal1_south25', $noidung->meal1_south25);
    $ss->assign('meal1_south26', $noidung->meal1_south26);
    $ss->assign('meal1_south27', $noidung->meal1_south27);
    $ss->assign('meal1_south28', $noidung->meal1_south28);
    $ss->assign('meal1_south29', $noidung->meal1_south29);
    $ss->assign('meal1_south30', $noidung->meal1_south30);

    $ss->assign('meal1_south_breakfirst_price', $noidung->meal1_south_breakfirst_price);
    $ss->assign('meal1_south_breakfirst_num', $noidung->meal1_south_breakfirst_num);
    $ss->assign('meal1_south_breakfirst_money', $noidung->meal1_south_breakfirst_money);
    $ss->assign('meal1_south_lunch_price', $noidung->meal1_south_lunch_price);
    $ss->assign('meal1_south_lunch_num', $noidung->meal1_south_lunch_num);
    $ss->assign('meal1_south_lunch_money', $noidung->meal1_south_lunch_money);
    $ss->assign('meal1_south_dinner_price', $noidung->meal1_south_dinner_price);
    $ss->assign('meal1_south_dinner_num', $noidung->meal1_south_dinner_num);
    $ss->assign('meal1_south_dinner_money', $noidung->meal1_south_dinner_money);
    $ss->assign('meal1_south_other_price', $noidung->meal1_south_other_price);
    $ss->assign('meal1_south_other_num', $noidung->meal1_south_other_num);
    $ss->assign('meal1_south_other_money', $noidung->meal1_south_other_money);


    $ss->assign('meal1_miidle_sum', $noidung->meal1_miidle_sum);
    $ss->assign('meal1_middle1', $noidung->meal1_middle1);
    $ss->assign('meal1_middle2', $noidung->meal1_middle2);
    $ss->assign('meal1_middle3', $noidung->meal1_middle3);
    $ss->assign('meal1_middle4', $noidung->meal1_middle4);
    $ss->assign('meal1_middle5', $noidung->meal1_middle5);
    $ss->assign('meal1_middle6', $noidung->meal1_middle6);
    $ss->assign('meal1_middle7', $noidung->meal1_middle7);
    $ss->assign('meal1_middle8', $noidung->meal1_middle8);
    $ss->assign('meal1_middle9', $noidung->meal1_middle9);
    $ss->assign('meal1_middle10', $noidung->meal1_middle10);
    $ss->assign('meal1_middle11', $noidung->meal1_middle11);
    $ss->assign('meal1_middle12', $noidung->meal1_middle12);
    $ss->assign('meal1_middle13', $noidung->meal1_middle13);
    $ss->assign('meal1_middle14', $noidung->meal1_middle14);
    $ss->assign('meal1_middle15', $noidung->meal1_middle15);
    $ss->assign('meal1_middle16', $noidung->meal1_middle16);
    $ss->assign('meal1_middle17', $noidung->meal1_middle17);
    $ss->assign('meal1_middle18', $noidung->meal1_middle18);
    $ss->assign('meal1_middle19', $noidung->meal1_middle19);
    $ss->assign('meal1_middle20', $noidung->meal1_middle20);
    $ss->assign('meal1_middle21', $noidung->meal1_middle21);
    $ss->assign('meal1_middle22', $noidung->meal1_middle22);
    $ss->assign('meal1_middle23', $noidung->meal1_middle23);
    $ss->assign('meal1_middle24', $noidung->meal1_middle24);
    $ss->assign('meal1_middle25', $noidung->meal1_middle25);
    $ss->assign('meal1_middle26', $noidung->meal1_middle26);
    $ss->assign('meal1_middle27', $noidung->meal1_middle27);
    $ss->assign('meal1_middle28', $noidung->meal1_middle28);
    $ss->assign('meal1_middle29', $noidung->meal1_middle29);


    $ss->assign('meal1_middle_breakfirst_price', $noidung->meal1_middle_breakfirst_price);
    $ss->assign('meal1_middle_breakfirst_num', $noidung->meal1_middle_breakfirst_num);
    $ss->assign('meal1_middle_breakfirst_money', $noidung->meal1_middle_breakfirst_money);
    $ss->assign('meal1_middle_lunch_price', $noidung->meal1_middle_lunch_price);
    $ss->assign('meal1_middle_lunch_num', $noidung->meal1_middle_lunch_num);
    $ss->assign('meal1_middle_lunch_money', $noidung->meal1_middle_lunch_money);
    $ss->assign('meal1_middle_dinner_price', $noidung->meal1_middle_dinner_price);
    $ss->assign('meal1_middle_dinner_num', $noidung->meal1_middle_dinner_num);
    $ss->assign('meal1_middle_dinner_money', $noidung->meal1_middle_dinner_money);
    $ss->assign('meal1_middle_other_price', $noidung->meal1_middle_other_price);
    $ss->assign('meal1_middle_other_num', $noidung->meal1_middle_other_num);
    $ss->assign('meal1_middle_other_money', $noidung->meal1_middle_other_money);


    $ss->assign('meal1_north_sum', $noidung->meal1_north_sum);
    $ss->assign('meal1_north1', $noidung->meal1_north1);
    $ss->assign('meal1_north2', $noidung->meal1_north2);
    $ss->assign('meal1_north3', $noidung->meal1_north3);
    $ss->assign('meal1_north4', $noidung->meal1_north4);
    $ss->assign('meal1_north5', $noidung->meal1_north5);
    $ss->assign('meal1_north6', $noidung->meal1_north6);
    $ss->assign('meal1_north7', $noidung->meal1_north7);
    $ss->assign('meal1_north8', $noidung->meal1_north8);
    $ss->assign('meal1_north9', $noidung->meal1_north9);
    $ss->assign('meal1_north10', $noidung->meal1_north10);
    $ss->assign('meal1_north11', $noidung->meal1_north11);
    $ss->assign('meal1_north12', $noidung->meal1_north12);
    $ss->assign('meal1_north13', $noidung->meal1_north13);
    $ss->assign('meal1_north14', $noidung->meal1_north14);
    $ss->assign('meal1_north15', $noidung->meal1_north15);
    $ss->assign('meal1_north16', $noidung->meal1_north16);
    $ss->assign('meal1_north17', $noidung->meal1_north17);
    $ss->assign('meal1_north18', $noidung->meal1_north18);
    $ss->assign('meal1_north19', $noidung->meal1_north19);
    $ss->assign('meal1_north20', $noidung->meal1_north20);
    $ss->assign('meal1_north21', $noidung->meal1_north21);
    $ss->assign('meal1_north22', $noidung->meal1_north22);
    $ss->assign('meal1_north23', $noidung->meal1_north23);
    $ss->assign('meal1_north24', $noidung->meal1_north24);
    $ss->assign('meal1_north25', $noidung->meal1_north25);
    $ss->assign('meal1_north26', $noidung->meal1_north26);
    $ss->assign('meal1_north27', $noidung->meal1_north27);
    $ss->assign('meal1_north28', $noidung->meal1_north28);
    $ss->assign('meal1_north29', $noidung->meal1_north29);
    $ss->assign('meal1_north30', $noidung->meal1_north30);


    $ss->assign('meal1_north_breakfirst_price', $noidung->meal1_north_breakfirst_price);
    $ss->assign('meal1_north_breakfirst_num', $noidung->meal1_north_breakfirst_num);
    $ss->assign('meal1_north_lunch_price', $noidung->meal1_north_lunch_price);
    $ss->assign('meal1_north_lunch_num', $noidung->meal1_north_lunch_num);
    $ss->assign('meal1_north_lunch_money', $noidung->meal1_north_lunch_money);
    $ss->assign('meal1_north_dinner_price', $noidung->meal1_north_dinner_price);
    $ss->assign('meal1_north_dinner_num', $noidung->meal1_north_dinner_num);
    $ss->assign('meal1_north_dinner_money', $noidung->meal1_north_dinner_money);
    $ss->assign('meal1_north_other_price', $noidung->meal1_north_other_price);
    $ss->assign('meal1_north_other_num', $noidung->meal1_north_other_num);
    $ss->assign('meal1_north_other_money', $noidung->meal1_north_other_money);



    $ss->assign('hotel1_sum', $noidung->hotel1_sum);
    $ss->assign('hotel1_1', $noidung->hotel1_1);
    $ss->assign('hotel1_2', $noidung->hotel1_2);
    $ss->assign('hotel1_3', $noidung->hotel1_3);
    $ss->assign('hotel1_4', $noidung->hotel1_4);
    $ss->assign('hotel1_5', $noidung->hotel1_5);
    $ss->assign('hotel1_6', $noidung->hotel1_6);
    $ss->assign('hotel1_7', $noidung->hotel1_7);
    $ss->assign('hotel1_8', $noidung->hotel1_8);
    $ss->assign('hotel1_9', $noidung->hotel1_9);
    $ss->assign('hotel1_10', $noidung->hotel1_10);
    $ss->assign('hotel1_11', $noidung->hotel1_11);
    $ss->assign('hotel1_12', $noidung->hotel1_12);
    $ss->assign('hotel1_13', $noidung->hotel1_13);
    $ss->assign('hotel1_14', $noidung->hotel1_14);
    $ss->assign('hotel1_15', $noidung->hotel1_15);
    $ss->assign('hotel1_16', $noidung->hotel1_16);
    $ss->assign('hotel1_17', $noidung->hotel1_17);
    $ss->assign('hotel1_18', $noidung->hotel1_18);
    $ss->assign('hotel1_19', $noidung->hotel1_19);
    $ss->assign('hotel1_20', $noidung->hotel1_20);
    $ss->assign('hotel1_21', $noidung->hotel1_21);
    $ss->assign('hotel1_22', $noidung->hotel1_22);
    $ss->assign('hotel1_23', $noidung->hotel1_23);
    $ss->assign('hotel1_24', $noidung->hotel1_24);
    $ss->assign('hotel1_25', $noidung->hotel1_25);
    $ss->assign('hotel1_26', $noidung->hotel1_26);
    $ss->assign('hotel1_27', $noidung->hotel1_27);
    $ss->assign('hotel1_28', $noidung->hotel1_28);
    $ss->assign('hotel1_29', $noidung->hotel1_29);
    $ss->assign('hotel1_30', $noidung->hotel1_30);

    $hotel1 = $noidung->hotel1;
    if(count($hotel1)>0){
        foreach($hotel1 as $value){
            $hotel1_html .= '<tr>
            <td style="border-left:1px solid #999"><input name="hotel1_service[]" type="text" id="hotel1_service[]" size="30" value="'.$value->hotel1_service.'" /></td>
            <td><input class="calculate hotel1_price" name="hotel1_price[]" type="text" id="hotel1_price" size="10" value="'.$value->hotel1_price.'" /></td>
            <td><input class="calculate hotel1_num" name="hotel1_num[]" type="text" id="hotel1_num" size="10" value="'.$value->hotel1_num.'" /></td>
            <td><input class="calculate hotel1_money" readonly="readonly" name="hotel1_money[]" type="text" id="hotel1_money" size="10" value="'.$value->hotel1_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }
    
    $ss->assign('count_hotel1',count($hotel1)) ;
    $ss->assign('hotel1_html',$hotel1_html) ;

    $ss->assign('foc1_21', $noidung->foc1_21);
    $ss->assign('foc1_22', $noidung->foc1_22);
    $ss->assign('foc1_23', $noidung->foc1_23);
    $ss->assign('foc1_24', $noidung->foc1_24);
    $ss->assign('foc1_25', $noidung->foc1_25);
    $ss->assign('foc1_26', $noidung->foc1_26);
    $ss->assign('foc1_27', $noidung->foc1_27);
    $ss->assign('foc1_28', $noidung->foc1_28);
    $ss->assign('foc1_29', $noidung->foc1_29);
    
    
    $ss->assign('nett1_1', $noidung->nett1_1);
    $ss->assign('nett1_2', $noidung->nett1_2);
    $ss->assign('nett1_3', $noidung->nett1_3);
    $ss->assign('nett1_4', $noidung->nett1_4);
    $ss->assign('nett1_5', $noidung->nett1_5);
    $ss->assign('nett1_6', $noidung->nett1_6);
    $ss->assign('nett1_7', $noidung->nett1_7);
    $ss->assign('nett1_8', $noidung->nett1_8);
    $ss->assign('nett1_9', $noidung->nett1_9);
    $ss->assign('nett1_10', $noidung->nett1_10);
    $ss->assign('nett1_11', $noidung->nett1_11);
    $ss->assign('nett1_12', $noidung->nett1_12);
    $ss->assign('nett1_13', $noidung->nett1_13);
    $ss->assign('nett1_14', $noidung->nett1_14);
    $ss->assign('nett1_15', $noidung->nett1_15);
    $ss->assign('nett1_16', $noidung->nett1_16);
    $ss->assign('nett1_17', $noidung->nett1_17);
    $ss->assign('nett1_18', $noidung->nett1_18);
    $ss->assign('nett1_19', $noidung->nett1_19);
    $ss->assign('nett1_20', $noidung->nett1_20);
    $ss->assign('nett1_21', $noidung->nett1_21);
    $ss->assign('nett1_22', $noidung->nett1_22);
    $ss->assign('nett1_23', $noidung->nett1_23);
    $ss->assign('nett1_24', $noidung->nett1_24);
    $ss->assign('nett1_25', $noidung->nett1_25);
    $ss->assign('nett1_26', $noidung->nett1_26);
    $ss->assign('nett1_27', $noidung->nett1_27);
    $ss->assign('nett1_28', $noidung->nett1_28);
    $ss->assign('nett1_29', $noidung->nett1_29);
    $ss->assign('nett1_30', $noidung->nett1_30);
    $ss->assign('nett1_31', $noidung->nett1_31);
    $ss->assign('nett1_32', $noidung->nett1_32);
    
    

    $ss->assign('service1_rate', $noidung->service1_rate);
    $ss->assign('service1_1', $noidung->service1_1);
    $ss->assign('service1_2', $noidung->service1_2);
    $ss->assign('service1_5', $noidung->service1_5);
    $ss->assign('service1_6', $noidung->service1_6);
    $ss->assign('service1_9', $noidung->service1_9);
    $ss->assign('service1_10', $noidung->service1_10);
    $ss->assign('service1_13', $noidung->service1_13);
    $ss->assign('service1_14', $noidung->service1_14);
    $ss->assign('service1_17', $noidung->service1_17);
    $ss->assign('service1_18', $noidung->service1_18);
    $ss->assign('service1_21', $noidung->service1_21);
    $ss->assign('service1_22', $noidung->service1_22);
    $ss->assign('service1_25', $noidung->service1_25);
    $ss->assign('service1_26', $noidung->service1_26);
    $ss->assign('service1_27', $noidung->service1_27);
    $ss->assign('service1_31', $noidung->service1_31);

    $ss->assign('sell1_vnd1', $noidung->sell1_vnd1);
    $ss->assign('sell1_vnd2', $noidung->sell1_vnd2);
    $ss->assign('sell1_vnd3', $noidung->sell1_vnd3);
    $ss->assign('sell1_vnd4', $noidung->sell1_vnd4);
    $ss->assign('sell1_vnd5', $noidung->sell1_vnd5);
    $ss->assign('sell1_vnd6', $noidung->sell1_vnd6);
    $ss->assign('sell1_vnd7', $noidung->sell1_vnd7);
    $ss->assign('sell1_vnd8', $noidung->sell1_vnd8);
    $ss->assign('sell1_vnd9', $noidung->sell1_vnd9);
    $ss->assign('sell1_vnd10', $noidung->sell1_vnd10);
    $ss->assign('sell1_vnd11', $noidung->sell1_vnd11);
    $ss->assign('sell1_vnd12', $noidung->sell1_vnd12);
    $ss->assign('sell1_vnd13', $noidung->sell1_vnd13);
    $ss->assign('sell1_vnd14', $noidung->sell1_vnd14);
    $ss->assign('sell1_vnd15', $noidung->sell1_vnd15);
    $ss->assign('sell1_vnd16', $noidung->sell1_vnd16);
    $ss->assign('sell1_vnd17', $noidung->sell1_vnd17);
    $ss->assign('sell1_vnd18', $noidung->sell1_vnd18);
    $ss->assign('sell1_vnd19', $noidung->sell1_vnd19);
    $ss->assign('sell1_vnd20', $noidung->sell1_vnd20);
    $ss->assign('sell1_vnd21', $noidung->sell1_vnd21);
    $ss->assign('sell1_vnd22', $noidung->sell1_vnd22);
    $ss->assign('sell1_vnd23', $noidung->sell1_vnd23);
    $ss->assign('sell1_vnd24', $noidung->sell1_vnd24);
    $ss->assign('sell1_vnd25', $noidung->sell1_vnd25);
    $ss->assign('sell1_vnd26', $noidung->sell1_vnd26);
    $ss->assign('sell1_vnd27', $noidung->sell1_vnd27);
    $ss->assign('sell1_vnd28', $noidung->sell1_vnd28);
    $ss->assign('sell1_vnd29', $noidung->sell1_vnd29);
    $ss->assign('sell1_vnd30', $noidung->sell1_vnd30);
    $ss->assign('sell1_vnd31', $noidung->sell1_vnd31);
    $ss->assign('sell1_vnd32', $noidung->sell1_vnd32);


    $ss->assign('sell1_usd1', $noidung->sell1_usd1);
    $ss->assign('sell1_usd2', $noidung->sell1_usd2);
    $ss->assign('sell1_usd5', $noidung->sell1_usd5);
    $ss->assign('sell1_usd6', $noidung->sell1_usd6);
    $ss->assign('sell1_usd9', $noidung->sell1_usd9);
    $ss->assign('sell1_usd10', $noidung->sell1_usd10);
    $ss->assign('sell1_usd13', $noidung->sell1_usd13);
    $ss->assign('sell1_usd17', $noidung->sell1_usd17);
    $ss->assign('sell1_usd18', $noidung->sell1_usd18);
    $ss->assign('sell1_usd21', $noidung->sell1_usd21);
    $ss->assign('sell1_usd22', $noidung->sell1_usd22);
    $ss->assign('sell1_usd25', $noidung->sell1_usd25);
    $ss->assign('sell1_usd26', $noidung->sell1_usd26);
    $ss->assign('sell1_usd27', $noidung->sell1_usd27);
    $ss->assign('sell1_usd31', $noidung->sell1_usd31);


    $ss->assign('tax1_1', $noidung->tax1_1);
    $ss->assign('tax1_2', $noidung->tax1_2);
    $ss->assign('tax1_5', $noidung->tax1_5);
    $ss->assign('tax1_6', $noidung->tax1_6);
    $ss->assign('tax1_9', $noidung->tax1_9);
    $ss->assign('tax1_10', $noidung->tax1_10);
    $ss->assign('tax1_13', $noidung->tax1_13);
    $ss->assign('tax1_14', $noidung->tax1_14);
    $ss->assign('tax1_17', $noidung->tax1_17);
    $ss->assign('tax1_18', $noidung->tax1_18);
    $ss->assign('tax1_21', $noidung->tax1_21);
    $ss->assign('tax1_22', $noidung->tax1_22);
    $ss->assign('tax1_25', $noidung->tax1_25);
    $ss->assign('tax1_26', $noidung->tax1_26);
    $ss->assign('tax1_27', $noidung->tax1_27);
    $ss->assign('tax1_31', $noidung->tax1_31);


    $ss->assign('profit1_1', $noidung->profit1_1);
    $ss->assign('profit1_2', $noidung->profit1_2);
    $ss->assign('profit1_5', $noidung->profit1_5);
    $ss->assign('profit1_6', $noidung->profit1_6);
    $ss->assign('profit1_9', $noidung->profit1_9);
    $ss->assign('profit1_10', $noidung->profit1_10);
    $ss->assign('profit1_13', $noidung->profit1_13);
    $ss->assign('profit1_14', $noidung->profit1_14);
    $ss->assign('profit1_17', $noidung->profit1_17);
    $ss->assign('profit1_18', $noidung->profit1_18);
    $ss->assign('profit1_21', $noidung->profit1_21);
    $ss->assign('profit1_22', $noidung->profit1_22);
    $ss->assign('profit1_25', $noidung->profit1_25);
    $ss->assign('profit1_26', $noidung->profit1_26);
    $ss->assign('profit1_27', $noidung->profit1_27);
    $ss->assign('profit1_31', $noidung->profit1_31);


    $ss->assign('total1_1', $noidung->total1_1);
    $ss->assign('total1_2', $noidung->total1_2);
    $ss->assign('total1_5', $noidung->total1_5);
    $ss->assign('total1_6', $noidung->total1_6);
    $ss->assign('total1_9', $noidung->total1_9);
    $ss->assign('total1_10', $noidung->total1_10);
    $ss->assign('total1_13', $noidung->total1_13);
    $ss->assign('total1_14', $noidung->total1_14);
    $ss->assign('total1_17', $noidung->total1_17);
    $ss->assign('total1_18', $noidung->total1_18);
    $ss->assign('total1_21', $noidung->total1_21);
    $ss->assign('total1_22', $noidung->total1_22);
    $ss->assign('total1_25', $noidung->total1_25);
    $ss->assign('total1_26', $noidung->total1_26);
    $ss->assign('total1_27', $noidung->total1_27);
    $ss->assign('total1_31', $noidung->total1_31);


    $ss->assign('interest1_1', $noidung->interest1_1);
    $ss->assign('interest1_2', $noidung->interest1_2);
    $ss->assign('interest1_5', $noidung->interest1_5);
    $ss->assign('interest1_6', $noidung->interest1_6);
    $ss->assign('interest1_9', $noidung->interest1_9);
    $ss->assign('interest1_10', $noidung->interest1_10);
    $ss->assign('interest1_13', $noidung->interest1_13);
    $ss->assign('interest1_14', $noidung->interest1_14);
    $ss->assign('interest1_17', $noidung->interest1_17);
    $ss->assign('interest1_18', $noidung->interest1_18);
    $ss->assign('interest1_21', $noidung->interest1_21);
    $ss->assign('interest1_22', $noidung->interest1_22);
    $ss->assign('interest1_25', $noidung->interest1_25);
    $ss->assign('interest1_26', $noidung->interest1_26);
    $ss->assign('interest1_27', $noidung->interest1_27);
    $ss->assign('interest1_31', $noidung->interest1_31);


    $ss->assign('meal2_sum', $noidung->meal2_sum);
    $ss->assign('meal2_1', $noidung->meal2_1);
    $ss->assign('meal2_2', $noidung->meal2_2);
    $ss->assign('meal2_3', $noidung->meal2_3);
    $ss->assign('meal2_4', $noidung->meal2_4);
    $ss->assign('meal2_5', $noidung->meal2_5);
    $ss->assign('meal2_6', $noidung->meal2_6);
    $ss->assign('meal2_7', $noidung->meal2_7);
    $ss->assign('meal2_8', $noidung->meal2_8);
    $ss->assign('meal2_9', $noidung->meal2_9);
    $ss->assign('meal2_10', $noidung->meal2_10);
    $ss->assign('meal2_11', $noidung->meal2_11);
    $ss->assign('meal2_12', $noidung->meal2_12);
    $ss->assign('meal2_13', $noidung->meal2_13);
    $ss->assign('meal2_14', $noidung->meal2_14);
    $ss->assign('meal2_15', $noidung->meal2_15);
    $ss->assign('meal2_16', $noidung->meal2_16);
    $ss->assign('meal2_17', $noidung->meal2_17);
    $ss->assign('meal2_18', $noidung->meal2_18);
    $ss->assign('meal2_19', $noidung->meal2_19);
    $ss->assign('meal2_20', $noidung->meal2_20);
    $ss->assign('meal2_21', $noidung->meal2_21);
    $ss->assign('meal2_22', $noidung->meal2_22);
    $ss->assign('meal2_23', $noidung->meal2_23);
    $ss->assign('meal2_24', $noidung->meal2_24);
    $ss->assign('meal2_25', $noidung->meal2_25);
    $ss->assign('meal2_26', $noidung->meal2_26);
    $ss->assign('meal2_27', $noidung->meal2_27);
    $ss->assign('meal2_28', $noidung->meal2_28);
    $ss->assign('meal2_29', $noidung->meal2_29);
    $ss->assign('meal2_30', $noidung->meal2_30);


    $ss->assign('meal2_south_sum', $noidung->meal2_south_sum);
    $ss->assign('meal2_south1', $noidung->meal2_south1);
    $ss->assign('meal2_south2', $noidung->meal2_south2);
    $ss->assign('meal2_south3', $noidung->meal2_south3);
    $ss->assign('meal2_south4', $noidung->meal2_south4);
    $ss->assign('meal2_south5', $noidung->meal2_south5);
    $ss->assign('meal2_south6', $noidung->meal2_south6);
    $ss->assign('meal2_south7', $noidung->meal2_south7);
    $ss->assign('meal2_south8', $noidung->meal2_south8);
    $ss->assign('meal2_south9', $noidung->meal2_south9);
    $ss->assign('meal2_south10', $noidung->meal2_south10);
    $ss->assign('meal2_south11', $noidung->meal2_south11);
    $ss->assign('meal2_south12', $noidung->meal2_south12);
    $ss->assign('meal2_south13', $noidung->meal2_south13);
    $ss->assign('meal2_south14', $noidung->meal2_south14);
    $ss->assign('meal2_south15', $noidung->meal2_south15);
    $ss->assign('meal2_south16', $noidung->meal2_south16);
    $ss->assign('meal2_south17', $noidung->meal2_south17);
    $ss->assign('meal2_south18', $noidung->meal2_south18);
    $ss->assign('meal2_south19', $noidung->meal2_south19);
    $ss->assign('meal2_south20', $noidung->meal2_south20);
    $ss->assign('meal2_south21', $noidung->meal2_south21);
    $ss->assign('meal2_south22', $noidung->meal2_south22);
    $ss->assign('meal2_south23', $noidung->meal2_south23);
    $ss->assign('meal2_south24', $noidung->meal2_south24);
    $ss->assign('meal2_south25', $noidung->meal2_south25);
    $ss->assign('meal2_south26', $noidung->meal2_south26);
    $ss->assign('meal2_south27', $noidung->meal2_south27);
    $ss->assign('meal2_south28', $noidung->meal2_south28);
    $ss->assign('meal2_south29', $noidung->meal2_south29);
    $ss->assign('meal2_south30', $noidung->meal2_south30);


    $ss->assign('meal2_south_breakfirst_price', $noidung->meal2_south_breakfirst_price);
    $ss->assign('meal2_south_breakfirst_num', $noidung->meal2_south_breakfirst_num);
    $ss->assign('meal2_south_breakfirst_money', $noidung->meal2_south_breakfirst_money);
    $ss->assign('meal2_south_lunch_price', $noidung->meal2_south_lunch_price);
    $ss->assign('meal2_south_lunch_num', $noidung->meal2_south_lunch_num);
    $ss->assign('meal2_south_lunch_money', $noidung->meal2_south_lunch_money);
    $ss->assign('meal2_south_dinner_price', $noidung->meal2_south_dinner_price);
    $ss->assign('meal2_south_dinner_num', $noidung->meal2_south_dinner_num);
    $ss->assign('meal2_south_dinner_money', $noidung->meal2_south_dinner_money);
    $ss->assign('meal2_south_other_price', $noidung->meal2_south_other_price);
    $ss->assign('meal2_south_other_num', $noidung->meal2_south_other_num);
    $ss->assign('meal2_south_other_money', $noidung->meal2_south_other_money);


    $ss->assign('meal2_miidle_sum', $noidung->meal2_miidle_sum);
    $ss->assign('meal2_middle1', $noidung->meal2_middle1);
    $ss->assign('meal2_middle2', $noidung->meal2_middle2);
    $ss->assign('meal2_middle3', $noidung->meal2_middle3);
    $ss->assign('meal2_middle4', $noidung->meal2_middle4);
    $ss->assign('meal2_middle5', $noidung->meal2_middle5);
    $ss->assign('meal2_middle6', $noidung->meal2_middle6);
    $ss->assign('meal2_middle7', $noidung->meal2_middle7);
    $ss->assign('meal2_middle8', $noidung->meal2_middle8);
    $ss->assign('meal2_middle9', $noidung->meal2_middle9);
    $ss->assign('meal2_middle10', $noidung->meal2_middle10);
    $ss->assign('meal2_middle11', $noidung->meal2_middle11);
    $ss->assign('meal2_middle12', $noidung->meal2_middle12);
    $ss->assign('meal2_middle13', $noidung->meal2_middle13);
    $ss->assign('meal2_middle14', $noidung->meal2_middle14);
    $ss->assign('meal2_middle15', $noidung->meal2_middle15);
    $ss->assign('meal2_middle16', $noidung->meal2_middle16);
    $ss->assign('meal2_middle17', $noidung->meal2_middle17);
    $ss->assign('meal2_middle18', $noidung->meal2_middle18);
    $ss->assign('meal2_middle19', $noidung->meal2_middle19);
    $ss->assign('meal2_middle20', $noidung->meal2_middle20);
    $ss->assign('meal2_middle21', $noidung->meal2_middle21);
    $ss->assign('meal2_middle22', $noidung->meal2_middle22);
    $ss->assign('meal2_middle23', $noidung->meal2_middle23);
    $ss->assign('meal2_middle24', $noidung->meal2_middle24);
    $ss->assign('meal2_middle25', $noidung->meal2_middle25);
    $ss->assign('meal2_middle26', $noidung->meal2_middle26);
    $ss->assign('meal2_middle27', $noidung->meal2_middle27);
    $ss->assign('meal2_middle28', $noidung->meal2_middle28);
    $ss->assign('meal2_middle29', $noidung->meal2_middle29);
    $ss->assign('meal2_middle30', $noidung->meal2_middle30);


    $ss->assign('meal2_middle_breakfirst_price', $noidung->meal2_middle_breakfirst_price);
    $ss->assign('meal2_middle_breakfirst_num', $noidung->meal2_middle_breakfirst_num);
    $ss->assign('meal2_middle_breakfirst_money', $noidung->meal2_middle_breakfirst_money);
    $ss->assign('meal2_middle_lunch_price', $noidung->meal2_middle_lunch_price);
    $ss->assign('meal2_middle_lunch_num', $noidung->meal2_middle_lunch_num);
    $ss->assign('meal2_middle_lunch_money', $noidung->meal2_middle_lunch_money);
    $ss->assign('meal2_middle_dinner_price', $noidung->meal2_middle_dinner_price);
    $ss->assign('meal2_middle_dinner_num', $noidung->meal2_middle_dinner_num);
    $ss->assign('meal2_middle_dinner_money', $noidung->meal2_middle_dinner_money);
    $ss->assign('meal2_middle_other_price', $noidung->meal2_middle_other_price);
    $ss->assign('meal2_middle_other_num', $noidung->meal2_middle_other_num);
    $ss->assign('meal2_middle_other_money', $noidung->meal2_middle_other_money);


    $ss->assign('meal2_north_sum', $noidung->meal2_north_sum);
    $ss->assign('meal2_north1', $noidung->meal2_north1);
    $ss->assign('meal2_north2', $noidung->meal2_north2);
    $ss->assign('meal2_north3', $noidung->meal2_north3);
    $ss->assign('meal2_north4', $noidung->meal2_north4);
    $ss->assign('meal2_north5', $noidung->meal2_north5);
    $ss->assign('meal2_north6', $noidung->meal2_north6);
    $ss->assign('meal2_north7', $noidung->meal2_north7);
    $ss->assign('meal2_north8', $noidung->meal2_north8);
    $ss->assign('meal2_north9', $noidung->meal2_north9);
    $ss->assign('meal2_north10', $noidung->meal2_north10);
    $ss->assign('meal2_north11', $noidung->meal2_north11);
    $ss->assign('meal2_north12', $noidung->meal2_north12);
    $ss->assign('meal2_north13', $noidung->meal2_north13);
    $ss->assign('meal2_north14', $noidung->meal2_north14);
    $ss->assign('meal2_north15', $noidung->meal2_north15);
    $ss->assign('meal2_north16', $noidung->meal2_north16);
    $ss->assign('meal2_north17', $noidung->meal2_north17);
    $ss->assign('meal2_north18', $noidung->meal2_north18);
    $ss->assign('meal2_north19', $noidung->meal2_north19);
    $ss->assign('meal2_north20', $noidung->meal2_north20);
    $ss->assign('meal2_north21', $noidung->meal2_north21);
    $ss->assign('meal2_north22', $noidung->meal2_north22);
    $ss->assign('meal2_north23', $noidung->meal2_north23);
    $ss->assign('meal2_north24', $noidung->meal2_north24);
    $ss->assign('meal2_north25', $noidung->meal2_north25);
    $ss->assign('meal2_north26', $noidung->meal2_north26);
    $ss->assign('meal2_north27', $noidung->meal2_north27);
    $ss->assign('meal2_north28', $noidung->meal2_north28);
    $ss->assign('meal2_north29', $noidung->meal2_north29);
    $ss->assign('meal2_north30', $noidung->meal2_north30);


    $ss->assign('meal2_north_breakfirst_price', $noidung->meal2_north_breakfirst_price);
    $ss->assign('meal2_north_breakfirst_num', $noidung->meal2_north_breakfirst_num);
    $ss->assign('meal2_north_breakfirst_money', $noidung->meal2_north_breakfirst_money);
    $ss->assign('meal2_north_lunch_price', $noidung->meal2_north_lunch_price);
    $ss->assign('meal2_north_lunch_num', $noidung->meal2_north_lunch_num);
    $ss->assign('meal2_north_lunch_money', $noidung->meal2_north_lunch_money);
    $ss->assign('meal2_north_dinner_price', $noidung->meal2_north_dinner_price);
    $ss->assign('meal2_north_dinner_num', $noidung->meal2_north_dinner_num);
    $ss->assign('meal2_north_dinner_money', $noidung->meal2_north_dinner_money);
    $ss->assign('meal2_north_other_price', $noidung->meal2_north_other_price);
    $ss->assign('meal2_north_other_num', $noidung->meal2_north_other_num);
    $ss->assign('meal2_north_other_money', $noidung->meal2_north_other_money);


    $ss->assign('hotel2_sum', $noidung->hotel2_sum);
    $ss->assign('hotel2_1', $noidung->hotel2_1);
    $ss->assign('hotel2_2', $noidung->hotel2_2);
    $ss->assign('hotel2_3', $noidung->hotel2_3);
    $ss->assign('hotel2_4', $noidung->hotel2_4);
    $ss->assign('hotel2_5', $noidung->hotel2_5);
    $ss->assign('hotel2_6', $noidung->hotel2_6);
    $ss->assign('hotel2_7', $noidung->hotel2_7);
    $ss->assign('hotel2_8', $noidung->hotel2_8);
    $ss->assign('hotel2_9', $noidung->hotel2_9);
    $ss->assign('hotel2_10', $noidung->hotel2_10);
    $ss->assign('hotel2_11', $noidung->hotel2_11);
    $ss->assign('hotel2_12', $noidung->hotel2_12);
    $ss->assign('hotel2_13', $noidung->hotel2_13);
    $ss->assign('hotel2_14', $noidung->hotel2_14);
    $ss->assign('hotel2_15', $noidung->hotel2_15);
    $ss->assign('hotel2_16', $noidung->hotel2_16);
    $ss->assign('hotel2_17', $noidung->hotel2_17);
    $ss->assign('hotel2_18', $noidung->hotel2_18);
    $ss->assign('hotel2_19', $noidung->hotel2_19);
    $ss->assign('hotel2_20', $noidung->hotel2_20);
    $ss->assign('hotel2_21', $noidung->hotel2_21);
    $ss->assign('hotel2_22', $noidung->hotel2_22);
    $ss->assign('hotel2_23', $noidung->hotel2_23);
    $ss->assign('hotel2_24', $noidung->hotel2_24);
    $ss->assign('hotel2_25', $noidung->hotel2_25);
    $ss->assign('hotel2_26', $noidung->hotel2_26);
    $ss->assign('hotel2_27', $noidung->hotel2_27);
    $ss->assign('hotel2_28', $noidung->hotel2_28);
    $ss->assign('hotel2_29', $noidung->hotel2_29);
    $ss->assign('hotel2_30', $noidung->hotel2_30);

    $hotel2 = $noidung->hotel2;
    if(count($hotel2)>0){
        foreach($hotel2 as $value){
            $hotel2_html .= '<tr>
            <td style="border-left:1px solid #999"><input name="hotel2_service[]" type="text" id="hotel2_service[]" size="30" value="'.$value->hotel2_service.'" /></td>
            <td><input class="calculate hotel2_price" name="hotel2_price[]" type="text" id="hotel2_price" size="10" value="'.$value->hotel2_price.'" /></td>
            <td><input class="calculate hotel2_num" name="hotel2_num[]" type="text" id="hotel2_num" size="10" value="'.$value->hotel2_num.'" /></td>
            <td><input class="calculate hotel2_money" readonly="readonly" name="hotel2_money[]" type="text" id="hotel2_money" size="10" value="'.$value->hotel2_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }
    $ss->assign('count_hotel2',count($hotel2)) ;
    $ss->assign('hotel2_html',$hotel2_html) ;


    $ss->assign('foc2_21', $noidung->foc2_21);
    $ss->assign('foc2_22', $noidung->foc2_21);
    $ss->assign('foc2_23', $noidung->foc2_21);
    $ss->assign('foc2_24', $noidung->foc2_21);
    $ss->assign('foc2_25', $noidung->foc2_21);
    $ss->assign('foc2_26', $noidung->foc2_21);
    $ss->assign('foc2_27', $noidung->foc2_21);
    $ss->assign('foc2_28', $noidung->foc2_21);
    $ss->assign('foc2_29', $noidung->foc2_21);
    $ss->assign('foc2_30', $noidung->foc2_21);


    $ss->assign('nett2_1', $noidung->nett2_1);
    $ss->assign('nett2_2', $noidung->nett2_2);
    $ss->assign('nett2_3', $noidung->nett2_3);
    $ss->assign('nett2_4', $noidung->nett2_4);
    $ss->assign('nett2_5', $noidung->nett2_5);
    $ss->assign('nett2_6', $noidung->nett2_6);
    $ss->assign('nett2_7', $noidung->nett2_7);
    $ss->assign('nett2_8', $noidung->nett2_8);
    $ss->assign('nett2_9', $noidung->nett2_9);
    $ss->assign('nett2_10', $noidung->nett2_10);
    $ss->assign('nett2_11', $noidung->nett2_11);
    $ss->assign('nett2_12', $noidung->nett2_12);
    $ss->assign('nett2_13', $noidung->nett2_13);
    $ss->assign('nett2_14', $noidung->nett2_14);
    $ss->assign('nett2_15', $noidung->nett2_15);
    $ss->assign('nett2_16', $noidung->nett2_16);
    $ss->assign('nett2_17', $noidung->nett2_17);
    $ss->assign('nett2_18', $noidung->nett2_18);
    $ss->assign('nett2_19', $noidung->nett2_19);
    $ss->assign('nett2_20', $noidung->nett2_20);
    $ss->assign('nett2_21', $noidung->nett2_21);
    $ss->assign('nett2_22', $noidung->nett2_22);
    $ss->assign('nett2_23', $noidung->nett2_23);
    $ss->assign('nett2_24', $noidung->nett2_24);
    $ss->assign('nett2_25', $noidung->nett2_25);
    $ss->assign('nett2_26', $noidung->nett2_26);
    $ss->assign('nett2_27', $noidung->nett2_27);
    $ss->assign('nett2_28', $noidung->nett2_28);
    $ss->assign('nett2_29', $noidung->nett2_29);
    $ss->assign('nett2_30', $noidung->nett2_30);
    $ss->assign('nett2_31', $noidung->nett2_31);
    $ss->assign('nett2_32', $noidung->nett2_32);


    $ss->assign('service2_rate', $noidung->service2_rate);
    $ss->assign('service2_1', $noidung->service2_1);
    $ss->assign('service2_2', $noidung->service2_2);
    $ss->assign('service2_5', $noidung->service2_5);
    $ss->assign('service2_6', $noidung->service2_6);
    $ss->assign('service2_9', $noidung->service2_9);
    $ss->assign('service2_10', $noidung->service2_10);
    $ss->assign('service2_13', $noidung->service2_13);
    $ss->assign('service2_14', $noidung->service2_14);
    $ss->assign('service2_17', $noidung->service2_17);
    $ss->assign('service2_18', $noidung->service2_18);
    $ss->assign('service2_21', $noidung->service2_21);
    $ss->assign('service2_22', $noidung->service2_22);
    $ss->assign('service2_25', $noidung->service2_25);
    $ss->assign('service2_26', $noidung->service2_26);
    $ss->assign('service2_27', $noidung->service2_27);
    $ss->assign('service2_31', $noidung->service2_31);


    $ss->assign('sell2_vnd1', $noidung->sell2_vnd1);
    $ss->assign('sell2_vnd2', $noidung->sell2_vnd2);
    $ss->assign('sell2_vnd3', $noidung->sell2_vnd3);
    $ss->assign('sell2_vnd4', $noidung->sell2_vnd4);
    $ss->assign('sell2_vnd5', $noidung->sell2_vnd5);
    $ss->assign('sell2_vnd6', $noidung->sell2_vnd6);
    $ss->assign('sell2_vnd7', $noidung->sell2_vnd7);
    $ss->assign('sell2_vnd8', $noidung->sell2_vnd8);
    $ss->assign('sell2_vnd9', $noidung->sell2_vnd9);
    $ss->assign('sell2_vnd10', $noidung->sell2_vnd10);
    $ss->assign('sell2_vnd11', $noidung->sell2_vnd11);
    $ss->assign('sell2_vnd12', $noidung->sell2_vnd12);
    $ss->assign('sell2_vnd13', $noidung->sell2_vnd13);
    $ss->assign('sell2_vnd14', $noidung->sell2_vnd14);
    $ss->assign('sell2_vnd15', $noidung->sell2_vnd15);
    $ss->assign('sell2_vnd16', $noidung->sell2_vnd16);
    $ss->assign('sell2_vnd17', $noidung->sell2_vnd17);
    $ss->assign('sell2_vnd18', $noidung->sell2_vnd18);
    $ss->assign('sell2_vnd19', $noidung->sell2_vnd19);
    $ss->assign('sell2_vnd20', $noidung->sell2_vnd20);
    $ss->assign('sell2_vnd21', $noidung->sell2_vnd21);
    $ss->assign('sell2_vnd22', $noidung->sell2_vnd22);
    $ss->assign('sell2_vnd23', $noidung->sell2_vnd23);
    $ss->assign('sell2_vnd24', $noidung->sell2_vnd24);
    $ss->assign('sell2_vnd25', $noidung->sell2_vnd25);
    $ss->assign('sell2_vnd26', $noidung->sell2_vnd26);
    $ss->assign('sell2_vnd27', $noidung->sell2_vnd27);
    $ss->assign('sell2_vnd28', $noidung->sell2_vnd28);
    $ss->assign('sell2_vnd29', $noidung->sell2_vnd29);
    $ss->assign('sell2_vnd30', $noidung->sell2_vnd30);
    $ss->assign('sell2_vnd31', $noidung->sell2_vnd31);
    $ss->assign('sell2_vnd32', $noidung->sell2_vnd32);


    $ss->assign('sell2_usd1', $noidung->sell2_usd1);
    $ss->assign('sell2_usd2', $noidung->sell2_usd2);
    $ss->assign('sell2_usd5', $noidung->sell2_usd5);
    $ss->assign('sell2_usd6', $noidung->sell2_usd6);
    $ss->assign('sell2_usd9', $noidung->sell2_usd9);
    $ss->assign('sell2_usd10', $noidung->sell2_usd10);
    $ss->assign('sell2_usd13', $noidung->sell2_usd13);
    $ss->assign('sell2_usd14', $noidung->sell2_usd14);
    $ss->assign('sell2_usd17', $noidung->sell2_usd17);
    $ss->assign('sell2_usd18', $noidung->sell2_usd18);
    $ss->assign('sell2_usd21', $noidung->sell2_usd21);
    $ss->assign('sell2_usd22', $noidung->sell2_usd22);
    $ss->assign('sell2_usd25', $noidung->sell2_usd25);
    $ss->assign('sell2_usd26', $noidung->sell2_usd26);
    $ss->assign('sell2_usd27', $noidung->sell2_usd27);
    $ss->assign('sell2_usd31', $noidung->sell2_usd31);


    $ss->assign('tax2_1', $noidung->tax2_1);
    $ss->assign('tax2_2', $noidung->tax2_2);
    $ss->assign('tax2_5', $noidung->tax2_5);
    $ss->assign('tax2_6', $noidung->tax2_6);
    $ss->assign('tax2_9', $noidung->tax2_9);
    $ss->assign('tax2_10', $noidung->tax2_10);
    $ss->assign('tax2_13', $noidung->tax2_13);
    $ss->assign('tax2_14', $noidung->tax2_14);
    $ss->assign('tax2_17', $noidung->tax2_17);
    $ss->assign('tax2_18', $noidung->tax2_18);
    $ss->assign('tax2_21', $noidung->tax2_21);
    $ss->assign('tax2_22', $noidung->tax2_22);
    $ss->assign('tax2_25', $noidung->tax2_25);
    $ss->assign('tax2_26', $noidung->tax2_26);
    $ss->assign('tax2_27', $noidung->tax2_27);
    $ss->assign('tax2_31', $noidung->tax2_31);


    $ss->assign('profit2_1', $noidung->profit2_1);
    $ss->assign('profit2_2', $noidung->profit2_2);
    $ss->assign('profit2_5', $noidung->profit2_5);
    $ss->assign('profit2_6', $noidung->profit2_6);
    $ss->assign('profit2_9', $noidung->profit2_9);
    $ss->assign('profit2_10', $noidung->profit2_10);
    $ss->assign('profit2_13', $noidung->profit2_13);
    $ss->assign('profit2_14', $noidung->profit2_14);
    $ss->assign('profit2_17', $noidung->profit2_17);
    $ss->assign('profit2_18', $noidung->profit2_18);
    $ss->assign('profit2_21', $noidung->profit2_21);
    $ss->assign('profit2_22', $noidung->profit2_22);
    $ss->assign('profit2_25', $noidung->profit2_25);
    $ss->assign('profit2_26', $noidung->profit2_26);
    $ss->assign('profit2_27', $noidung->profit2_27);
    $ss->assign('profit2_31', $noidung->profit2_31);


    $ss->assign('total2_1', $noidung->total2_1);
    $ss->assign('total2_2', $noidung->total2_2);
    $ss->assign('total2_5', $noidung->total2_5);
    $ss->assign('total2_6', $noidung->total2_6);
    $ss->assign('total2_9', $noidung->total2_9);
    $ss->assign('total2_10', $noidung->total2_10);
    $ss->assign('total2_13', $noidung->total2_13);
    $ss->assign('total2_14', $noidung->total2_14);
    $ss->assign('total2_17', $noidung->total2_17);
    $ss->assign('total2_18', $noidung->total2_18);
    $ss->assign('total2_21', $noidung->total2_21);
    $ss->assign('total2_22', $noidung->total2_22);
    $ss->assign('total2_25', $noidung->total2_25);
    $ss->assign('total2_26', $noidung->total2_26);
    $ss->assign('total2_27', $noidung->total2_27);
    $ss->assign('total2_31', $noidung->total2_31);


    $ss->assign('interest2_1', $noidung->interest2_1);
    $ss->assign('interest2_2', $noidung->interest2_2);
    $ss->assign('interest2_5', $noidung->interest2_5);
    $ss->assign('interest2_6', $noidung->interest2_6);
    $ss->assign('interest2_9', $noidung->interest2_9);
    $ss->assign('interest2_10', $noidung->interest2_10);
    $ss->assign('interest2_13', $noidung->interest2_13);
    $ss->assign('interest2_14', $noidung->interest2_14);
    $ss->assign('interest2_17', $noidung->interest2_17);
    $ss->assign('interest2_18', $noidung->interest2_18);
    $ss->assign('interest2_21', $noidung->interest2_21);
    $ss->assign('interest2_22', $noidung->interest2_22);
    $ss->assign('interest2_25', $noidung->interest2_25);
    $ss->assign('interest2_26', $noidung->interest2_26);
    $ss->assign('interest2_27', $noidung->interest2_27);
    $ss->assign('interest2_31', $noidung->interest2_31);


    $ss->assign('meal3_sum', $noidung->meal3_sum);
    $ss->assign('meal3_1', $noidung->meal3_1);
    $ss->assign('meal3_2', $noidung->meal3_2);
    $ss->assign('meal3_3', $noidung->meal3_3);
    $ss->assign('meal3_4', $noidung->meal3_4);
    $ss->assign('meal3_5', $noidung->meal3_5);
    $ss->assign('meal3_6', $noidung->meal3_6);
    $ss->assign('meal3_7', $noidung->meal3_7);
    $ss->assign('meal3_8', $noidung->meal3_8);
    $ss->assign('meal3_9', $noidung->meal3_9);
    $ss->assign('meal3_10', $noidung->meal3_10);
    $ss->assign('meal3_11', $noidung->meal3_11);
    $ss->assign('meal3_12', $noidung->meal3_12);
    $ss->assign('meal3_13', $noidung->meal3_13);
    $ss->assign('meal3_14', $noidung->meal3_14);
    $ss->assign('meal3_15', $noidung->meal3_15);
    $ss->assign('meal3_16', $noidung->meal3_16);
    $ss->assign('meal3_17', $noidung->meal3_17);
    $ss->assign('meal3_18', $noidung->meal3_18);
    $ss->assign('meal3_19', $noidung->meal3_19);
    $ss->assign('meal3_20', $noidung->meal3_20);
    $ss->assign('meal3_21', $noidung->meal3_21);
    $ss->assign('meal3_22', $noidung->meal3_22);
    $ss->assign('meal3_23', $noidung->meal3_23);
    $ss->assign('meal3_24', $noidung->meal3_24);
    $ss->assign('meal3_25', $noidung->meal3_25);
    $ss->assign('meal3_26', $noidung->meal3_26);
    $ss->assign('meal3_27', $noidung->meal3_27);
    $ss->assign('meal3_28', $noidung->meal3_28);
    $ss->assign('meal3_29', $noidung->meal3_29);
    $ss->assign('meal3_30', $noidung->meal3_30);


    $ss->assign('meal3_south_sum', $noidung->meal3_south_sum);
    $ss->assign('meal3_south1', $noidung->meal3_south1);
    $ss->assign('meal3_south2', $noidung->meal3_south2);
    $ss->assign('meal3_south3', $noidung->meal3_south3);
    $ss->assign('meal3_south4', $noidung->meal3_south4);
    $ss->assign('meal3_south5', $noidung->meal3_south5);
    $ss->assign('meal3_south6', $noidung->meal3_south6);
    $ss->assign('meal3_south7', $noidung->meal3_south7);
    $ss->assign('meal3_south8', $noidung->meal3_south8);
    $ss->assign('meal3_south9', $noidung->meal3_south9);
    $ss->assign('meal3_south10', $noidung->meal3_south10);
    $ss->assign('meal3_south11', $noidung->meal3_south11);
    $ss->assign('meal3_south12', $noidung->meal3_south12);
    $ss->assign('meal3_south13', $noidung->meal3_south13);
    $ss->assign('meal3_south14', $noidung->meal3_south14);
    $ss->assign('meal3_south15', $noidung->meal3_south15);
    $ss->assign('meal3_south16', $noidung->meal3_south16);
    $ss->assign('meal3_south17', $noidung->meal3_south17);
    $ss->assign('meal3_south18', $noidung->meal3_south18);
    $ss->assign('meal3_south19', $noidung->meal3_south19);
    $ss->assign('meal3_south20', $noidung->meal3_south20);
    $ss->assign('meal3_south21', $noidung->meal3_south21);
    $ss->assign('meal3_south22', $noidung->meal3_south22);
    $ss->assign('meal3_south23', $noidung->meal3_south23);
    $ss->assign('meal3_south24', $noidung->meal3_south24);
    $ss->assign('meal3_south25', $noidung->meal3_south25);
    $ss->assign('meal3_south26', $noidung->meal3_south26);
    $ss->assign('meal3_south27', $noidung->meal3_south27);
    $ss->assign('meal3_south28', $noidung->meal3_south28);
    $ss->assign('meal3_south29', $noidung->meal3_south29);
    $ss->assign('meal3_south30', $noidung->meal3_south30);


    $ss->assign('meal3_south_breakfirst_price', $noidung->meal3_south_breakfirst_price);
    $ss->assign('meal3_south_breakfirst_num', $noidung->meal3_south_breakfirst_num);
    $ss->assign('meal3_south_breakfirst_money', $noidung->meal3_south_breakfirst_money);
    $ss->assign('meal3_south_lunch_price', $noidung->meal3_south_lunch_price);
    $ss->assign('meal3_south_lunch_num', $noidung->meal3_south_lunch_num);
    $ss->assign('meal3_south_lunch_money', $noidung->meal3_south_lunch_money);
    $ss->assign('meal3_south_dinner_price', $noidung->meal3_south_dinner_price);
    $ss->assign('meal3_south_dinner_num', $noidung->meal3_south_dinner_num);
    $ss->assign('meal3_south_dinner_money', $noidung->meal3_south_dinner_money);
    $ss->assign('meal3_south_other_price', $noidung->meal3_south_other_price);
    $ss->assign('meal3_south_other_num', $noidung->meal3_south_other_num);
    $ss->assign('meal3_south_other_money', $noidung->meal3_south_other_money);


    $ss->assign('meal3_miidle_sum', $noidung->meal3_miidle_sum);
    $ss->assign('meal3_middle1', $noidung->meal3_middle1);
    $ss->assign('meal3_middle2', $noidung->meal3_middle2);
    $ss->assign('meal3_middle3', $noidung->meal3_middle3);
    $ss->assign('meal3_middle4', $noidung->meal3_middle4);
    $ss->assign('meal3_middle5', $noidung->meal3_middle5);
    $ss->assign('meal3_middle6', $noidung->meal3_middle6);
    $ss->assign('meal3_middle7', $noidung->meal3_middle7);
    $ss->assign('meal3_middle8', $noidung->meal3_middle8);
    $ss->assign('meal3_middle9', $noidung->meal3_middle9);
    $ss->assign('meal3_middle10', $noidung->meal3_middle10);
    $ss->assign('meal3_middle11', $noidung->meal3_middle11);
    $ss->assign('meal3_middle12', $noidung->meal3_middle12);
    $ss->assign('meal3_middle13', $noidung->meal3_middle13);
    $ss->assign('meal3_middle15', $noidung->meal3_middle14);
    $ss->assign('meal3_middle16', $noidung->meal3_middle15);
    $ss->assign('meal3_middle17', $noidung->meal3_middle16);
    $ss->assign('meal3_middle18', $noidung->meal3_middle17);
    $ss->assign('meal3_middle19', $noidung->meal3_middle19);
    $ss->assign('meal3_middle20', $noidung->meal3_middle20);
    $ss->assign('meal3_middle21', $noidung->meal3_middle21);
    $ss->assign('meal3_middle22', $noidung->meal3_middle22);
    $ss->assign('meal3_middle23', $noidung->meal3_middle23);
    $ss->assign('meal3_middle24', $noidung->meal3_middle24);
    $ss->assign('meal3_middle25', $noidung->meal3_middle25);
    $ss->assign('meal3_middle26', $noidung->meal3_middle26);
    $ss->assign('meal3_middle27', $noidung->meal3_middle27);
    $ss->assign('meal3_middle28', $noidung->meal3_middle28);
    $ss->assign('meal3_middle29', $noidung->meal3_middle29);
    $ss->assign('meal3_middle30', $noidung->meal3_middle30);


    $ss->assign('meal3_middle_breakfirst_price', $noidung->meal3_middle_breakfirst_price);
    $ss->assign('meal3_middle_breakfirst_num', $noidung->meal3_middle_breakfirst_num);
    $ss->assign('meal3_middle_breakfirst_money', $noidung->meal3_middle_breakfirst_money);
    $ss->assign('meal3_middle_lunch_price', $noidung->meal3_middle_lunch_price);
    $ss->assign('meal3_middle_lunch_num', $noidung->meal3_middle_lunch_num);
    $ss->assign('meal3_middle_lunch_money', $noidung->meal3_middle_lunch_money);
    $ss->assign('meal3_middle_dinner_price', $noidung->meal3_middle_dinner_price);
    $ss->assign('meal3_middle_dinner_num', $noidung->meal3_middle_dinner_num);
    $ss->assign('meal3_middle_dinner_money', $noidung->meal3_middle_dinner_money);
    $ss->assign('meal3_middle_other_price', $noidung->meal3_middle_other_price);
    $ss->assign('meal3_middle_other_num', $noidung->meal3_middle_other_num);
    $ss->assign('meal3_middle_other_money', $noidung->meal3_middle_other_money);


    $ss->assign('meal3_north_sum', $noidung->meal3_north_sum);
    $ss->assign('meal3_north1', $noidung->meal3_north1);
    $ss->assign('meal3_north2', $noidung->meal3_north2);
    $ss->assign('meal3_north3', $noidung->meal3_north3);
    $ss->assign('meal3_north4', $noidung->meal3_north4);
    $ss->assign('meal3_north5', $noidung->meal3_north5);
    $ss->assign('meal3_north6', $noidung->meal3_north6);
    $ss->assign('meal3_north7', $noidung->meal3_north7);
    $ss->assign('meal3_north8', $noidung->meal3_north8);
    $ss->assign('meal3_north9', $noidung->meal3_north9);
    $ss->assign('meal3_north10', $noidung->meal3_north10);
    $ss->assign('meal3_north11', $noidung->meal3_north11);
    $ss->assign('meal3_north12', $noidung->meal3_north12);
    $ss->assign('meal3_north13', $noidung->meal3_north13);
    $ss->assign('meal3_north14', $noidung->meal3_north14);
    $ss->assign('meal3_north15', $noidung->meal3_north15);
    $ss->assign('meal3_north16', $noidung->meal3_north16);
    $ss->assign('meal3_north17', $noidung->meal3_north17);
    $ss->assign('meal3_north18', $noidung->meal3_north18);
    $ss->assign('meal3_north19', $noidung->meal3_north19);
    $ss->assign('meal3_north20', $noidung->meal3_north20);
    $ss->assign('meal3_north21', $noidung->meal3_north21);
    $ss->assign('meal3_north22', $noidung->meal3_north22);
    $ss->assign('meal3_north23', $noidung->meal3_north23);
    $ss->assign('meal3_north24', $noidung->meal3_north24);
    $ss->assign('meal3_north25', $noidung->meal3_north25);
    $ss->assign('meal3_north26', $noidung->meal3_north26);
    $ss->assign('meal3_north27', $noidung->meal3_north27);
    $ss->assign('meal3_north28', $noidung->meal3_north28);
    $ss->assign('meal3_north29', $noidung->meal3_north29);
    $ss->assign('meal3_north30', $noidung->meal3_north30);


    $ss->assign('meal3_north_breakfirst_price', $noidung->meal3_north_breakfirst_price);
    $ss->assign('meal3_north_breakfirst_num', $noidung->meal3_north_breakfirst_num);
    $ss->assign('meal3_north_breakfirst_money', $noidung->meal3_north_breakfirst_money);
    $ss->assign('meal3_north_lunch_price', $noidung->meal3_north_lunch_price);
    $ss->assign('meal3_north_lunch_num', $noidung->meal3_north_lunch_num);
    $ss->assign('meal3_north_lunch_money', $noidung->meal3_north_lunch_money);
    $ss->assign('meal3_north_dinner_price', $noidung->meal3_north_dinner_price);
    $ss->assign('meal3_north_dinner_num', $noidung->meal3_north_dinner_num);
    $ss->assign('meal3_north_dinner_money', $noidung->meal3_north_dinner_money);
    $ss->assign('meal3_north_other_price', $noidung->meal3_north_other_price);
    $ss->assign('meal3_north_other_num', $noidung->meal3_north_other_num);
    $ss->assign('meal3_north_other_money', $noidung->meal3_north_other_money);


    $ss->assign('hotel3_sum', $noidung->hotel3_sum);
    $ss->assign('hotel3_1', $noidung->hotel3_1);
    $ss->assign('hotel3_2', $noidung->hotel3_2);
    $ss->assign('hotel3_3', $noidung->hotel3_3);
    $ss->assign('hotel3_4', $noidung->hotel3_4);
    $ss->assign('hotel3_5', $noidung->hotel3_5);
    $ss->assign('hotel3_6', $noidung->hotel3_6);
    $ss->assign('hotel3_7', $noidung->hotel3_7);
    $ss->assign('hotel3_8', $noidung->hotel3_8);
    $ss->assign('hotel3_9', $noidung->hotel3_9);
    $ss->assign('hotel3_10', $noidung->hotel3_10);
    $ss->assign('hotel3_11', $noidung->hotel3_11);
    $ss->assign('hotel3_12', $noidung->hotel3_11);
    $ss->assign('hotel3_13', $noidung->hotel3_11);
    $ss->assign('hotel3_14', $noidung->hotel3_11);
    $ss->assign('hotel3_15', $noidung->hotel3_11);
    $ss->assign('hotel3_16', $noidung->hotel3_11);
    $ss->assign('hotel3_17', $noidung->hotel3_11);
    $ss->assign('hotel3_18', $noidung->hotel3_11);
    $ss->assign('hotel3_19', $noidung->hotel3_11);
    $ss->assign('hotel3_20', $noidung->hotel3_20);
    $ss->assign('hotel3_21', $noidung->hotel3_21);
    $ss->assign('hotel3_22', $noidung->hotel3_22);
    $ss->assign('hotel3_23', $noidung->hotel3_23);
    $ss->assign('hotel3_24', $noidung->hotel3_24);
    $ss->assign('hotel3_25', $noidung->hotel3_25);
    $ss->assign('hotel3_26', $noidung->hotel3_26);
    $ss->assign('hotel3_27', $noidung->hotel3_27);
    $ss->assign('hotel3_28', $noidung->hotel3_28);
    $ss->assign('hotel3_29', $noidung->hotel3_29);
    $ss->assign('hotel3_30', $noidung->hotel3_30);

    $hotel3 = $nodung->hotel3;
    if(count($hotel3)>0){
        foreach($hotel3 as $value){
            $html_hotel3 .= ' <tr>
            <td style="border-left:1px solid #999"><input name="hotel3_service[]" type="text" id="hotel3_service[]" size="30" value="'.$value->hotel3_service.'" /></td>
            <td><input class="calculate hotel3_price" name="hotel3_price[]" type="text" id="hotel3_price" size="10" value="'.$value->hotel3_price.'" /></td>
            <td><input class="calculate hotel3_num" name="hotel3_num[]" type="text" id="hotel3_num" size="10" value="'.$value->hotel3_num.'" /></td>
            <td><input class="calculate hotel3_money" readonly="readonly" name="hotel3_money[]" type="text" id="hotel3_money" size="10" value="'.$value->hotel3_money.'" /></td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
            <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>';
        }
    }
    $ss->assign('count_hotel3',count($hotel3));
    $ss->assign('hotel3_html',$html_hotel3);

    $ss->assign('foc3_21', $noidung->foc3_21);
    $ss->assign('foc3_22', $noidung->foc3_22);
    $ss->assign('foc3_23', $noidung->foc3_23);
    $ss->assign('foc3_24', $noidung->foc3_24);
    $ss->assign('foc3_25', $noidung->foc3_25);
    $ss->assign('foc3_26', $noidung->foc3_26);
    $ss->assign('foc3_27', $noidung->foc3_27);
    $ss->assign('foc3_28', $noidung->foc3_28);
    $ss->assign('foc3_29', $noidung->foc3_29);
    $ss->assign('foc3_30', $noidung->foc3_30);


    $ss->assign('nett3_1', $noidung->nett3_1);
    $ss->assign('nett3_2', $noidung->nett3_2);
    $ss->assign('nett3_3', $noidung->nett3_3);
    $ss->assign('nett3_4', $noidung->nett3_4);
    $ss->assign('nett3_5', $noidung->nett3_5);
    $ss->assign('nett3_6', $noidung->nett3_6);
    $ss->assign('nett3_7', $noidung->nett3_7);
    $ss->assign('nett3_8', $noidung->nett3_8);
    $ss->assign('nett3_9', $noidung->nett3_9);
    $ss->assign('nett3_10', $noidung->nett3_10);
    $ss->assign('nett3_11', $noidung->nett3_11);
    $ss->assign('nett3_12', $noidung->nett3_12);
    $ss->assign('nett3_13', $noidung->nett3_13);
    $ss->assign('nett3_14', $noidung->nett3_14);
    $ss->assign('nett3_15', $noidung->nett3_15);
    $ss->assign('nett3_16', $noidung->nett3_16);
    $ss->assign('nett3_17', $noidung->nett3_17);
    $ss->assign('nett3_18', $noidung->nett3_18);
    $ss->assign('nett3_19', $noidung->nett3_19);
    $ss->assign('nett3_20', $noidung->nett3_20);
    $ss->assign('nett3_21', $noidung->nett3_21);
    $ss->assign('nett3_22', $noidung->nett3_22);
    $ss->assign('nett3_23', $noidung->nett3_23);
    $ss->assign('nett3_24', $noidung->nett3_24);
    $ss->assign('nett3_25', $noidung->nett3_25);
    $ss->assign('nett3_26', $noidung->nett3_26);
    $ss->assign('nett3_27', $noidung->nett3_27);
    $ss->assign('nett3_28', $noidung->nett3_28);
    $ss->assign('nett3_29', $noidung->nett3_29);
    $ss->assign('nett3_30', $noidung->nett3_30);
    $ss->assign('nett3_31', $noidung->nett3_31);
    $ss->assign('nett3_32', $noidung->nett3_32);


    $ss->assign('service3_rate', $noidung->service3_rate);
    $ss->assign('service3_1', $noidung->service3_1);
    $ss->assign('service3_2', $noidung->service3_2);
    $ss->assign('service3_5', $noidung->service3_5);
    $ss->assign('service3_6', $noidung->service3_6);
    $ss->assign('service3_9', $noidung->service3_9);
    $ss->assign('service3_10', $noidung->service3_10);
    $ss->assign('service3_13', $noidung->service3_13);
    $ss->assign('service3_14', $noidung->service3_14);
    $ss->assign('service3_17', $noidung->service3_17);
    $ss->assign('service3_18', $noidung->service3_18);
    $ss->assign('service3_21', $noidung->service3_21);
    $ss->assign('service3_22', $noidung->service3_22);
    $ss->assign('service3_25', $noidung->service3_25);
    $ss->assign('service3_26', $noidung->service3_26);
    $ss->assign('service3_27', $noidung->service3_27);
    $ss->assign('service3_31', $noidung->service3_31);


    $ss->assign('sell3_vnd1', $noidung->sell3_vnd1);
    $ss->assign('sell3_vnd2', $noidung->sell3_vnd2);
    $ss->assign('sell3_vnd3', $noidung->sell3_vnd3);
    $ss->assign('sell3_vnd4', $noidung->sell3_vnd4);
    $ss->assign('sell3_vnd5', $noidung->sell3_vnd5);
    $ss->assign('sell3_vnd6', $noidung->sell3_vnd6);
    $ss->assign('sell3_vnd7', $noidung->sell3_vnd7);
    $ss->assign('sell3_vnd8', $noidung->sell3_vnd8);
    $ss->assign('sell3_vnd9', $noidung->sell3_vnd9);
    $ss->assign('sell3_vnd10', $noidung->sell3_vnd10);
    $ss->assign('sell3_vnd11', $noidung->sell3_vnd11);
    $ss->assign('sell3_vnd12', $noidung->sell3_vnd12);
    $ss->assign('sell3_vnd13', $noidung->sell3_vnd13);
    $ss->assign('sell3_vnd14', $noidung->sell3_vnd14);
    $ss->assign('sell3_vnd15', $noidung->sell3_vnd15);
    $ss->assign('sell3_vnd16', $noidung->sell3_vnd16);
    $ss->assign('sell3_vnd17', $noidung->sell3_vnd17);
    $ss->assign('sell3_vnd18', $noidung->sell3_vnd18);
    $ss->assign('sell3_vnd19', $noidung->sell3_vnd19);
    $ss->assign('sell3_vnd20', $noidung->sell3_vnd20);
    $ss->assign('sell3_vnd21', $noidung->sell3_vnd21);
    $ss->assign('sell3_vnd22', $noidung->sell3_vnd22);
    $ss->assign('sell3_vnd23', $noidung->sell3_vnd23);
    $ss->assign('sell3_vnd24', $noidung->sell3_vnd24);
    $ss->assign('sell3_vnd25', $noidung->sell3_vnd25);
    $ss->assign('sell3_vnd26', $noidung->sell3_vnd26);
    $ss->assign('sell3_vnd27', $noidung->sell3_vnd27);
    $ss->assign('sell3_vnd28', $noidung->sell3_vnd28);
    $ss->assign('sell3_vnd29', $noidung->sell3_vnd29);
    $ss->assign('sell3_vnd30', $noidung->sell3_vnd30);
    $ss->assign('sell3_vnd31', $noidung->sell3_vnd31);
    $ss->assign('sell3_vnd32', $noidung->sell3_vnd32);


    $ss->assign('sell3_usd1', $noidung->sell3_usd1);
    $ss->assign('sell3_usd2', $noidung->sell3_usd2);
    $ss->assign('sell3_usd5', $noidung->sell3_usd5);
    $ss->assign('sell3_usd6', $noidung->sell3_usd6);
    $ss->assign('sell3_usd9', $noidung->sell3_usd9);
    $ss->assign('sell3_usd10', $noidung->sell3_usd10);
    $ss->assign('sell3_usd13', $noidung->sell3_usd13);
    $ss->assign('sell3_usd14', $noidung->sell3_usd14);
    $ss->assign('sell3_usd17', $noidung->sell3_usd17);
    $ss->assign('sell3_usd18', $noidung->sell3_usd18);
    $ss->assign('sell3_usd21', $noidung->sell3_usd21);
    $ss->assign('sell3_usd22', $noidung->sell3_usd22);
    $ss->assign('sell3_usd25', $noidung->sell3_usd25);
    $ss->assign('sell3_usd26', $noidung->sell3_usd26);
    $ss->assign('sell3_usd27', $noidung->sell3_usd27);
    $ss->assign('sell3_usd31', $noidung->sell3_usd31);



    $ss->assign('tax3_1', $noidung->tax3_1);
    $ss->assign('tax3_2', $noidung->tax3_2);
    $ss->assign('tax3_5', $noidung->tax3_5);
    $ss->assign('tax3_6', $noidung->tax3_6);
    $ss->assign('tax3_9', $noidung->tax3_9);
    $ss->assign('tax3_10', $noidung->tax3_10);
    $ss->assign('tax3_13', $noidung->tax3_13);
    $ss->assign('tax3_14', $noidung->tax3_14);
    $ss->assign('tax3_17', $noidung->tax3_17);
    $ss->assign('tax3_18', $noidung->tax3_18);
    $ss->assign('tax3_21', $noidung->tax3_21);
    $ss->assign('tax3_22', $noidung->tax3_22);
    $ss->assign('tax3_25', $noidung->tax3_25);
    $ss->assign('tax3_26', $noidung->tax3_26);
    $ss->assign('tax3_27', $noidung->tax3_27);
    $ss->assign('tax3_31', $noidung->tax3_31);


    $ss->assign('profit3_1', $noidung->profit3_1);
    $ss->assign('profit3_2', $noidung->profit3_2);
    $ss->assign('profit3_5', $noidung->profit3_5);
    $ss->assign('profit3_6', $noidung->profit3_6);
    $ss->assign('profit3_9', $noidung->profit3_9);
    $ss->assign('profit3_10', $noidung->profit3_10);
    $ss->assign('profit3_13', $noidung->profit3_13);
    $ss->assign('profit3_14', $noidung->profit3_14);
    $ss->assign('profit3_17', $noidung->profit3_17);
    $ss->assign('profit3_18', $noidung->profit3_18);
    $ss->assign('profit3_21', $noidung->profit3_21);
    $ss->assign('profit3_22', $noidung->profit3_22);
    $ss->assign('profit3_25', $noidung->profit3_25);
    $ss->assign('profit3_26', $noidung->profit3_26);
    $ss->assign('profit3_27', $noidung->profit3_27);
    $ss->assign('profit3_31', $noidung->profit3_31);


    $ss->assign('total3_1', $noidung->total3_1);
    $ss->assign('total3_2', $noidung->total3_2);
    $ss->assign('total3_5', $noidung->total3_5);
    $ss->assign('total3_6', $noidung->total3_6);
    $ss->assign('total3_9', $noidung->total3_9);
    $ss->assign('total3_10', $noidung->total3_10);
    $ss->assign('total3_13', $noidung->total3_13);
    $ss->assign('total3_14', $noidung->total3_14);
    $ss->assign('total3_17', $noidung->total3_17);
    $ss->assign('total3_18', $noidung->total3_18);
    $ss->assign('total3_21', $noidung->total3_21);
    $ss->assign('total3_22', $noidung->total3_22);
    $ss->assign('total3_25', $noidung->total3_25);
    $ss->assign('total3_26', $noidung->total3_26);
    $ss->assign('total3_27', $noidung->total3_27);
    $ss->assign('total3_31', $noidung->total3_31);


    $ss->assign('interest3_1', $noidung->interest3_1);
    $ss->assign('interest3_2', $noidung->interest3_2);
    $ss->assign('interest3_5', $noidung->interest3_5);
    $ss->assign('interest3_6', $noidung->interest3_6);
    $ss->assign('interest3_9', $noidung->interest3_9);
    $ss->assign('interest3_10', $noidung->interest3_10);
    $ss->assign('interest3_13', $noidung->interest3_13);
    $ss->assign('interest3_14', $noidung->interest3_14);
    $ss->assign('interest3_17', $noidung->interest3_17);
    $ss->assign('interest3_18', $noidung->interest3_18);
    $ss->assign('interest3_21', $noidung->interest3_21);
    $ss->assign('interest3_22', $noidung->interest3_22);
    $ss->assign('interest3_25', $noidung->interest3_25);
    $ss->assign('interest3_26', $noidung->interest3_26);
    $ss->assign('interest3_27', $noidung->interest3_27);
    $ss->assign('interest3_31', $noidung->interest3_31);


    $ss->assign('HTML', $html);
    $ss->display("modules/Worksheets/tpls/Inbound.tpl");
    unset($_SESSION['record']);
    unset($_SESSION['return_id']);
?>
