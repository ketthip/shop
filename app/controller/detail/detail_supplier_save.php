<?php
$req = new request();
$select = new database();

$supplier = $select->query("SELECT name_sup FROM supplier WHERE name_sup='" . $req->input('supplier') . "'");

if (!empty($supplier)) {
    direction::backwith("error", "Supplier Already Available");
}

$insert = new database();
$insert->table("supplier");
$insert->fields['name_sup'] = $req->input('supplier');
$insert->insert();

direction::backwith("success", "Supplier is saved successfully");
