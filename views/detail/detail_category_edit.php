<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$category = $select->query("SELECT * FROM category WHERE cat_id = '" . $id . "' ");
$categorys = $select->query('SELECT * FROM category');

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
                        <form action="<?= url('detail_category/edit/save') ?>" method="POST">
                        <input type="hidden" name="cat_id" value="<?=$id?>" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">ປະເພດສິນຄ້າ</label>
                                    <input type="text" class="form-control" name="category" placeholder="Enter Category" value="<?=$category[0]->cat_name; ?>" required>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="btn_edit">ດັດແກ້</button>
                                <a href="<?=url('detail_category')?>" class="btn btn-warning">ກັບຄືນ</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title" style="font-family: 'Phetsarath OT'">ລາຍການປະເພດສິນຄ້າ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ລຳດັບ</th>
                                        <th>ຊື່ປະເພດສິນຄ້າ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? foreach($categorys as $category) { ?>
                                        <tr>
                                            <td><?=$category->cat_id; ?></td>
                                            <td><?=$category->cat_name; ?></td>
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