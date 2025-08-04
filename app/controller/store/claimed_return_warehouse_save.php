<?php
$req = new request();
$ex_date = date('Y-m-d', strtotime($req->input('expireddate')));
$rec_date = date('Y-m-d');

$update = new database();
$update->table("claimed_product");
$update->fields['warehouse_re_date'] = $req->input('warehouseredate');
$update->update('product_code', $req->input('product_code'));


$warehouse = new database();
    $stock = $warehouse->query("SELECT stock FROM warehouse WHERE product_code = '".$req->input('product_code')."'");

    $intStock = (int)$stock[0]->stock + (int)$req->input('return_amount');
    

    $pdo = connect::db();
    $sql = ("UPDATE warehouse SET stock = '".$intStock."'  WHERE product_code = '".$req->input('product_code')."'");;
    $row = $pdo->prepare($sql);
    $row->execute();
    // $row-exit();


direction::backwith("success", "Returned Product To Warehouse Saved Successfully");
