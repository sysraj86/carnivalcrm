<?php
require_once 'modules/AOS_PDF_Templates/phpword/PHPWord.php'; 

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('modules/RoomBookings/tpls/roombooking_template.docx');

$document->setValue('To', );
$document->setValue('ToAddress', '123 Truong Dinh');

$document->output('modules/RoomBookings/abc.docx');


?>