<?php
$req = new request();

$update = new database();
$update->table("exchange");
$update->fields['ex_code'] = $req->input('code');
$update->fields['ex_rate'] = $req->input('rate');
$update->update('ex_id', $req->input('ex_id'));
direction::backwith("success", "Rate Has Been Updated");



