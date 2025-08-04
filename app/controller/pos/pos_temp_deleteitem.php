<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$req = new request();

$select = new database();
$tbl_invoice_detail_temp = $select->query("SELECT * FROM tbl_invoice_detail_temp ORDER BY temp_id DESC LIMIT 1");

    $delete = new database();
    $delete->table("tb_invoice_detail_temp");
    $delete->delete('product_code', $_POST['productcode']);
   

header('Content-Type: application/json');
exit();