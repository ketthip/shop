<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$select = new database();
$tbl_invoice_detail = $select->query("SELECT * FROM tbl_invoice_detail WHERE invoice_id =".$id." ORDER BY id DESC");

/*try {
    $connector = new WindowsPrintConnector($_ENV['PRINTER_PORT']);
    $printer = new Printer($connector);
    //$printer -> setLineSpacing(1);
    $printer -> setEmphasis(true);
    $printer -> setTextSize(2, 2);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("Shop name\n");
    $printer -> setEmphasis(false);
    $printer -> setTextSize(1, 1);
    $printer -> text("Shop Address ...\n");
    $printer -> text("Shop Tel ... \n");
    //$printer -> text("Shop detail 3\n");
    //$printer -> text("Shop detail 4\n");
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $printer -> setEmphasis(true);
    $printer -> text("Receipt No. : ".$tbl_invoice[0]->invoice_id." \n");
    $printer -> setEmphasis(false);
    $printer -> text("Time : ".date('d/m/Y h:i')." \n");
    $printer -> text("User : ".auth('username')." \n");
    //$printer -> feed(1);
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> text("--------------------------------\n");
    //$printer -> text("Qty  Description          Amount\n");
    //$printer -> text("--------------------------------\n");
    $printer -> setJustification(Printer::JUSTIFY_LEFT);
    $qty = 0;
    foreach($tbl_invoice_detail as $detail){
        $printer -> text($detail->product_name."\n");
        $printer -> text($detail->qty." x ".$detail->price." ".$detail->total."\n");
        $qty += $detail->qty;
    }
    $printer -> text("--------------------------------\n");
    $printer -> text("Item count: ".$qty."\n");
    $printer -> text("Discount: 0\n");
    $printer -> setEmphasis(true);
    $printer -> setTextSize(2, 2);
    $printer -> text("Total: ".$tbl_invoice[0]->total."\n");
    $printer -> setEmphasis(false);
    $printer -> setTextSize(1, 1);
    //$printer -> text("________________________________\n");
    //$printer -> text("|\n");
    $printer -> text("Paid: ".$tbl_invoice[0]->paid."\n");
    $printer -> text("Change: ".$tbl_invoice[0]->due."\n");
    $printer -> cut();
    $printer -> close();
} catch (Exception $e) {
    //echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}*/

header('Content-Type: application/json');
echo json_encode("ການຊຳລະເງິນຊຳເລັດ, ກຳລັງພິມໃບບິນ.");
exit();