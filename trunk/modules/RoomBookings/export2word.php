<?php
require_once 'modules/AOS_PDF_Templates/phpword/PHPWord.php'; 

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('modules/AOS_PDF_Templates/vnlicacodephpword/demo_template.docx');

$document->setValue('${From}', 'Bùi Cao Học');
$document->setValue('{_address1_}', '123 Trương Định');


$document->output('modules/RoomBookings/abc.docx');


?>