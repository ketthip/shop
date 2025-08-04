<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

exec($_ENV['WKHTML_PATH'].' --width 580 --quality 100 '.$_SERVER['HTTP_HOST'].$_ENV['HOST_FOLDER'].'/pos/print/html/'.$id.' '.$_SERVER['DOCUMENT_ROOT'].$_ENV['HOST_FOLDER'].'/assets/img/printer/printhtml.png');

//try {
    $connector = new WindowsPrintConnector($_ENV['PRINTER_FRONT_PORT']);
    $printer = new Printer($connector);
    $logo = EscposImage::load($_SERVER['DOCUMENT_ROOT'].$_ENV['HOST_FOLDER']."/assets/img/printer/logo.png", false);
    $tux = EscposImage::load($_SERVER['DOCUMENT_ROOT'].$_ENV['HOST_FOLDER']."/assets/img/printer/printhtml.png", false);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    //$printer -> bitImage($logo);
    $printer -> bitImage($tux);
    $printer -> cut();
    $printer -> close();
/*} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}*/

header('Content-Type: application/json');
echo json_encode("ການຊຳລະເງິນຊຳເລັດ, ກຳລັງພິມໃບບິນ.");
exit();