<?php
$select = new database();
$return_product = $select->query("SELECT return_product.*, warehouse.* FROM return_product INNER JOIN warehouse 
                                    ON return_product.product_code = warehouse.product_code");

$claimed_product = $select->query("SELECT * FROM claimed_product");

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
                    <h4 style="text-align: center;color: #005cbf;text-decoration: underline">ປ້ອນລະຫັດບາໂຄດໃສ່ເພື່ອນຳສິນຄ້າຄືນເຂົ້າໃນສາງ</h4>
                    <form action="<?= url('store/return') ?>" method="POST" name="form_product" enctype="multipart/form-data">
                        <div class="col-md-12" style="overflow-x:auto;">
                            <table class="table table-border" id="myOrder">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ລະຫັດສິນຄ້າ</th>
                                        <th>ຊື່ສິນຄ້າ</th>
                                         <th>ເລກທີໃບບິນ</th>
                                        <th>ຈຳນວນທີ່ສົ່ງຄືນ</th>
                                        <th>ລາຄາ</th>
                                        <th>ໜ່ວຍນັບ</th>
                                          <th>ໂຊນສິນຄ້າ</th>
                                        <th>Lot.No</th>
                                         <th>ໝາຍເຫດ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="hidden" class="form-control productid" name="productid[]" readonly></td>
                                        <td><input class="form-control productcode" name="productcode" style="width:170px;" placeholder="ປ້ອນລະຫັດບາໂຄດ" required></td>
                                        <td><input type="text" class="form-control productname" style="width:250px;" name="productname" readonly></td>
                                        <td><input type="text" class="form-control invoice_id" style="width:70px;" name="invoice_id" required></td>
                                        <td><input type="text" class="form-control return_amount" style="width:70px;" name="return_amount" required></td>
                                        <td><input type="text" class="form-control sell_price" style="width:150px;" name="sell_price" readonly></td>
                                        <td><input type="text" class="form-control productsatuan" style="width:100px;" name="productsatuan" readonly></td>
                                        <td><input type="text" class="form-control salezone" style="width:100px;" name="salezone" readonly></td>
                                        <td><input type="text" class="form-control lot_no" style="width:100px;" name="lot_no" readonly></td>
                                         <td><input type="text" class="form-control remark" style="width:250px;" name="remark" required></td>
                                        <td><button type="submit" class="btn btn-success" required><span>
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
                            <h3 class="card-title" style="color: #005cbf;   ">ລາຍການສິນຄ້າທັງໝົດທີ່ສົ່ງຄືນ</h3>
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
                                        <th>ຈຳນວນທີ່ສົ່ງຄືນ</th>
                                        <th>ລາຄາ</th>
                                        <th>
                                            <center>ໜ່ວຍນັບ</center>
                                        </th>
                                        <th>
                                            <center>ມື້ທີ່ສົ່ງຄືນ</center>
                                        </th>
                                        <th>
                                            <center>ສາເຫດ</center>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $no = 1;
                                    foreach ($return_product as $return_products) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $return_products->product_name ?></td>
                                            <td><?= $return_products->product_code ?></td>
                                            <td><?= $return_products->lot_no ?></td>
                                            <td><?= $return_products->sale_zone ?></td>
                                            <td><?= $return_products->return_amount ?> </td>
                                            <td><?= $return_products->sell_price ?></td>
                                            <td><span><?= $return_products->unit ?></span></td>
                                            <td><?= $return_products->return_date ?></td>
                                            <td><?= $return_products->remark ?></td>
                                            <td>
                                                <a href="<?= url('product_return/edit/' . $return_products->product_code) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-industry"></i></a>
                                                <a href="<?= url('store/delete/' . $return_products->wh_id) ?>" onclick="return confirm('ຕ້ອງການກຳຈັດສິນຄ້າແທ້ບໍ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

                 <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="color: #005cbf;font-size: 20px;">ລາຍການສິນຄ້າທັງໝົດທີ່ Claim ນຳບ່ອນຜະລິດ</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product_claimed" class="table table-bordered table-hover ">
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
                                
                                        <th>ຈຳນວນທີ່ສົ່ງຄືນ</th>
                    
                                        <th>
                                            <center>ໜ່ວຍນັບ</center>
                                        </th>
                                        <th>
                                            <center>ມື້ທີ່ສົ່ງclaimed</center>
                                        </th>
                                        <th>
                                            <center>ສາເຫດ</center>
                                        </th>
                                        <th>Status</th>
                                        <th>
                                            <center>ມື້ທີ່ໄດ້ຮັບ Claimed</center>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $no = 1;
                                    foreach ($claimed_product as $claimed_products) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $claimed_products->product_name ?></td>
                                            <td><?= $claimed_products->product_code ?></td>
                                            <td><?= $claimed_products->lot_no ?></td>
                                            <td><?= $claimed_products->return_amount ?> </td>
                                            <td><span><?= $claimed_products->unit ?></span></td>
                                            <td><?= $claimed_products->claimed_date ?></td>
                                            <td><?= $claimed_products->remark ?></td>
                                              <td> <? if ($claimed_products->status == "pending") { ?>
                                                    <span style="text-transform:uppercase" class="badge bg-danger"><?= $claimed_products->status ?></span>
                                                <? } elseif ($claimed_products->status == "processing") { ?>
                                                    <span style="text-transform:uppercase" class="badge bg-primary"><?= $claimed_products->status ?></span>
                                                <? } else { ?>
                                                    <span style="text-transform:uppercase" class="badge bg-success"><?= $claimed_products->status ?></span>
                                                <? } ?>
                                              </td>
                                              <td><?= $claimed_products->warehouse_re_date ?></td>
                                            <td>
                                                
                                                <a href="<?= url('warehouse_claimed/edit/' . $claimed_products->product_code) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-store"></i></a>
                                                <!-- <a href="<?= url('store/delete/' . $claimed_products->wh_id) ?>" onclick="return confirm('ຕ້ອງການກຳຈັດສິນຄ້າແທ້ບໍ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
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
                 tr.find(".lot_no").val(value["lot_no"]);
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
     $(function() {
        $("#product_claimed").DataTable(
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
