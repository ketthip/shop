<?php
$req = new request();

$delete = new database();
$delete->table("exchange");
$delete->delete('ex_id',$id);

direction::backwith("success","Rate was deleted successfully");