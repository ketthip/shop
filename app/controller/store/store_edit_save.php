<?php
$req = new request();

$ex_date_reg = date('Y-m-d H:i:s', strtotime($req->input('expireddate')));
$edit_date_reg = date("Y-m-d h:i:sa");


$update = new database();
$update->table("warehouse");
$update->fields['product_name'] = $req->input('product_name');
$update->fields['sale_zone'] = $req->input('zone');
$update->fields['lot_no'] = $req->input('lot_number');
$update->fields['expire_date'] = $ex_date_reg;
$update->fields['sell_price'] = $req->input('sell_price');
$update->fields['stock'] = $req->input('stock');
$update->fields['min_stock'] = $req->input('min_stock');
$update->fields['edit_date'] = $edit_date_reg;
$update->update('product_code', $req->input('product_code'));

$update = new database();
$update->table("tbl_product");
$update->fields['product_name'] = $req->input('product_name');
$update->fields['sell_price'] = $req->input('sell_price');
$update->update('product_code', $req->input('product_code'));

direction::backwith("success", "ສິນຄ້າໄດ້ຮັບການແກ້ໄຂແລ້ວ");

