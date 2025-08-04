<?php
$select = new database();
$tbl_invoice = $select->query("SELECT * FROM tbl_invoice WHERE invoice_id =".$id);
$tbl_invoice_detail = $select->query("SELECT * FROM tbl_invoice_detail WHERE invoice_id =".$id." ORDER BY id DESC");

$inventories = $select->query('SELECT * FROM tbl_inventory');

$exchange = $select->query("SELECT * FROM exchange");

?>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<style>
@font-face {
  font-family: "Saysettha";
  src: url("../../../assets/fonts/Saysettha-Medium.ttf");
  src: url("../../../assets/fonts/Saysettha-Medium.ttf") format("truetype");
}
body{
  width: 560px;
  height: auto;
  background-color:white;
}
body,
* {
  font-family: "Saysettha";
}
table thead th {
	border-top: 0.3mm solid #000000;
	border-bottom: 0.3mm solid #000000;
}
.items td.cost {
	text-align: right;
}
.items td.toptotal {
	text-align: right;
	border-top: 0.3mm solid #000000;
}
.items td.totals {
	text-align: right;
}
.items td.tdfooter {
    text-align: center;
	border-top: 0.3mm solid #000000;
    font-size: 24pt;
}
h1,h2,h3,h4,h5,p{
    margin: 0;
}
p{
    font-size: 20pt;
}

</style>
</head>
<body>
<center><img src="<?= asset('img/printer/logo.png') ?>"></img></center>
<? foreach ($inventories as $inventory) { ?>
    <center><h1><?= $inventory->shop_name ?></h1></center>
    <center><p style="width: 80%;"><?= $inventory->address?></p></center>
    <center><p style="width: 80%;">ໂທ: <?= $inventory->contact?></p></center>
<? } ?>


<br>
<p>ໃບບິນ: <?= $tbl_invoice[0]->invoice_id ?></p>
<p style="float: left;">ພະນັກງານ: <?= $tbl_invoice[0]->cashier_name ?></p><p style="float: right;">ວັນທີ: <?= date_format(date_create($tbl_invoice[0]->order_date),"d/m/Y") ?></p>
<table class="items" width="100%" style="font-size: 20pt; border-collapse: collapse;" cellpadding="2">
<thead>
<tr>
<th align="left" width="45%">ລາຍລະອຽດ</th>
<th align="center" width="15%">ຈ/ນ</th>
<th align="right" width="15%">ລາຄາ</th>
<th align="right" width="25%">ລາຄາ</th>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<?
$qty = 0;
foreach($tbl_invoice_detail as $detail){
?>
<tr>
<td><?= $detail->product_name ?></td>
<td align="center"><?= $detail->qty ?></td>
<td class="cost"><?= number_format($detail->price) ?></td>
<td class="cost"><?= number_format($detail->total) ?></td>
</tr>
<?
}
?>


<!-- END ITEMS HERE -->
<tr>
<td class="toptotal" colspan="2"><b>ລາຄາລວມ:</b></td>
<td class="toptotal" colspan="2"><b><?= number_format($tbl_invoice[0]->total) ?> ກີບ</b></td>
</tr>
<tr>
    <td class="toptotal" colspan="2"><b>ສ່ວນຫຼຸດ: <?= number_format($tbl_invoice[0]->discount) ?> %</b></td>
    <td class="toptotal" colspan="2"><b> <?= number_format($tbl_invoice[0]->discount_amount) ?> ກີບ</b></td>
</tr>
<tr>
    <td class="toptotal" colspan="2"><b>ລວມເປັນເງີນ:</b></td>
    <td class="toptotal" colspan="2"><b><?= number_format($tbl_invoice[0]->finaltotal) ?> ກີບ</b></td>
</tr>
<tr>
<td class="totals" colspan="2">ຮັບເງິນ:</td>
<td class="totals" colspan="2"><?= number_format($tbl_invoice[0]->paid) ?> ກີບ</td>
</tr>
<tr>
<td class="totals" colspan="2"><b>ເງິນຖອນ:</b></td>
<td class="totals" colspan="2"><b><?= number_format($tbl_invoice[0]->due) ?> ກີບ</b></td>
</tr>
<tr>
  <td class="totals" colspan="2">ເລດເງິນບາດ : </td>
  <td class="totals" colspan="2"> <b><?= number_format($exchange[1]->ex_rate) ?></b> </td>
</tr>
<tr>
  <td class="totals" colspan="2">ເລດເງິນໂດລາ : </td>
  <td class="totals" colspan="2"> <b><?= number_format($exchange[0]->ex_rate) ?></b> </td>
</tr>
<tr>
<td class="tdfooter" colspan="4"><b>ຂອບໃຈທີໃຊ້ບໍລິການ</b></td>
</tr>
</tbody>
</table>
</body>
</html>
