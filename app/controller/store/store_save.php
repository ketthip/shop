<?php
$req = new request();
$ex_date = date('Y-m-d H:i:s', strtotime($req->input('expireddate')));
$rec_date = date('Y-m-d H:i:s');

$insert = new database();
$insert->table("warehouse");
$insert->fields['product_name'] = $req->input('productname');
$insert->fields['product_code'] = $req->input('productcode');
$insert->fields['sale_zone'] = $req->input('salezone');
$insert->fields['lot_no'] = $req->input('lotnumber');
$insert->fields['expire_date'] = $ex_date;
$insert->fields['stock'] = $req->input('stock');
$insert->fields['sell_price'] = $req->input('sell_price');
$insert->fields['unit'] = $req->input('productsatuan');
$insert->fields['recorded_date'] = $rec_date;
$insert->fields['min_stock'] = $req->input('min_stock');
$insert->insert();



direction::backwith("success", "Product Saved Successfully");
