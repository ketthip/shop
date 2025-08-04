<?php
$select = new database();
$warehouses = $select->query("SELECT * FROM warehouse");

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
                <div class="card-body">
                    <h4 style="text-align: center;color: #005cbf;text-decoration: underline">ປ້ອນລະຫັດບາໂຄດໃສ່ເພື່ອນຳສິນຄ້າເຂົ້າໃນສາງ</h4>
                    <form action="<?= url('store/save') ?>" method="POST" name="form_product" enctype="multipart/form-data">
                        <div class="col-md-12" style="overflow-x:auto;">
                            <table class="table table-border" id="myOrder">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ລະຫັດສິນຄ້າ</th>
                                        <th>ຊື່ສິນຄ້າ</th>
                                        <th>ໂຊນສິນຄ້າ</th>
                                        <th>Lot.No</th>
                                        <th>ວັນໝົດອາຍຸ</th>
                                        <th>ຈ/ນຕ່ຳສຸດທີ່ຍັງຄ້າງສາງ</th>
                                        <th>ຈຳນວນໃນສະຕ໋ອກ</th>
                                        <th>ລາຄາ</th>
                                        <th>ໜ່ວຍນັບ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="hidden" class="form-control productid" name="productid[]" readonly></td>
                                        <td><input class="form-control productcode" name="productcode" style="width:150px;" placeholder="ປ້ອນລະຫັດບາໂຄດ" required></td>
                                        <td><input type="text" class="form-control productname" style="width:250px;" name="productname" readonly></td>
                                        <td><input type="text" class="form-control salezone" style="width:100px;" name="salezone" readonly></td>
                                        <td><input type="text" class="form-control lotnumber" style="width:100px;" name="lotnumber" required></td>
                                        <td><input type="date" class="form-control expireddate" style="width:200px;" name="expireddate" required></td>
                                        <td><input type="text" class="form-control min_stock" style="width:50px;" name="min_stock" required></td>
                                        <td><input type="text" class="form-control stock" style="width:50px;" name="stock" required></td>
                                        <td><input type="text" class="form-control sell_price" style="width:100px;" name="sell_price" readonly></td>
                                        <td><input type="text" class="form-control productsatuan" style="width:100px;" name="productsatuan" readonly></td>
                                        <td><button type="submit" name="add_to_warehouse" class="btn btn-success" required><span>
                                                    <i class="fa fa-save"></i>
                                                </span></button>
                                        </td>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="color: #005cbf">ລາຍການສິນຄ້າທັງໝົດທີ່ມີໃນສາງ</h3>
                        </div>
                        <!-- /.card-header -->
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
                                            <center>Lot.No</center>
                                        </th>
                                        <th>
                                            <center>ໂຊນສິນຄ້າ</center>
                                        </th>
                                        <th>ຈຳນວນທີ່ມີໃນສາງ</th>
                                        <th>ລາຄາ</th>
                                        <th>
                                            <center>ໜ່ວຍນັບ</center>
                                        </th>
                                        <th>
                                            <center>ມື້ທີ່ນຳເຂົ້າ</center>
                                        </th>
                                        <th>
                                            <center>ມື້ທີ່ແກ້ໄຊ</center>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $no = 1;
                                    foreach ($warehouses as $warehouse) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $warehouse->product_name ?></td>
                                            <td><?= $warehouse->product_code ?></td>
                                            <td><?= $warehouse->lot_no ?></td>
                                            <td><?= $warehouse->sale_zone ?></td>
                                            <td><?= $warehouse->stock ?> </td>
                                            <td><?= $warehouse->sell_price ?></td>
                                            <td><span><?= $warehouse->unit ?></span></td>
                                            <td><?= $warehouse->recorded_date ?></td>
                                            <td><?= $warehouse->edit_date ?></td>
                                            <td>
                                                <a href="<?= url('store/edit/' . $warehouse->product_code) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-pen"></i></a>
                                                <a href="<?= url('store/delete/' . $warehouse->wh_id) ?>" onclick="return confirm('ຕ້ອງການລຶບສິນຄ້າແທ້ບໍ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    $('.productcode').on('change', function(e) {
        var product_code = this.value;
        var tr = $(this).parent().parent();
        $.ajax({
            method: "get",
            url: "store/get_item/"+product_code,
            data: {
                product_code: product_code
            },
            success: function(data) {
                //console.log(data)
                $.each( data, function( key, value ) {
                // $('#submit-item').val(data.event);
                tr.find(".productname").val(value["product_name"]);
                tr.find(".productsatuan").val(value["product_satuan"]);
                tr.find(".salezone").val(value["zone"]);
                tr.find(".sell_price").val(value["sell_price"]);
                // $('#product_code').val(data["product_code"]);
                // $('#productsatuan').val(data["product_satuan"]);
                });
            },
            error: function() {
                alert('Error: L56+');
            }
        })
    })
</script>

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

</html>
