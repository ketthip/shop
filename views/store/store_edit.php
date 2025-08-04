<?php
//if(auth('role') == "Admin"){direction::redirect("/");}
$select = new database();
$warehouses = $select->query("SELECT * FROM warehouse WHERE product_code=" . $id);

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
                <!-- Main content -->
                <form action="<?=url('store/edit/save')?>" method="POST" name="form_product" enctype="multipart/form-data" autocomplete="off">
                    <? foreach ($warehouses as $warehouse) { ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="box-title" style="font-family: 'Phetsarath OT'">ແກ້ໄຂລາຍການສິນຄ້າໜ້າຮ້ານ</h3>
                                        </div>
                                        <div class="card-body">
                                            <label for="">ລະຫັດສິນຄ້າ</label>
                                            <input type="text" class="form-control" name="product_code" value="<?= $warehouse->product_code ?>" readonly>
                                            <label for="">ຊື່ສິນຄ້າ</label>
                                            <input type="text" class="form-control" name="product_name" value="<?= $warehouse->product_name ?>" readonly>
                                            <label for="">Lot.No</label>
                                            <input type="number" class="form-control" name="lot_number" value="<?= $warehouse->lot_no ?>" required>
                                            <label for="">ວັນໝົດອາຍູຂອງສິນຄ້າ</label>
                                            <input type="date" class="form-control " style="width:200px;" name="expireddate" value="<?= $warehouse->expire_date ?>" required>
                                            <label for="">ໂຊນສິນຄ້າ</label>
                                            <input type="text" class="form-control" name="zone" value="<?= $warehouse->sale_zone ?>" readonly>
                                             <label for="">ລາຄາຂາຍ</label>
                                            <input type="number" class="form-control" name="sell_price" value="<?= $warehouse->sell_price ?>" required>
                                            <label for="">ຈຳນວນທີ່ມີໃນສາງ</label>
                                            <input type="number" class="form-control" name="stock" value="<?= $warehouse->stock ?>" required>
                                            <label for="">ຈຳນວນທີ່ຕ້ອງແຈ້ງເຕືອນໜ້ອຍສຸດ</label>
                                            <input type="number" class="form-control" name="min_stock" value="<?= $warehouse->min_stock ?>" required>
                                            <label for="">ໜ່ວຍນັບ</label>
                                            <input type="text" class="form-control" name="unit" value="<?= $warehouse->unit ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col (LEFT) -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="update_product_store">ແກ້ໄຂລາຍການສິນຄ້າ</button>
                                    <a href="<?=url('store')?>" class="btn btn-warning">ກັບຄືນ</a>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </form>
                <!-- /.content -->
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
<? if(flash('success')){?>
    <script>alert("<?=flash('success')?>")</script>
<? } ?>

<? extend("layouts/footer_index"); ?>
<script type="text/javascript">
</script>

</html>
