<?php
$req = new request();

$delete = new database();
$delete->table("tbl_user");
$delete->delete('user_id',$id);

direction::backwith("success","User was deleted successfully");