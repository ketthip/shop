<?php

if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$tbl_products = $select->query("SELECT * FROM tbl_product WHERE product_code='$id'");

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
                <div class="container-fluid">
                    <div class="row">
                        <? foreach ($tbl_products as $tbl_product) { ?>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <ul class="list-group">
                                        <div class="card-header">
                                            <center>
                                                <p class="list-group-item list-group-item-success">ລາຍລະອຽດຂອງສິນຄ້າ</p>
                                            </center>
                                        </div>
                                        <div class="card-body">
                                            <li class="list-group-item"><b>ລະຫັດສິນຄ້າ</b> :<span class="badge pull-right text-primary"><?= $tbl_product->product_code ?></span></li>
                                            <li class="list-group-item"><b>ຊື່ສິນຄ້າ</b> :<span class="label label-info pull-right"><?= $tbl_product->product_name ?></span></li>
                                            <li class="list-group-item"><b>ປະເພດສິນຄ້າ</b> :<span class="label-primary pull-right"><?= $tbl_product->product_category ?></span></li>
                                            <li class="list-group-item"><b>ລາຄາຕົ້ນທຶນ</b> :<span class="label label-warning pull-right">KIP. <?= number_format($tbl_product->purchase_price) ?></span></li>
                                            <li class="list-group-item"><b>ລາຄາຂາຍ</b> :<span class="label label-warning pull-right">KIP. <?= $tbl_product->sell_price ?></span></li>
                                            <li class="list-group-item"><b>ກຳໄລ</b> :<span class="label label-success pull-right">KIP. <?= number_format(($tbl_product->sell_price - $tbl_product->purchase_price)) ?></span></li>
                                            <li class="list-group-item"><b>ໜ່ວຍນັບ</b> :<span class="label label-default pull-right"><?= $tbl_product->product_satuan ?></span></li>
                                            <li class="list-group-item"><b>ລາຍລະອຽດຫຍໍ້</b> :<span class="text-muted"><?= $tbl_product->description ?></span></li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.col (LEFT) -->

                            <div class="col-md-6">
                                <div class="card card-danger">

                                    <ul class="list-group">
                                        <div class="card-header">
                                            <center>
                                                <p class="list-group-item list-group-item-warning">ຮູບພາບສິນຄ້າ</p>
                                            </center>
                                        </div>
                                        <div class="card-body">
                                            <img src="<?= storage('upload/' . $tbl_product->img) ?>" alt="Product Image" class="img-responsive" height="300">
                                        </div>
                                    </ul>
                                </div>
                            <? } ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?= url('item') ?>" class="btn btn-warning">ກັບຄືນ</a>
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
<? extend("layouts/footer_index"); ?>
<script type="text/javascript">
</script>

</html>