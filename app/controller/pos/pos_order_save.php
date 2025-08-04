<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$req = new request();

$insert = new database();
$insert->table("tbl_invoice");
$insert->fields['cashier_name'] = auth('username');
$insert->fields['order_date'] = date('Y-m-d');
$insert->fields['time_order'] = date('h:i');
$insert->fields['total'] = $req->input('dataOrder')['orderTotal'];
$insert->fields['discount'] = $req->input('dataOrder')['discount'];
$insert->fields['discount_amount'] = $req->input('dataOrder')['discount_amount'];
$insert->fields['finaltotal'] = $req->input('dataOrder')['finaltotal'];
$insert->fields['paid'] = $req->input('dataOrder')['custPay'];
$insert->fields['due'] = $req->input('dataOrder')['orderDue'];
$insert->fields['profit'] = $req->input('dataOrder')['profit'];
$insert->insert();

$select = new database();
$tbl_invoice = $select->query("SELECT * FROM tbl_invoice ORDER BY invoice_id DESC LIMIT 1");

foreach($req->input('dataItems') as $dataItems){
    $insert = new database();
    $insert->table("tbl_invoice_detail");
    $insert->fields['invoice_id'] = $tbl_invoice[0]->invoice_id;
    $insert->fields['product_id'] = $dataItems['product_id'];
    $insert->fields['product_code'] = $dataItems['product_code'];
    $insert->fields['product_name'] = $dataItems['product_name'];
    $insert->fields['qty'] = $dataItems['qty'];
    $insert->fields['price'] = $dataItems['sell_price'];
    $insert->fields['total'] = $dataItems['total'];
    $insert->fields['order_date'] = date('Y-m-d');
    $insert->insert();

    $warehouse = new database();
    $stock = $warehouse->query("SELECT stock FROM warehouse WHERE product_code = '".$dataItems['product_code']."'");

    // $update = new database();
    $intStock = (int)$stock[0]->stock - (int)$dataItems['qty'];
    // $update->table("warehouse");

    // if((int)$stock[0]->stock == 1){
    //     $update->fields['stock'] = $intStock;
    // }if((int)$stock[0]->stock == (int)$dataItems['qty']){
    //     $update->fields['stock'] = $intStock;
    // }else{
        //  $update->fields['stock'] = 0;
      
    // }
   
    // $update->update('product_code', $dataItems['product_code']);
      
    // echo "<script>console.log('$intStock');</script>";


    $pdo = connect::db();
    $sql = ("UPDATE warehouse SET stock = '".$intStock."'  WHERE product_code = '".$dataItems['product_code']."'");;
    $row = $pdo->prepare($sql);
    $row->execute();
    // $row-exit();
    

}

//$tbl_invoice_detail = $select->query("SELECT * FROM tbl_invoice_detail WHERE invoice_id =".$tbl_invoice[0]->invoice_id." ORDER BY id DESC");

header('Content-Type: application/json');
echo json_encode($tbl_invoice[0]->invoice_id);
exit();
