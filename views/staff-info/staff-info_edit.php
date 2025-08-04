<?php
$select = new database();
$tbl_user = $select->query("SELECT * FROM tbl_user WHERE user_id = '" . $id . "' ");
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
            <!-- Category Form-->
            <div class="col-md-4">
                <div class="card">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?= url('staff-info/edit/save') ?>" method="POST">
                        <input type="hidden" name="id_user" value="<?= $id ?>" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</label>
                                <input type="text" class="form-control" name="username" placeholder="ຊື່ຜູ້ໃຊ້ລະບົບ" value="<?= $tbl_user[0]->username ?>" required>

                                <input type="text" class="form-control" name="user_password" placeholder="ລະຫັດຜ່ານ" value="<?= $tbl_user[0]->password ?>">
                                <div class="form-group">
                                    <label for="">ສິດຂອງຜູ້ໃຊ້ລະບົບ</label><br>
                                
                                    <select class="form" name="role" required>

                                        <option>Admin</option>
                                        <option>Operator</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">ສິດທິເສີມ</label><br>
                                
                                    <select class="form" name="roles" required>

                                        <option>Admhouse</option>
                                        

                                    </select>
                                </div>
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
                            <th>ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                            <th>ລະຫັດຜ່ານ</th>
                            <th>ສິດນຳໃຊ້</th>
                            <th>ສິດທິເສີມ</th>

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