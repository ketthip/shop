<?php

if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$warehouse_less_date = $select->query("SELECT * FROM warehouse WHERE expire_date < DATE_ADD(CURDATE(), INTERVAL 1 DAY) ORDER BY expire_date ASC ");
$warehouse_more_date = $select->query("SELECT * FROM warehouse WHERE expire_date >= DATE_ADD(CURDATE(), INTERVAL 1 DAY) ORDER BY expire_date ASC ");
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="color: #005cbf">ລາຍການສິນຄ້າທີ່ໝົດອາຍຸແລ້ວ</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="product_list_exp1" class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>ລ/ດ</th>
                                            <th>
                                                <center>ຊືສິນຄ້າ</center>
                                            </th>
                                            <th>ລະຫັດບາໂຄດ</th>
                                            <th>
                                                <center>Lot.No</center>
                                            </th>
                                            <th>
                                                <center>ໂຊນສິນຄ້າ</center>
                                            </th>
                                            <th>ຈຳນວນ</th>
                                            <th>
                                                <center>ໜ່ວຍນັບ</center>
                                            </th>
                                            <th>
                                                <center>ວັນໝົດອາຍຸ</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? $no = 1;
                                        foreach ($warehouse_less_date as $warehouse) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $warehouse->product_name ?></td>
                                                <td><?= $warehouse->product_code ?></td>
                                                <td><?= $warehouse->lot_no ?></td>
                                                <td><?= $warehouse->sale_zone ?></td>
                                                <td> <?= ($warehouse->stock) ?> </td>
                                                <td><span><?= $warehouse->unit ?></span></td>
                                                <td> <span class="badge bg-danger"><?= $warehouse->expire_date ?></span>
                                                </td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="color: #005cbf">ລາຍການສິນຄ້າທີ່ກຳລັງຈະໝົດອາຍຸ</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="product_list_exp2" class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>ລ/ດ</th>
                                            <th>
                                                <center>ຊືສິນຄ້າ</center>
                                            </th>
                                            <th>ລະຫັດບາໂຄດ</th>
                                            <th>
                                                <center>Lot.No</center>
                                            </th>
                                            <th>
                                                <center>ໂຊນສິນຄ້າ</center>
                                            </th>
                                            <th>ຈຳນວນ</th>
                                            <th>
                                                <center>ໜ່ວຍນັບ</center>
                                            </th>
                                            <th>
                                                <center>ວັນໝົດອາຍຸ</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? $no = 1;
                                        foreach ($warehouse_more_date as $warehouse) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $warehouse->product_name; ?></td>
                                                <td><?= $warehouse->product_code; ?></td>
                                                <td><?= $warehouse->lot_no; ?></td>
                                                <td><?= $warehouse->sale_zone; ?></td>
                                                <td> <?= ($warehouse->stock) ?> </td>
                                                <td><span><?= $warehouse->unit; ?></span></td>
                                                <td> <span class="badge bg-warning"><?= $warehouse->expire_date; ?></span>
                                                </td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
        $("#product_list_exp1").DataTable({


            "oLanguage": {
    "sEmptyTable": "ຍັງບໍ່ມີຂໍ້ມູນ",
    "sSearch": "ຄົ້ນຫາຂໍ້ມູນ",
    "sLengthMenu": "ສະແດງ _MENU_ ແຖວຕໍ່ຫນ້າ",
    "sZeroRecords": "ບໍ່ພົບຂໍ້ມູນໃດໆ",
    "sInfo": "ສະແດງ _START_ ຫາ _END_ ຈາກ _TOTAL_ ແຖວ",
    "sInfoEmpty": "ສະແດງ 0 ຫາ 0 ຈາກ 0 ແຖວ",
    "sInfoFiltered": "(ກັ່ນຕອງຈາກ _MAX_ ບັນທຶກທັງໝົດ)",
    
    "oPaginate": {
            // "sFirst":    "ກ່ອນໜ້າ",
            // "sLast":    "Último",
            "sNext":    "ຕໍ່ໄປ",
            "sPrevious": "ກ່ອນໜ້າ"
        },
                    },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#product_list_exp1_wrapper .col-md-6:eq(0)');


        $("#product_list_exp2").DataTable({

            "oLanguage": {
    "sEmptyTable": "ຍັງບໍ່ມີຂໍ້ມູນ",
    "sSearch": "ຄົ້ນຫາຂໍ້ມູນ",
    "sLengthMenu": "ສະແດງ _MENU_ ແຖວຕໍ່ຫນ້າ",
    "sZeroRecords": "ບໍ່ພົບຂໍ້ມູນໃດໆ",
    "sInfo": "ສະແດງ _START_ ຫາ _END_ ຈາກ _TOTAL_ ແຖວ",
    "sInfoEmpty": "ສະແດງ 0 ຫາ 0 ຈາກ 0 ແຖວ",
    "sInfoFiltered": "(ກັ່ນຕອງຈາກ _MAX_ ບັນທຶກທັງໝົດ)",
    
    "oPaginate": {
            // "sFirst":    "ກ່ອນໜ້າ",
            // "sLast":    "Último",
            "sNext":    "ຕໍ່ໄປ",
            "sPrevious": "ກ່ອນໜ້າ"
        },
                    },
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#product_list_exp2_wrapper .col-md-6:eq(0)');
    });
</script>

</html>