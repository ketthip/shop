<?php
$req = new request();

$delete = new database();
$delete->table("category");
$delete->delete('cat_id',$id);

direction::backwith("success","Product was deleted successfully");