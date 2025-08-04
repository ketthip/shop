<?php
/* Change to the correct path if you copy this example! */
//require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
    // Enter the share name for your USB printer here
    //$connector = "Canon LBP3010/LBP3018/LBP3050";
    $connector = new WindowsPrintConnector($_ENV['PRINTER_PORT']);
    $printer = new Printer($connector);
    //56mm paper
    /* Print a "Hello world" receipt" */
    
    /*$printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> text("ລຳດັບ.");
    $printer -> feed();
    $printer -> setJustification(Printer::JUSTIFY_RIGHT);
    $printer -> text("Amount\n");*/

    //$tux = EscposImage::load($_SERVER['DOCUMENT_ROOT'] . "/brotik/shop/Mkgas_logo_normal_crop.png", false);
    $tux2 = EscposImage::load($_SERVER['DOCUMENT_ROOT'] . "/shop/mpdf.pdf", false);

    //$printer -> setJustification(Printer::JUSTIFY_CENTER);
    //$printer -> bitImage($tux);
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> bitImage($tux2);


    //$printer -> setLineSpacing(1);
    /*$printer -> setEmphasis(true);
    $printer -> setTextSize(2, 2);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("Shop name\n");
    $printer -> setEmphasis(false);
    $printer -> setTextSize(1, 1);
    $printer -> text("Shop detail 1\n");
    $printer -> text("Shop detail 2\n");
    $printer -> text("Shop detail 3\n");
    $printer -> text("Shop detail 4\n");
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> setEmphasis(true);
    $printer -> text("Receipt No. : 111 \n");
    $printer -> setEmphasis(false);
    $printer -> text("Time :  \n");
    $printer -> text("User : 111 \n");
    //$printer -> feed(1);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("--------------------------------\n");
    //$printer -> text("________________________________\n");
    //$printer -> text("|\n");
    $printer -> setJustification(Printer::JUSTIFY_LEFT);*/
    $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}