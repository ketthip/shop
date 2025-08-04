<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$req = new request();
$fromdate = "";
$todate = "";
$invoice = "";
$total = "";
$profit = "";

if (!empty($req->get())) {
    $fromdate = $req->input('date_1');
    $todate = $req->input('date_2');
    $select = new database();
    $tbl_invoice1 = $select->query("SELECT sum(total) as total, sum(profit) as profit, count(invoice_id) as invoice FROM tbl_invoice WHERE order_date BETWEEN '" . $fromdate . "' AND '" . $todate . "'");
    $tbl_invoice2 = $select->query("SELECT * FROM tbl_invoice WHERE order_date BETWEEN '" . $fromdate . "' AND '" . $todate . "'");

    foreach ($tbl_invoice1 as $invoices) {
        $invoice = $invoices->invoice;
        $total = number_format($invoices->total, 0);
        $profit = number_format($invoices->profit, 0);
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
                    <form action="<? url('report/sales') ?>" method="POST" autocomplete="off">
                    <div class="card-header with-border">
                        <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0a58ca">ລາຍງານຜົນກຳໄລ</h3>
                    </div>
                        <div class="card-header with-border">
                            <h3 class="card-title" style="color: red;">ເລີ່ມວັນທີ : <?= $fromdate ?>
                            </h3>
                            <h3 class="card-title" style="color: red;">&nbsp; &nbsp; &nbsp; ເຖິິງວັນທີ : <?= $todate ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
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
                                    <input type="submit" name="date_filter" value="ຕົກລົງ" class="btn btn-success btn-sm">
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
                                            <span class="info-box-text">ກຳໄລທັງໝົດ</span>
                                            <span class="info-box-number"><?= $profit ?> ກີບ</span>
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
                                            <th>ລຳດັບ</th>
                                            <th>ຜູ້ໃຊ້ລະບົບ</th>
                                            <th>ບິນເລກທີ</th>
                                            <th>ວັນເດືອນປີ</th>
                                            <th >ກຳໄລທັງໝົດ <?= $profit ?> ກີບ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? if (!empty($req->get())) { ?>
                                            <? $no =1;
                                                foreach ($tbl_invoice2 as $invoice_row) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td class="text-uppercase"><?= $invoice_row->cashier_name; ?></td>
                                                    <td> <?= $invoice_row->invoice_id; ?></td>
                                                    <td><?= $invoice_row->order_date; ?></td>
                                                    <td> <?= number_format(($invoice_row->profit )); ?> ກີບ</td>
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
    /*$('#datepicker_1').datepicker({
        autoclose: true
    });
    //Date picker
    $('#datepicker_2').datepicker({
        autoclose: true
    });*/

    $(document).ready(function() {
        $("#mySalesReport").DataTable(
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
        }).buttons().container().appendTo('#mySalesReport_wrapper .col-md-6:eq(0)');
    });
</script>
<script type="text/javascript">
    /*var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($date); ?>,
            datasets: [{
                label: 'Total Pendapatan',
                data: <?php echo json_encode($total); ?>,
                backgroundColor: 'rgb(13, 192, 58)',
                borderColor: 'rgb(32, 204, 75)',
                borderWidth: 1
            }]
        },
        options: {}
    });

    var ctx = document.getElementById('myBestSellItem');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($pname); ?>,
            datasets: [{
                label: 'Total Produk Terjual',
                data: <?php echo json_encode($qty); ?>,
                backgroundColor: 'rgb(120,112,175)',
                borderColor: 'rgb(255,255,255)',
                borderWidth: 1
            }]
        },
        options: {}
    });*/
</script>

</html>