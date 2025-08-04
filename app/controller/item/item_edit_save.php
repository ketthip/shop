<?php
$req = new request();

$update = new database();
$update->table("tbl_product");
$update->fields['product_code'] = $req->input('product_code');
$update->fields['product_name'] = $req->input('product_name');
$update->fields['product_category'] = $req->input('category');
$update->fields['zone'] = $req->input('zone');
$update->fields['purchase_price'] = $req->input('purchase_price');
$update->fields['sell_price'] = $req->input('sell_price');
$update->fields['product_satuan'] = $req->input('unit');
$update->fields['description'] = $req->input('description');


$img = $req->file('product_img');

if (!empty($img)) {
    $img_name = $req->file('product_img', 'name');
    $img_size = $req->file('product_img', 'size');

    $img_new = uniqid() . '.' . pathinfo($img_name, PATHINFO_EXTENSION);
    $path = "upload/" . $img_new;

    if ($img_size >= 1000000) {
        direction::backwith("error", "File No More Than 1MB");
    } else {
        $req->store($img, $path);

        $update->fields['img'] = $img_new;
        $update->update('product_id', $req->input('product_id'));
        direction::redirect('item/view/' . $req->input('product_code'));
    }
} else {
    $update->update('product_id', $req->input('product_id'));
    direction::redirect('item/view/' . $req->input('product_code'));
}


$update = new database();
 $update->table("warehouse");
$update->fields['sell_price'] = $req->input('sell_price');
// $update->fields['product_code'] = $req->input('product_code');
