<?php
$req = new request();
$ex_date = date('Y-m-d', strtotime($req->input('expireddate')));
$rec_date = date('Y-m-d');

$insert = new database();
$insert->table("return_product");
$insert->fields['product_code'] = $req->input('productcode');
$insert->fields['return_amount'] = $req->input('return_amount');
$insert->fields['return_date'] = $rec_date;
$insert->fields['remark'] = $req->input('remark');
$insert->fields['invoice_id'] = $req->input('invoice_id');
$insert->insert();


$warehouse = new database();
    $stock = $warehouse->query("SELECT stock FROM warehouse WHERE product_code = '".$req->input('productcode')."'");

    $intStock = (int)$stock[0]->stock + (int)$req->input('return_amount');
    

    $pdo = connect::db();
    $sql = ("UPDATE warehouse SET stock = '".$intStock."'  WHERE product_code = '".$req->input('productcode')."'");;
    $row = $pdo->prepare($sql);
    $row->execute();
    // $row-exit();


direction::backwith("success", "Returned Product Saved Successfully");
