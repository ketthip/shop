<?php
$select = new database();
$tbl_product = $select->query("SELECT tbl_product.*, warehouse.* FROM tbl_product INNER JOIN warehouse
                        ON tbl_product.product_code = warehouse.product_code WHERE tbl_product.product_code =".$id);
header('Content-Type: application/json');
echo json_encode($tbl_product);
exit();