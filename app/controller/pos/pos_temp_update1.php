<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$req = new request();

$select = new database();
$tbl_invoice_detail_temp = $select->query("SELECT * FROM tbl_invoice_detail_temp ORDER BY temp_id DESC LIMIT 1");
// foreach($req->input('dataUpdateItem') as $dataItems){
    $update = new database();
    $update->table("tb_invoice_detail_temp");
    $update->fields['qty'] =  $_POST['qty'];
    $update->fields['total'] =  $_POST['total1'];
    $update->update('product_code', $_POST['productcode'] );

    // $update->table("tb_invoice_detail_temp");
    // $update->fields['qty'] = $req->input($dataUpdateItem['qty']);
    // $update->fields['total'] = $req->input($dataUpdateItem['total']);
    // $update->update('product_code',  $req->input($dataUpdateItem['product_code']));
   
// }
header('Content-Type: application/json');
exit();