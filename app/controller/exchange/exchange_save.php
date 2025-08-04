<?php
$req = new request();
$select = new database();

$inventory = $select->query("SELECT ex_code FROM exchange WHERE ex_code='" . $req->input('code') . "'");

if (!empty($inventory)) {
    direction::backwith("error", "ສະກຸນເງິນມີຢູ່ແລ້ວ");
}
 else {

    $insert = new database();
    $insert->table("exchange");
    $insert->fields['ex_name'] = $req->input('name');
     $insert->fields['ex_code'] = $req->input('code');
     $insert->fields['ex_rate'] = $req->input('rate');
    $insert->insert();


    direction::backwith("success", "Exchange rate Saved Successfully");
}
