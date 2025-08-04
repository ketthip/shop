<?php
$select = new database();
$tbl_invoice_detail = $select->query("SELECT * FROM tbl_invoice_detail WHERE invoice_id =" . $id . " ORDER BY id DESC");
$inventory = $select ->query("SELECT * FROM tbl_inventory");
$tbl_invoice = $select->query("SELECT * FROM tbl_invoice WHERE invoice_id =".$id);
// $invoice = $select->query("SELECT * FROM tbl_invoice WHERE invoice_id =" . $id . " ORDER BY id DESC");
?>
<html>

<head>
    <link rel="stylesheet" href="<?= asset('plugins/bootstrap-3.4.1/css/bootstrap.min.css') ?>">
    <style>
        @page {
            size: A4;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }

        .table-borderless>tbody>tr>td,
        .table-borderless>tbody>tr>th,
        .table-borderless>tfoot>tr>td,
        .table-borderless>tfoot>tr>th,
        .table-borderless>thead>tr>td,
        .table-borderless>thead>tr>th {
            border: none;
        }
    </style>
</head>

<body style="font-family: 'Phetsarath OT';">
    <div class="container-fluid">
        <table class="table table-borderless">
            <tr>
                <td>
                   <?  foreach($inventory as $inventories) { ?>
                    <h2>ຮ້ານ <?= $inventories->shop_name ?> </h2>
                    <span>ທີຢູ່: <?= $inventories->address ?></span>
                    <span>ເບີໂທ: <?= $inventories->contact ?></span>
                    <? } ?>
                </td>
                <td class="text-right">
                    <h3>ໃບບິນ: <?= $tbl_invoice[0]->invoice_id ?> </h3>
                    <h4>ວັນທີ:<?= date_format(date_create($tbl_invoice[0]->order_date),"d/m/Y") ?> </h4>
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <h1>ໃບບິນຮັບເງິນ</h1>
                </td>
            </tr>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາຫົວໜ່ວຍ</th>
                    <th>ລາຄາລວມ</th>
                </tr>
            </thead>
            <tbody>

                <?
                $i = 1;
                $total = 0;
                foreach ($tbl_invoice_detail as $detail) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $detail->product_name ?></td>
                        <td><?= $detail->qty ?></td>
                        <td><?= number_format($detail->price) ?></td>
                        <td><?= number_format($detail->total) ?></td>
                    </tr>
                <?
                    $i++;
                    $total += $detail->total;
                }
                ?>
                <tr>
                    <td colspan="3" style="border: none"></td>
                    <td>ລາຄາລວມ:</td>
                    <td><?= number_format($tbl_invoice[0]->total) ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="border: none"></td>
                    <td>ສ່ວນລຸດ: <?= number_format($tbl_invoice[0]->discount) ?> %</td>
                    <td> <?= number_format($tbl_invoice[0]->discount_amount)   ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="border: none"></td>
                    <td>ລວມເປັນເງີນ:</td>
                    <td><?= number_format($tbl_invoice[0]->finaltotal) ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless">
            <tr>
                <td>
                <h3 >ຜູ້ຈັດການ</h3>
           
                </td>
                <td class="text-right">
                    <h3>ພະນັກງານຂາຍ</h3>
                 
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<script>
    window.print()
</script>
