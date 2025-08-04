<?php
$req = new request();

$delete = new database();
$delete->table("warehouse");
$delete->delete('wh_id',$id);

direction::backwith("success","ສິນຄ້າໄດ້ຖືກລຶບຮຽບຮ້ອຍແລ້ວ");