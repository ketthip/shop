<?php
$req = new request();



$insert = new database();
$insert->table("claimed_product");
$insert->fields['product_code'] = $req->input('product_code');
$insert->fields['product_name'] = $req->input('product_name');
$insert->fields['lot_no'] = $req->input('lot_no');
$insert->fields['ex_date'] = date('Y-m-d', strtotime($req->input('expireddate')));
$insert->fields['return_amount'] = $req->input('return_amount');
$insert->fields['unit'] = $req->input('unit');
$insert->fields['remark'] = $req->input('remark');
$insert->fields['claimed_date'] = date("Y-m-d");
$insert->insert();

direction::backwith("success", "ສິນຄ້າໄດ້ຖືກສົ່ງ Claimed ແລ້ວ");

