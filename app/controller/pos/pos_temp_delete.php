<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


$pdo = connect::db();
$sql = "DELETE FROM tb_invoice_detail_temp WHERE 1";
$row = $pdo->prepare($sql);

if($row->execute() === true){
  echo "Record deleted successfully";
}else {
      echo "Error deleting record: " ;
    };


// $tbl_invoice_detail_temp = $select->query("DELETE FROM tbl_invoice_detail_temp WHERE 1");

// // $select->execute($tbl_invoice_detail_temp);
// $tbl_invoice_detail_temp::truncate();

// if ($select->query($$tbl_invoice_detail_temp) == TRUE) {
//     echo "Record deleted successfully";
//   } else {
//     echo "Error deleting record: " ;
//   }
  
   


header('Content-Type: application/json');
exit();