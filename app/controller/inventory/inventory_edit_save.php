<?php
$req = new request();

$update = new database();
$update->table("tbl_inventory");
$update->fields['shop_name'] = $req->input('shop_name');
$update->fields['address'] = $req->input('address');
$update->fields['contact'] = $req->input('contact');

$update->update('shop_id', $req->input('shop_id'));
direction::redirect("inventory");

direction::backwith("success", "Inventory Has Been Updated");
