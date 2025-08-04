<?php
$req = new request();

$delete = new database();
$delete->table("product_zone");
$delete->delete('id',$id);

direction::backwith("success","Sale zone was deleted successfully");