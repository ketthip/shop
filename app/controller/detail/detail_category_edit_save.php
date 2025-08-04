<?php
$req = new request();

$update = new database();
$update->table("category");
$update->fields['cat_name'] = $req->input('category');
$update->update('cat_id', $req->input('cat_id'));

direction::backwith("success", "Category Has Been Updated");