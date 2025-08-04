<?php

if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$req = new request();
$staff = "";
$fromdate = "";
$todate = "";
$invoice = "";
$total = "";
if (!empty($req->get())) {
    $fromdate = $req->input('date_1');
    $todate = $req->input('date_2');
	$staff = $req->input('staff');
    $select = new database();
    $tbl_invoice1 = $select->query("SELECT sum(total) as total, count(invoice_id) as invoice FROM tbl_invoice WHERE cashier_name ='" .$staff. "' AND order_date BETWEEN '" . $fromdate . "' AND '" . $todate . "'");
    $tbl_invoice2 = $select->query("SELECT * FROM tbl_invoice WHERE cashier_name ='" .$staff. "' AND order_date BETWEEN '" . $fromdate . "' AND '" . $todate . "'");

    foreach ($tbl_invoice1 as $invoices) {
        $invoice = $invoices->invoice;
        $total = number_format($invoices->total, 0);
    }
    //$tbl_invoice3 = $select->query("SELECT order_date, sum(total) as price FROM tbl_invoice WHERE order_date BETWEEN :fromdate AND :todate GROUP BY order_date");
    //$tbl_invoice_details = $select->query("SELECT product_name, sum(qty) as q FROM tbl_invoice_detail WHERE order_date BETWEEN :fromdate AND :todate GROUP BY product_id");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <? extend("layouts/header_index"); ?>
    <style>
        /*.color {
            backgroundColor: rgb(120, 102, 102);-->
        }*/
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <? extend("layouts/header_menu"); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="card card-success">
                <form action="<? url('report/byStaff') ?>" method="POST" autocomplete="off">
                    <div class="card-header with-border">
                        <h3 class="card-title">ຊື່ພະນັກງານ: <?= $staff ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="text" class="form-control pull-right" id="staff" name="staff" placeholder="ປ້ອນຊື່ພະນັກງານ" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="date" class="form-control pull-right" id="datepicker_1" name="date_1" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        </div>
                                        <input type="date" class="form-control pull-right" id="datepicker_2" name="date_2" data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="date_filter"  value="ຕົກລົງ" class="btn btn-success btn-sm">
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-2 col-md-4 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">ການເຄື່ອນໄຫວທັງໝົດ</span>
                                        <span class="info-box-number"><?= $invoice ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-offset-1 col-md-5 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fa fa-money-bill"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">ລາຍຮັບທັງໝົດ</span>
                                        <span class="info-box-number"><?= $total ?> ກີບ</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                        </div>
                        <!--- Transaction Table -->
                        <div style="overflow-x:auto;">
                            <table class="table table-striped" id="mySalesReport">
                                <thead>
                                <tr>
                                    <th>ຜູ້ໃຊ້ລະບົບ</th>
                                    <th>ວັນເດືອນປີ</th>
                                    <th>ລວມ</th>
                                    <th>ກຳໄລ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? if (!empty($req->get())) { ?>
                                    <? foreach ($tbl_invoice2 as $invoice_row) { ?>
                                        <tr>
                                            <td class="text-uppercase"><?= $invoice_row->cashier_name; ?></td>
                                            <td><?= $invoice_row->order_date; ?></td>
                                            <td> <?= number_format($invoice_row->total); ?> ກີບ</td>
                                            <td> <?= number_format(($invoice_row->total - $invoice_row->profit )); ?> ກີບ</td>
                                        </tr>
                                    <? } ?>
                                <? } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
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
        $("#mySalesReport").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#mySalesReport_wrapper .col-md-6:eq(0)');
    });
</script>
<script type="text/javascript">

</script>

</html>