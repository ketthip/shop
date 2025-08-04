<?php
$req = new request();
$select = new database();

$product_zone = $select->query("SELECT zone FROM product_zone WHERE zone='" . $req->input('zone') . "'");

if (!empty($product_zone)) {
    direction::backwith("error", "Sale zone already Available");
}

$insert = new database();
$insert->table("product_zone");
$insert->fields['zone'] = $req->input('zone');
$insert->insert();

direction::backwith("success", "Sale zone Saved Successfully");