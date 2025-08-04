<?php
$req = new request();

$update = new database();
$update->table("product_zone");
$update->fields['zone'] = $req->input('zone');
$update->update('id', $req->input('id'));

direction::backwith("success", "Sale zone is updated successfully");