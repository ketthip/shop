<?php
$select = new database();
$tbl_users = $select->query('SELECT * FROM tbl_user');

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
                        <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0000C0">ລາຍຊື່ຜູ້ໃຊ້ລະບົບ</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table class="table table-striped" id="myCategory">
                            <thead>
                            <tr>
                                <th>ເລກທີ</th>
                                <th>ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                                <th>ລະຫັດຜ່ານ</th>
                                <th>ສິດນຳໃຊ້</th>
                                <th>ສິດທິເພີ່ມຕື່ມ</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            <? foreach($tbl_users as $user) { ?>
                                <tr>
                                    <td><?php echo $user->user_id; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->password; ?></td>
                                    <td><?php echo $user->role; ?></td>
                                    <td><?php echo $user->roles; ?></td>
                                    <td>
                                        <a href="<?=url('staff-info/edit/'.$user->user_id) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-pen"></i></a>
                                        <a href="<?=url('staff-info/delete/'.$user->user_id) ?>" onclick="return confirm('Delete staff-info?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

                           <div class="modal fade" id="modal-add-staff" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">ເພີ່ມລາຍຊື່ພະນັກງານ</h4>
                            </div>
                            <div class="modal-body">

                            <form action="<?=url('staff-info/save')?>" method="POST">
                            <div class="card-header">
                                <label for="category" style="color: #0000C0; font-size: 20px">ຂໍ້ມູູນຜູ້ໃຊ້ລະບົບ</label>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="ຊື່ຜູ້ໃຊ້ລະບົບ">
                            <input type="text" class="form-control" name="user_password" placeholder="ລະຫັດຜ່ານ">
                            <div class="form-group">
                                <br>
                                <label for="">ສິດຂອງຜູ້ໃຊ້ລະບົບ</label><br>
                    
                                <select class="form" name="role" required>

                                    <option>Admin</option>
                                    <option>Operator</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <br>
                                <label for="">ສິດທິເສີມ</label><br>
                    
                                <select class="form" name="roles" required>

                                    <option>AdmHouse</option>
                                   

                                </select>
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
            $('#modal-add-staff').modal('show');
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
                $('#img_preview').attr('src', e.target.result)
                    .width(250)
                    .height(200);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>