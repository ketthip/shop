<?php
$req = new request();

$update = new database();
$update->table("unit");
$update->fields['name_unit'] = $req->input('unit');
$update->update('id_unit', $req->input('id_unit'));

direction::backwith("success", "Unit is updated successfully");