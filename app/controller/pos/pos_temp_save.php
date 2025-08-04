<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$req = new request();

// foreach($req->input('dataItems') as $dataItems){

    $insert = new database();
    $insert->table("tb_invoice_detail_temp");
    $insert->fields['product_name'] = $_POST['name'];
    $insert->fields['qty'] = $_POST['amount'];
    $insert->fields['total'] = $_POST['total'];
    $insert->fields['product_code'] = $_POST['productcode'];
    $insert->insert();

// }

header('Content-Type: application/json');
exit();