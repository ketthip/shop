<?php
if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$inventories = $select->query('SELECT * FROM tbl_inventory');

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
                            <!-- Category Table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0000C0">ລາຍຊື່ຮ້ານ</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table class="table table-striped" id="myCategory">
                            <thead>
                            <tr>
                                <th>ເລກທີ</th>
                                <th>ຊື່ປະເພດສິນຄ້າ</th>
                                <th>ທີ່ຢູ່</th>
                                <th>ຕິດຕໍ່</th>
                                <th>ຮູບ</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            <? $no = 1; 
                            foreach($inventories as $inventory) { ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $inventory->shop_name; ?></td>
                                    <td><?php echo $inventory->address; ?></td>
                                    <td><?php echo $inventory->contact; ?></td>
                                    <td><img src="<?= asset('img/logo_shop.jpg') ?>" style="height: 90px; width: 90px"></td>
                                    <td>
                                        <a href="<?=url('inventory/edit/'.$inventory->shop_id) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-pen"></i></a>
                                        <a href="<?=url('inventory/delete/'.$inventory->shop_id) ?>" onclick="return confirm('Delete inventory?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

            <div class="modal fade" id="modal-add-inventory" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">ເພີ່ມຂໍ້ມູນຮ້ານ</h4>
                            </div>
                            <div class="modal-body">
                            <form action="<?=url('inventory/save')?>" method="POST">
                            <div class="card-header">
                                <label for="category" style="color: #0000C0; font-size: 20px">ຊື່ຮ້ານ</label>
                            </div>
                            <input type="text" class="form-control" name="shop_name" placeholder="ຊື່ຮ້ານ">
                            <input type="text" class="form-control" name="address" placeholder="ທີ່ຢູ່ຮ້ານ">
                            <input type="text" class="form-control" name="contact" placeholder="ເບີໂທຕິດຕໍ່">
                            <div class="form-group" id="show_pic">
                                <label for="">ຮູບສິນຄ້າ</label><br>
                                <br>
                                <input type="file" class="input-group" name="product_img" onchange="readURL(this);" accept=".jpg,.jpeg,.png,.gif" > <br>
                            </div>
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
            $('#modal-add-inventory').modal('show');
        });

    });
    $(function() {
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


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#show_pic').append('<img id="img_preview" src="" alt="Preview" class="img-responsive" />');
                $('#img_preview').attr('src', e.target.result)
                    .width(250)
                    .height(200);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>
