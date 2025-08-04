<?php
$req = new request();
$select = new database();

$tbl_inventory = $select->query("SELECT shop_name FROM tbl_inventory WHERE shop_name='".$req->input('shop_name')."'");

if(!empty($tbl_inventory)){
    direction::backwith("error", "Shop name Already Registered");
}elseif(strlen($req->input('shop_name'))<3){
    direction::backwith("error", "Name must be 6 characters according to the rules");
}

$img = $req->file('product_img');
$img_name = $req->file('product_img', 'name');
$img_size = $req->file('product_img', 'size');
$img_new = uniqid() . '.' . pathinfo($img_name, PATHINFO_EXTENSION);
$path = "upload/" . $img_new;

if ($img_size >= 1000000) {
    direction::backwith("error", "File No More Than 1MB");
} else {
    $req->store($img, $path);

    $insert = new database();
    $insert->table("tbl_inventory");
    $insert->fields['shop_name'] = $req->input('shop_name');
    $insert->fields['img'] =  $img_new;
    $insert->fields['address'] = $req->input('address');
    $insert->fields['contact'] = $req->input('contact');
    $insert->insert();

    direction::backwith("success","Shop name Saved Successfully");
}