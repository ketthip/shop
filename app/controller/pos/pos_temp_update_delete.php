<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$req = new request();

$productcode = $req->input('productcode');

$select = new database();
$tbl_invoice_detail_temp = $select->query("SELECT * FROM tbl_invoice_detail_temp WHERE product_code = '".$productcode."'");

    $update = new database();
    $update->table("tb_invoice_detail_temp");
    $update->fields['qty'] =  $_POST['qty'];
    $update->fields['total'] =  $_POST['total2'];
    $update->update('product_code', $_POST['productcode'] );

header('Content-Type: application/json');
exit();