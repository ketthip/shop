<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$tbl_products = $select->query("SELECT * FROM tbl_product WHERE product_code='$id'");
$categorys = $select->query("SELECT * FROM category");
$units = $select->query("SELECT * FROM unit");

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
                <form action="<?=url('item/edit/save')?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="container-fluid">
                        <? foreach ($tbl_products as $tbl_product) { ?>
                            <input type="hidden" name="product_id" value="<?= $tbl_product->product_id ?>" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="box-title" style="font-family: 'Phetsarath OT'">ແກ້ໄຂລາຍການ</h3>-
                                        </div>
                                        <div class="card-body">
                                            <label for="">ລະຫັດສິນຄ້າ</label>
                                            <input type="text" class="form-control" name="product_code" value="<?= $tbl_product->product_code ?>" required readonly>
                                            <label for="">ຊື່ສິນຄ້າ</label>
                                            <input type="text" class="form-control" name="product_name" value="<?= $tbl_product->product_name; ?>" >
                                            <label for="">ປະເພດສິນຄ້າ</label>
                                            <select class="form-control" name="category" required>
                                                <? foreach ($categorys as $category) { ?>
                                                    <option <? if ($category->cat_name == $tbl_product->product_category) { ?> selected="selected" <? } ?>>
                                                        <?= $category->cat_name ?></option>
                                                <? } ?>
                                            </select>
                                            <label>ໂຊນສິນຄ້າ</label>
                                            <input type="text" class="form-control" name="zone" value="<?= $tbl_product->zone ?>" >
                                            <label for="">ລາຄາຕົ້ນທຶນ</label>
                                            <input type="number" min="1000" step="100" class="form-control" name="purchase_price" value="<?= $tbl_product->purchase_price ?>" >
                                            <label for="">ລາຄາຂາຍ</label>
                                            <input type="number" min="1000" step="100" class="form-control" name="sell_price" value="<?= $tbl_product->sell_price ?>" >
                                            <div class="col-md-12">
                                                <label for="">ໜ່ວຍນັບ</label>
                                                <select class="form-control" name="unit" >
                                                    <? foreach ($units as $unit) { ?>
                                                        <option <? if ($unit->name_unit == $tbl_product->product_satuan) { ?> selected="selected" <? } ?>>
                                                            <?= $unit->name_unit ?></option>
                                                    <? } ?>
                                                </select>
                                                <label for="">ລາຍລະອຽດຍ່ອຍ</label>
                                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" ><?= $tbl_product->description ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="col-md-6">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <center>
                                                <p>ຮູບພາບສິນຄ້າ</p>
                                            </center>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-6">
                                                <input type="file" class="input-group" name="product_img" accept=".jpg,.jpeg,.png,.gif">
                                                <img src="<?=storage('upload/'.$tbl_product->img)?>" alt="Preview" class="img-responsive" height="300"/>
                                            </div>
                                        </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="update_product">ແກ້ໄຂລາຍການສິນຄ້າ</button>
                                    <a href="<?=url('item')?>" class="btn btn-warning">ກັບຄືນ</a>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </form>
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
<? if(flash('error')){?>
    <script>alert("<?=flash('error')?>")</script>
<? } ?>

<? extend("layouts/footer_index"); ?>
<script type="text/javascript">
</script>

</html>