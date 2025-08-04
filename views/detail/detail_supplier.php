<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
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

            <button class="btn btn-success" id="add-new-item">ເພີ່ມລາຍການ +</button>

            <div class="card-body">
            
                <!-- Category Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0000C0">ລາຍການຂອງຜູ້ສະໜອງ/ຢີ່ຫໍ້ສິນຄ້າ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body" >
                            <table class="table table-striped" id="myCategory">
                                <thead>
                                    <tr>
                                        <th>ລຳດັບ</th>
                                        <th>ຊື່ຜູ້ສະໜອງ/ຢີ່ຫໍ້ສິນຄ້າ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <? $no = 1;
                                     foreach ($suppliers as $supplier) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $supplier->name_sup; ?></td>
                                            <td>
                                                <a href="<?= url('detail_supplier/edit/' . $supplier->id_sup) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-pen"></i></a>
                                                <a href="<?= url('detail_supplier/delete/' . $supplier->id_sup) ?>" onclick="return confirm('Delete Category?')" class="btn btn-danger btn-sm" name="btn_delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
            </div>
                

                  <!-- Modal -->

                  <div class="modal fade" id="modal-add-supplier" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">ເພີ່ມລາຍການສິນຄ້າ</h4>
                            </div>
                            <div class="modal-body">
                            <form action="<?= url('detail_supplier/save') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category">ຊື່ຜູ້ສະໜອງ/ຢີ່ຫໍ້</label>
                                    <input type="text" class="form-control" name="supplier" placeholder="Enter Supplier">
                                </div>
                            </div><!-- /.box-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">ຕົກລົງ</button>
                            </div>
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
            $('#modal-add-supplier').modal('show');
        });

    });


    $(document).ready(function() {
        $('#myCategory').DataTable(
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