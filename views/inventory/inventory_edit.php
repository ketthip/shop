<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$tbl_inventory = $select->query("SELECT * FROM tbl_inventory WHERE shop_id = '" . $id . "' ");
$tbl_inventories = $select->query('SELECT * FROM tbl_inventory');

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
                    <form action="<?= url('inventory/edit/save') ?>" method="POST">
                        <input type="hidden" name="shop_id" value="<?= $id ?>" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</label>
                                <input type="text" class="form-control" name="shop_name" placeholder="ຂື່ຮ້ານ" value="<?= $tbl_inventory[0]->shop_name ?>" required>

                                <input type="text" class="form-control" name="address" placeholder="ທີ່ຢູ່ຮ້ານ" value="<?= $tbl_inventory[0]->address ?>">
                                <input type="text" class="form-control" name="contact" placeholder="ເບີໂທຕິດຕໍ່" value="<?= $tbl_inventory[0]->contact ?>">



                            </div>
                        </div><!-- /.box-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="btn_edit">ດັດແກ້</button>
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
                            <th>ຊື່ຮ້ານ</th>
                            <th>ທີ່ຢູ່ຮ້ານ</th>
                            <th>ເຍີໂທຕິດຕໍ່</th>


                        </tr>

                        </thead>
                        <tbody>
                        <? foreach($tbl_inventories as $inventory) { ?>
                            <tr>
                                <td><?php echo $inventory->shop_id; ?></td>
                                <td><?php echo $inventory->shop_name; ?></td>
                                <td><?php echo $inventory->address; ?></td>
                                <td><?php echo $inventory->contact; ?></td>

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