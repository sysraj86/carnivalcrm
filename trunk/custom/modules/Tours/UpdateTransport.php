<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class UpdateTransport
{
    function transport(&$bean, $event, $arguments)
    {
        if (isset($_REQUEST['transport'])) {
            $transport = $_REQUEST['transport'];
            $transport2 = '';

            foreach ($transport as $val) {
                $transport2 .= translate('transport_dom', '', $val) . ',';
            }

            $transport2 = substr($transport2, 0, -1);
            $bean->transport2 = $transport2;
        }

    }

    function destination(&$bean, $event, $arguments)
    {
        if (isset($_REQUEST['noiden'])) {
            $des = $_REQUEST ['noiden'];
            $destination = '';
            foreach ($des as $val) {
                $destination .= translate('destination_dom_list', '', $val) . ' ,';
            }
            $destination = substr($destination, 0, -1);
            $bean->tour_destination = $destination;
        }

    }
}

?>
