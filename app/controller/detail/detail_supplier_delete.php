<?php
$req = new request();

$delete = new database();
$delete->table("supplier");
$delete->delete('id_sup',$id);

direction::backwith("success","Supplier was deleted successfully");