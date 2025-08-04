<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$unit = $select->query("SELECT * FROM unit WHERE id_unit = '" . $id . "' ");
$units = $select->query('SELECT * FROM unit');

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
                        <form action="<?= url('detail_unit/edit/save') ?>" method="POST">
                            <input type="hidden" name="id_unit" value="<?= $id ?>" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">ຫົວໜ່ວຍນັບສິນຄ້າ</label>
                                    <input type="text" class="form-control" name="unit" placeholder="Enter Category" value="<?= $unit[0]->name_unit ?>" required>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="btn_edit">ດັດແກ້</button>
                                <a href="<?= url('detail_unit') ?>" class="btn btn-warning">ກັບຄືນ</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title" style="font-family: 'Phetsarath OT'">ລາຍການຫົວໜ່ວຍນັບສິນຄ້າ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ລຳດັບ</th>
                                        <th>ໜ່ວຍນັບ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? foreach ($units as $unit) { ?>
                                        <tr>
                                            <td><?= $unit->id_unit ?></td>
                                            <td><?= $unit->name_unit ?></td>
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