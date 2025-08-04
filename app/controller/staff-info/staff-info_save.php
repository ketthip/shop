<?php
$req = new request();
$select = new database();

$inventory = $select->query("SELECT username FROM tbl_user WHERE username='" . $req->input('username') . "'");

if (!empty($inventory)) {
    direction::backwith("error", "User already Available");
}
 else {

    $insert = new database();
    $insert->table("tbl_user");
    $insert->fields['username'] = $req->input('username');
     $insert->fields['password'] = $req->input('user_password');
     $insert->fields['role'] = $req->input('role');
     $insert->fields['roles'] = $req->input('roles');
    $insert->insert();


    direction::backwith("success", "User Saved Successfully");
}
