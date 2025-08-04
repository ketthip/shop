<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$product_zone = $select->query("SELECT * FROM product_zone WHERE id = '" . $id . "' ");
$product_zones = $select->query('SELECT * FROM product_zone');

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
                <div class="col-md-4">
                    <div class="card">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?= url('detail_salezone/edit/save') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">ຊື່ໂຊນສິນຄ້າ</label>
                                    <input type="text" class="form-control" name="zone" placeholder="Enter Category" value="<?= $product_zone[0]->zone ?>" required>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="btn_edit">ດັດແກ້</button>
                                <a href="<?= url('detail_salezone') ?>" class="btn btn-warning">ກັບຄືນ</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title" style="font-family: 'Phetsarath OT'">ລາຍລະອຽດທັງໝົດຂອງໂຊນສິນຄ້າ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ເລກທີ</th>
                                        <th>ໂຊນສິນຄ້າ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? foreach ($product_zones as $product_zone) { ?>
                                        <tr>
                                            <td><?= $product_zone->id ?></td>
                                            <td><?= $product_zone->zone ?></td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.content-wrapper -->
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