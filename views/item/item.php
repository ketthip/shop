<?php

if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$products = $select->query("SELECT * FROM tbl_product");
$categorys = $select->query("SELECT * FROM category");
$suppliers = $select->query("SELECT * FROM supplier");
$product_zones = $select->query("SELECT * FROM product_zone");
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
                <button class="btn btn-success" id="add-new-item">ເພີ່ມລາຍການ +</button>
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ລາຍການສິນຄ້າທັງໝົດ</h3>
                        </div>
                        <div class="card-body">
                            <table id="product_list" class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>ລ/ດ</th>
                                        <th>
                                            <center>ຊືສິນຄ້າ</center>
                                        </th>
                                        <th>ລະຫັດບາໂຄດ</th>
                                        <th>
                                            <center>ຜູ້ສະໜອງ</center>
                                        </th>
                                        <th>ໂຊນສິນຄ້າ</th>
                                        <th>
                                            <center>ຕົ້ນທຶນສະເລ່ຍ</center>
                                        </th>
                                        <th>ລາຄາຂາຍຍ່ອຍ</th>
                                        <th>
                                            <center>ໜ່ວຍນັບ</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $no = 1;
                                    foreach ($products as $product) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $product->product_name ?></td>
                                            <td><?= $product->product_code ?></td>
                                            <td><?= $product->product_supplier ?></td>
                                            <td><?= $product->zone ?></td>
                                            <td>kip <?= number_format($product->purchase_price) ?></td>
                                            <td>kip <?= number_format($product->sell_price) ?></td>
                                            <td><span><?= $product->product_satuan ?></span></td>
                                            <td>
                                                <? if (auth('role') == "Admin") { ?>
                                                    <a href="<?= url('item/delete/' . $product->product_id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    <a href="<?= url('item/edit/' . $product->product_code) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a>
                                                <? } ?>
                                                <a href="<?= url('item/view/' . $product->product_code) ?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="modal fade" id="modal-add-item" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">ເພີ່ມລາຍການສິນຄ້າ</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?=url('item/save')?>" method="POST" name="form_product" enctype="multipart/form-data" autocomplete="off">
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">ລະຫັດສິນຄ້າ</label><br>
                                                <span class="text-muted">*ລະຫັດຕ້ອງຖືກກັບສິນຄ້າໂຕຈິງ</span>
                                                <input type="text" class="form-control" name="product_code">
                                            </div>
                                            <div class="form-group">
                                                <label for="">ຊື່ສິນຄ້າ</label>
                                                <input type="text" class="form-control" name="product_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">ປະເພດສິນຄ້າ</label>
                                                <select class="form-control" name="category" required>
                                                    <? foreach ($categorys as $category) { ?>
                                                        <option><?= $category->cat_name ?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">ຜູ້ສະໜອງ/ຢີ່ຫໍ້ສິນຄ້າ</label>
                                                <select class="form-control" name="supplier" required>
                                                    <? foreach ($suppliers as $supplier) { ?>
                                                        <option><?= $supplier->name_sup ?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">ໂຊນສິນຄ້າ</label>
                                                <select class="form-control" name="zone" required>
                                                    <? foreach ($product_zones as $product_zone) { ?>
                                                        <option><?= $product_zone->zone ?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">ລາຄາຕົ້ນທຶນ</label>
                                                <input type="number" min="1000" step="1000" class="form-control" name="purchase_price" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">ລາຄາຂາຍ</label>
                                                <input type="number" class="form-control" name="sell_price" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">ໜ່ວຍນັບ</label>
                                                <select class="form-control" name="unit" required>
                                                    <? foreach ($units as $unit) { ?>
                                                        <option><?= $unit->name_unit ?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">ລາຍລະອຽດຂອງສິນຄ້າ</label>
                                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group" id="show_pic">
                                                <label for="">ຮູບສິນຄ້າ</label><br>
                                                <br>
                                                <input type="file" class="input-group" name="product_img" onchange="readURL(this);" accept=".jpg,.jpeg,.png,.gif" > <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" name="add_product">ເພີ່ມສິນຄ້າ</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">ກັບຄືນ</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
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
<? if (flash('success')) { ?>
    <script>alert("<?= flash('success') ?>")</script>
<? } ?>

<? if(flash('error')){?>
    <script>alert("<?=flash('error')?>")</script>
<? } ?>

<? extend("layouts/footer_index"); ?>
<script type="text/javascript">
    $(function() {
        $("#product_list").DataTable(
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
<script type="text/javascript">
    $(document).ready(function($) {
        $('#add-new-item').click(function() {
            $('#modal-add-item').modal('show');
        });

    });

    function editModal(product_code) {

        $.ajax({
            method: "get",
            url: "data/get_item.php",
            data: {
                product_code: product_code
            },
            success: function(data) {
                // $('#submit-item').val(data.event);
                $('#product_code').val(data["product_code"]);
                $('#product_name').val(data["product_name"]);
                $('#category').val(data["category"]);
                $('#purchase_price').val(data["purchase_price"]);
                $('#sell_price').val(data["sell_price"]);
                $('#stock').val(data["stock"]);
                $('#unit').val(data["product_satuan"]);
                $('#description').val(data["description"]);
                $('#product_img').val(data["product_img"]);
                $('#modal-edit-product').modal('show');

            },
            error: function() {
                alert('Error: L56+');
            }
        });
    } //end editModal

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
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