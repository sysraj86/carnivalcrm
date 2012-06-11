<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 2/17/12
 * Time: 2:46 PM
 * FileName: view.export_to_word.php
 */
require_once("custom/include/phpword/PHPWord.php");
require_once('modules/Tours/Tour.php');
class Viewexport2word2 extends SugarView
{
    function ViewExportToWord()
    {
        parent::SugarView();
    }

    function display()
    {

        //declare variables
        global $db;
        $fileName = "TestTour.docx";
        $PHPWord = new PHPWord();
        $section = $PHPWord->createSection(array("marginTop" => "0","marginLeft"=>"0"));
        /*  $tour = new Tour();
      $record = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
      $sql = " SELECT t.id,t.name,t.tour_code,t.picture,
                              t.duration,t.transport2, t.operator,t.description,
                              t.deleted,t.tour_code,t.from_place,t.to_place,
                              t.start_date,t.end_date,t.division,contract_value,currency_id,
                              currency,u.first_name,u.last_name
                          FROM tours t
                          INNER JOIN users u
                          ON t.assigned_user_id = u.id
                          WHERE t.id = '" . $record . "' AND t.deleted = 0 AND u.deleted = 0 ";
      $result = $db->query($sql);
      $row = $db->fetchByAssoc($result);*/
        //create word ile
        //  $section->addImage('C:\xampp\htdocs\carnival\modules\Tours\views\carnival_header.jpg', array("align" => "center"));
        //$section->addText("haha");
        $section->addImage('modules\Tours\views\carnival_header.jpg', array("width" => 793, "height" => 125,"align"=>"center"));
        //save file
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, "Word2007");
        $objWriter->save($fileName);
        //return word file

        if (!$fileName) {
            die("file not found");
        }
        ob_end_clean();
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Content-Transfer-Encoding: binary");
        readfile($fileName);
        //unlink($fileName);
        exit;
    }
}

?>