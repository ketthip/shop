<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$warehouses = $select->query("SELECT warehouse.*, tbl_product.* FROM warehouse, tbl_product WHERE 
warehouse.stock > 0 AND warehouse.product_code= tbl_product.product_code");

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
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">ລາຍການສິນຄ້າທີ່ຍັງເຫຼືອໃນສາງ</h6>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product_list_remain" class="table table-bordered table-hover ">
                                <thead>
                                    <tr style="font-family: PhetsarathOT">
                                        <th>ລ/ດ</th>
                                        <th>
                                            <center>ຊືສິນຄ້າ</center>
                                        </th>
                                        <th>ລະຫັດບາໂຄດ</th>
                                        <th>
                                            <center>ຜູ້ສະໜອງ</center>
                                        </th>
                                        <th>
                                            <center>Lot.No</center>
                                        </th>
                                        <th>
                                            <center>ໂໍນສິນຄ້າ</center>
                                        </th>
                                        <th>
                                            <center>ຕົ້ນທຶນສະເລ່ຍ</center>
                                        </th>
                                        <th>ລາຄາຂາຍຍ່ອຍ</th>
                                        <th>
                                            <center>ສະຕ໋ອກ</center>
                                        </th>
                                        <th>
                                            <center>ໜ່ວຍນັບ</center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <? $no = 1;
                                    foreach ($warehouses as $warehouse) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $warehouse->product_name; ?></td>
                                            <td><?= $warehouse->product_code; ?></td>
                                            <td><?= $warehouse->product_supplier; ?></td>
                                            <td><?= $warehouse->lot_no; ?></td>
                                            <td><?= $warehouse->sale_zone; ?></td>
                                            <td>kip <?= number_format($warehouse->purchase_price); ?></td>
                                            <td>kip <?= number_format($warehouse->sell_price); ?></td>
                                            <td><? if ($warehouse->stock == "0") { ?>
                                                    <span class="badge bg-danger"><?= $warehouse->stock; ?></span>
                                                <? } elseif ($warehouse->stock <= $warehouse->min_stock) { ?>
                                                    <span class="badge bg-warning"><?= $warehouse->stock; ?></span>
                                                <? } else { ?>
                                                    <span class="badge bg-primary"><?= $warehouse->stock; ?></span>
                                                <? } ?>
                                            </td>
                                            <td><span><?= $warehouse->product_satuan; ?></span></td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
    $(function() {
        $("#product_list_remain").DataTable(
            
            
            
            {
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#product_list_remain_wrapper .col-md-6:eq(0)');
    });
</script>

</html>