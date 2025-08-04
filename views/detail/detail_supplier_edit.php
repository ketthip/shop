<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$supplier = $select->query("SELECT * FROM supplier WHERE id_sup = '" . $id . "' ");
$suppliers = $select->query('SELECT * FROM supplier');

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
                        <form action="<?= url('detail_supplier/edit/save') ?>" method="POST">
                        <input type="hidden" name="id_sup" value="<?= $id ?>" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">ຊື່ຜູ້ສະໜອງ/ຢີ່ຫໍ້</label>
                                    <input type="text" class="form-control" name="supplier" placeholder="Enter supplier" value="<?= $supplier[0]->name_sup ?>" required>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="btn_edit">ດັດແກ້</button>
                                <a href="<?= url('detail_supplier') ?>" class="btn btn-warning">ກັບຄືນ</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title" style="font-family: 'Phetsarath OT'">ລາຍການທັງໝົດຂອງຜູ້ສະໜອງ/ຢີ່ຫໍ້ສິນຄ້າ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ລຳດັບ</th>
                                        <th>ຊື່ຜູ້ສະໜອງ/ຢີ່ຫໍ້ສິນຄ້າ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? foreach($suppliers as $supplier) { ?>
                                        <tr>
                                            <td><?=$supplier->id_sup ?></td>
                                            <td><?=$supplier->name_sup ?></td>
                                        </tr>
                                    <? } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
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