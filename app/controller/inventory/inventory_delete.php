<?php
$req = new request();

$delete = new database();
$delete->table("tbl_inventory");
$delete->delete('shop_id',$id);

direction::backwith("success","Inventory was deleted successfully");