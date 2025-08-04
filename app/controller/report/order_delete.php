<?php
$req = new request();

$delete = new database();
$delete->table("tbl_invoice");
$delete->delete('invoice_id',$id);

direction::backwith("success","Order was deleted successfully");