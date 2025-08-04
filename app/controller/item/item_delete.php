<?php
$req = new request();

$delete = new database();
$delete->table("tbl_product");
$delete->delete('product_id',$id);

direction::backwith("success","Product was deleted successfully");