<?php
$select = new database();
$warehouse = $select->query("SELECT * FROM warehouse");
header('Content-Type: application/json');
echo json_encode($warehouse);
exit();