<?php
$req = new request();
$select = new database();

$category = $select->query("SELECT cat_name FROM category WHERE cat_name='" . $req->input('category') . "'");

if (!empty($category)) {
    direction::backwith("error", "Category already Available");
}

$insert = new database();
$insert->table("category");
$insert->fields['cat_name'] = $req->input('category');
$insert->insert();

direction::backwith("success", "Category Saved Successfully");
