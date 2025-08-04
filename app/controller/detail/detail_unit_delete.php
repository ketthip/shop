<?php
$req = new request();

$delete = new database();
$delete->table("unit");
$delete->delete('id_unit',$id);

direction::backwith("success","Unit was deleted successfully");