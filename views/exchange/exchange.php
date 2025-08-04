<?php

if($_SESSION['role_auth'] != "Admin"){
    direction::redirect("");
}
$select = new database();
$exchange = $select->query('SELECT * FROM exchange');

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
                        <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: #0000C0">ອັດຕາແລກປ່ຽນປະຈຳວັນ</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body" style="font-size: 20px;">
                        <table class="table table-striped" id="myCategory">
                            <thead>
                            <tr>
                                <th>ລຳດັບ</th>
                                <th>ຊື່ສະກຸນເງິນ</th>
                                <th>ອັດຕາແລກປ່ຽນ</th>
                                <th>code</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?  $no = 1;
                            foreach($exchange as $exchanges) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $exchanges->ex_name; ?></td>
                                    <td><?php echo number_format($exchanges->ex_rate); ?></td>
                                    <td><?php echo $exchanges->ex_code; ?></td>
                                    <td>
                                        <a href="<?=url('exchange/edit/'.$exchanges->ex_id) ?>" class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-pen"></i></a>
                                        <a href="<?=url('exchange/delete/'.$exchanges->ex_id) ?>" onclick="return confirm('Delete Exchang Rate ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

            <div class="card-body" style="font-size: 20px;">
                <!-- /.box-header -->
                <!-- form start -->
              

                <!-- Category Table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="box-title" style="font-family: 'Phetsarath OT'; color: red;">ອັດຕາແລກປ່ຽນປະຈຳວັນ ຈາກທະນາຄານ</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table class="table table-striped" id="myCategory">
                            <thead>
                            <tr>
                                <th>ລຳດັບ</th>
                                <th>ຊື່ສະກຸນເງິນ</th>
                                <th>ອັດຕາແລກປ່ຽນ</th>
                              
                               
                            </tr>

                            </thead>
                            <tbody>
                            <?  $no = 1;
                              ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>USD</td>
                                    <td id="currencyUSD"></td>
                                    <td></td>
                                   
                                </tr>
                           <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>THB</td>
                                    <td id="currencyTHB"></td>
                                    <td></td>
                                    
                                </tr>
                            <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>EUR</td>
                                    <td id="currencyEUR"></td>
                                    <td></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <!-- /.box -->
            </div>


                           <!-- Modal -->

                           <div class="modal fade" id="modal-add-exchange" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">ເພີ່ມລາຍການອັດຕາແລກປ່ຽນ</h4>
                            </div>
                            <div class="modal-body">

                            <form action="<?=url('exchange/save')?>" method="POST">
                            <div class="card-header">
                                <label for="category" style="color: #0000C0; font-size: 20px">ຂໍ້ມູູນອັດຕາແລກປ່ຽນ</label>
                            </div>
                            <input type="text" class="form-control" name="rate" placeholder="ຕົວເລກອັດຕາ">
                            <input type="text" class="form-control" name="name" placeholder="ຊື່ພາສາລາວ">
                            <div class="form-group">
                                <br>
                                <label for="">ລະຫັດສະກຸນເງິນ</label><br>
                    
                                <select class="form" name="code" required>

                                    <option>USD</option>
                                    <option>THB</option>
                                    <option>VND</option>

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
    var APIUrl = "https://v6.exchangerate-api.com/v6/73b5d3ec288ca48100b74e10/latest"

$(document).ready(function($) {
        $('#add-new-item').click(function() {
            $('#modal-add-exchange').modal('show');
        });


  $.ajax({
            type: "GET",
            url: APIUrl + '/USD',
            success: function (data) {
                    //   alert(data.conversion_rates.USD);
                      document.getElementById('currencyUSD').innerHTML = data.conversion_rates.LAK.toLocaleString('en-US',{minimumFractionDigits:0, maximumFractionDigits:2});
                    },
                    error: function (error) {

                        jsonValue = jQuery.parseJSON(error.responseText);
                        alert("error" + error.responseText);
                    }
          
        });

          $.ajax({
            type: "GET",
            url: APIUrl + '/USD',
            success: function (data) {
                    //   alert(data.conversion_rates.USD);
                    var thb = data.conversion_rates.THB;
                    var usd = data.conversion_rates.LAK
                    var thbtolak = usd / thb;
                      document.getElementById('currencyTHB').innerHTML = thbtolak.toLocaleString('en-US',{minimumFractionDigits:0, maximumFractionDigits:2});
                    },
                    error: function (error) {

                        jsonValue = jQuery.parseJSON(error.responseText);
                        alert("error" + error.responseText);
                    }
          
        });
           $.ajax({
            type: "GET",
            url: APIUrl + '/EUR',
            success: function (data) {
                    //   alert(data.conversion_rates.USD);
                   
                      document.getElementById('currencyEUR').innerHTML = data.conversion_rates.LAK.toLocaleString('en-US',{minimumFractionDigits:0, maximumFractionDigits:2});
                    },
                    error: function (error) {

                        jsonValue = jQuery.parseJSON(error.responseText);
                        alert("error" + error.responseText);
                    }
          
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