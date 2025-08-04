<?php
$req = new request();
$select = new database();

$tbl_product = $select->query("SELECT product_code FROM tbl_product WHERE product_code='".$req->input('product_code')."'");

if(!empty($tbl_product)){
    direction::backwith("error", "Product Code Already Registered");
}elseif(strlen($req->input('product_code'))<3){
    direction::backwith("error", "Code must be 6 characters according to the rules");
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
    $insert->table("tbl_product");
    $insert->fields['product_code'] = $req->input('product_code');
    $insert->fields['product_name'] = $req->input('product_name');
    $insert->fields['product_category'] = $req->input('category');
    $insert->fields['product_supplier'] = $req->input('supplier');
    $insert->fields['zone'] = $req->input('zone');
    $insert->fields['purchase_price'] = $req->input('purchase_price');
    $insert->fields['sell_price'] = $req->input('sell_price');
    $insert->fields['product_satuan'] = $req->input('unit');
    $insert->fields['description'] = $req->input('description');
    $insert->fields['img'] = $img_new;
    $insert->insert();

    direction::backwith("success","Product Saved Successfully");
}