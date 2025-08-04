<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$exchange = $select->query("SELECT * FROM exchange WHERE ex_id = '" . $id . "' ");
$exchanges = $select->query('SELECT * FROM exchange');

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
            <!-- Category Form-->
            <div class="col-md-4">
                <div class="card">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= url('exchange/edit/save') ?>" method="POST">
                        <input type="hidden" name="ex_id" value="<?= $id ?>" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category" style="color: blue;">ຂໍ້ມູນອັດຕາແລກປ່ຽນ</label>
                                <input type="text" class="form-control" name="rate" placeholder="ຕົວເລກອັດຕາ" value="<?= $exchange[0]->ex_rate ?>" required>
                                <input type="text" class="form-control" name="code" placeholder="ສະກຸນເງິນ" value="<?= $exchange[0]->ex_code ?>" required>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="btn_edit">ດັດແກ້</button>
                            <a href="<?= url('exchange') ?>" class="btn btn-warning">ກັບຄືນ</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-header">
                    <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0000C0">ລາຍຊື່ຜູ້ໃຊ້ລະບົບ</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-striped" id="myCategory">
                        <thead>
                        <tr>
                            <th>ເລກທີ</th>
                            <th>ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                            <th>ລະຫັດຜ່ານ</th>
                            <th>ສິດນຳໃຊ້</th>

                        </tr>

                        </thead>
                        <tbody>
                        <? foreach($exchanges as $ex) { ?>
                            <tr>
                                <td><?php echo $ex->ex_id; ?></td>
                                <td><?php echo $ex->ex_name; ?></td>
                                <td><?php echo $ex->ex_rate; ?></td>
                                <td><?php echo $ex->ex_code; ?></td>

                            </tr>
                        <? } ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.box -->
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

</script>

</html>