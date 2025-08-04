<?php
$req = new request();

$update = new database();
$update->table("supplier");
$update->fields['name_sup'] = $req->input('supplier');
$update->update('id_sup', $req->input('id_sup'));

direction::backwith("success", "Supplier Has Been Updated");
direction::redirect("supplier");