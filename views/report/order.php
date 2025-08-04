<?php

if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$invoice1 = "";
$total = "";
$profit = "";
$select = new database();
$tbl_invoices = $select->query("SELECT * FROM tbl_invoice ORDER BY invoice_id DESC");
$tbl_invoices1 = $select->query("SELECT sum(total) as total, sum(profit) as profit FROM tbl_invoice ");


foreach ($tbl_invoices1 as $invoices) {
//    $invoice1 = $invoices->invoice;
    $total = number_format($invoices->total, 0);
    $profit = number_format($invoices->profit, 0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <? extend("layouts/header_index"); ?>
    <style></style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <? extend("layouts/header_menu"); ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0a58ca">ລາຍການຂາຍທັງໝົດ</h3>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            <table class="table table-striped" id="myOrderReport">
                                <thead>
                                    <tr>
                                        <th style="width:20px;">ລຳດັບ</th>
                                        <th style="width:50px;">ຜູ້ບັນທຶກ</th>
                                        <th style="width:100px;">ເລກທີບິນ</th>
                                        <th style="width:100px;">ວັນທີເດືອນປີ</th>
                                        <th style="width:100px;">ລາຄາລວມ<?= $total?> ກີບ</th>
                                        <th style="width:70px;">ສ່ວນຫຼຸດ %</th>
                                        <th style="width:100px;">ຈຳນວນເງິນສ່ວນຫຼຸດ</th>
                                        <th style="width:100px;">ລວມທັງໝົດ <?= $total?> ກີບ</th>
                                        <th style="width:100px;">ປະເພດການຊຳລະ </th>
                                        
                                        <!-- <th style="width:100px;">ກຳໄລທັງໝົດ <?= $profit ?> ກີບ</th> -->
                                        <!-- <th style="width:50px;">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $no = 1;
                                    foreach ($tbl_invoices as $tbl_invoice) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-uppercase"><?= $tbl_invoice->cashier_name ?></td>
                                            <td><?= $tbl_invoice->invoice_id ?></td>
                                            <td><?= $tbl_invoice->order_date ?></td>
                                            <td> <?= number_format($tbl_invoice->total) ?> ກີບ</td>
                                            <td> <?= number_format($tbl_invoice->discount) ?> %</td>
                                            <td> <?= number_format($tbl_invoice->discount_amount) ?> ກີບ</td>
                                            <td> <?= number_format($tbl_invoice->finaltotal) ?> ກີບ</td>
                                            <td> <?= $tbl_invoice->payType ?> </td>
                                            <!-- <td>
                                                <? if (auth('role') == "Admin") { ?>
                                                    <a href="<?=url('report/order/delete/'.$tbl_invoice->invoice_id)?>" onclick="return confirm('Delete Transaction?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <? } ?>
                                                <a href="<?=url('report/pdf/'.$tbl_invoice->invoice_id) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
                                            </td> -->
                                            <!-- <td> <?= number_format(($tbl_invoice->total - $tbl_invoice->profit )); ?> ກີບ</td> -->
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ./wrapper -->
        <footer class="main-footer">
            <strong>ຂໍສະຫງວນລິກະສິດ.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
</body>
<? if (flash('error')) { ?>
    <script>
        alert("<?= flash('error') ?>")
    </script>
<? } ?>
<? if (flash('success')) { ?>
    <script>
        alert("<?= flash('success') ?>")
    </script>
<? } ?>

<? extend("layouts/footer_index"); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myOrderReport').DataTable(
            {

                "oLanguage": {
    "sEmptyTable": "ຍັງບໍ່ມີຂໍ້ມູນ",
    "sSearch": "ຄົ້ນຫາຂໍ້ມູນ",
    "sLengthMenu": "ສະແດງ _MENU_ ແຖວຕໍ່ຫນ້າ",
    "sZeroRecords": "ບໍ່ພົບຂໍ້ມູນໃດໆ",
    "sInfo": "ສະແດງ _START_ ຫາ _END_ ຈາກ _TOTAL_ ແຖວ",
    "sInfoEmpty": "ສະແດງ 0 ຫາ 0 ຈາກ 0 ແຖວ",
    "sInfoFiltered": "(ກັ່ນຕອງຈາກ _MAX_ ບັນທຶກທັງໝົດ)",
    
    "oPaginate": {
            // "sFirst":    "ກ່ອນໜ້າ",
            // "sLast":    "Último",
            "sNext":    "ຕໍ່ໄປ",
            "sPrevious": "ກ່ອນໜ້າ"
        },
                    },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#myOrderReport_wrapper .col-md-6:eq(0)');
           
        
    });
</script>

</html>
