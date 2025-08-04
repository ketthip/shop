<?php
$req = new request();

$update = new database();
$update->table("tbl_user");
$update->fields['username'] = $req->input('username');
$update->fields['password'] = $req->input('user_password');
$update->fields['role'] = $req->input('role');
$update->fields['roleຫ'] = $req->input('roleຫ');
$update->update('user_id', $req->input('id_user'));
direction::redirect("staff-info");

direction::backwith("success", "User Has Been Updated");
