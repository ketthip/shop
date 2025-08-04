<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$req = new request();

$select = new database();
$tbl_invoice = $select->query("SELECT * FROM tbl_invoice ORDER BY invoice_id DESC LIMIT 1");

//foreach($req->input('dataUpdate') as $dataUpdates){
    $update = new database();
    $update->table("tbl_invoice");
    $update->fields['payType'] = $_POST['dataUpdate'];
    $update->update('invoice_id', $tbl_invoice[0]->invoice_id);
//}

//$tbl_invoice_detail = $select->query("SELECT * FROM tbl_invoice_detail WHERE invoice_id =".$tbl_invoice[0]->invoice_id." ORDER BY id DESC");

header('Content-Type: application/json');
//echo json_encode($tbl_invoice[0]->invoice_id);
exit();
