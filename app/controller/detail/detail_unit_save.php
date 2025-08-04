<?php
$req = new request();
$select = new database();

$unit = $select->query("SELECT name_unit FROM unit WHERE name_unit='" . $req->input('unit') . "'");

if (!empty($unit)) {
    direction::backwith("error", "Unit already Available");
}

$insert = new database();
$insert->table("unit");
$insert->fields['name_unit'] = $req->input('unit');
$insert->insert();

direction::backwith("success", "Unit Saved Successfully");
