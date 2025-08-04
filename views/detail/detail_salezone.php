<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
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

            <button class="btn btn-success" id="add-new-item">ເພີ່ມລາຍການ +</button>
                <!-- Category Form-->
                <div class="card-body">
                    <!-- /.box-header -->
                    <!-- form start -->
                
                    <!-- Category Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0000C0">ລາຍການຂອງໂຊນສິນຄ້າ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <table class="table table-striped" id="mySale_zone">
                                <thead>
                                    <tr>
                                        <th>ລຳດັບ</th>
                                        <th>ໂຊນສິນຄ້າ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?  $no = 1;
                                    foreach ($product_zones as $product_zone) { ?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td><?= $product_zone->zone; ?></td>
                                            <td>
                                                <a href="<?= url('detail_salezone/edit/' . $product_zone->id) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-pen"></i></a>
                                                <a href="<?= url('detail_salezone/delete/' . $product_zone->id) ?>" onclick="return confirm('Delete Category?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <? } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box -->
                </div>


                          <!-- Modal -->

                          <div class="modal fade" id="modal-add-salezone" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">ເພີ່ມລາຍການສິນຄ້າ</h4>
                            </div>
                            <div class="modal-body">

                            <form action="<?= url('detail_salezone/save') ?>" method="POST">
                                <div class="card-header">
                                    <label for="zone" style="color: #0000C0">ຊື່ໂຊນສິນຄ້າ</label>
                                </div>
                                <input type="text" class="form-control" name="zone" placeholder="Enter zone">
                                <button type="submit" class="btn btn-primary" name="submit">ຕົກລົງ</button>
                            </form>

                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
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


$(document).ready(function($) {
        $('#add-new-item').click(function() {
            $('#modal-add-salezone').modal('show');
        });

    });


    $(function() {
        $('#mySale_zone').DataTable(
            {
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
                    }
                    
  }
        );
    });
</script>

</html>