<?php
$select = new database();
$warehouse = $select->query("SELECT a.*, b.product_id, b.purchase_price FROM warehouse AS a LEFT JOIN tbl_product AS b ON a.product_code = b.product_code WHERE a.product_code = '".$code."'");
header('Content-Type: application/json');
echo json_encode($warehouse);
exit();