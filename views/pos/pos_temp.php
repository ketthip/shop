<?php
$select = new database();
$inventories = $select->query('SELECT * FROM tbl_inventory');
$tbl_invoice_detail_temp = $select->query("SELECT * FROM tb_invoice_detail_temp");
$invoice_total = $select->query("SELECT sum(total) as total FROM tb_invoice_detail_temp");
$exchange = $select->query("SELECT * FROM exchange");
$total ="";

foreach($invoice_total as $invoices){
    $total = number_format(doubleval($invoices->total));
}
?>
<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <title>POS Customer</title>
    <link rel="stylesheet" href="<?= asset('plugins/bootstrap-3.4.1/css/bootstrap.min.css') ?>">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet" />-->
    <link href="<?= asset('plugins/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" />
    <link href="<?= asset('css/style.css') ?>" rel="stylesheet" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset('plugins/angularjs-1.7.9/angular.min.js') ?>"></script>
    <script src="<?= asset('plugins/angularjs-1.7.9/angular-animate.min.js') ?>"></script>
    <script src="<?= asset('plugins/bootstrap-3.4.1/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('js/angular/app.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?=asset('plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
    <style>
        .JQbtn_num {
            width: 45px;
        }

        .JQbtn_num_zero {
            width: 45px;
            height: 45px;
            margin: 0 auto;
            padding: 0;
            vertical-align: middle;
        }

        .JQbtn_price_row {
            width: 72px;
        }

        .JQbtn_price {
            width: 108px;
        }

        .div_num {
            padding-left: 11%;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #3498db;
            width: 30px;
            height: 30px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

            /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        :root {
            --borderWidth: 7px;
            --height: 24px;
            --width: 12px;
            --borderColor: #78b13f;
        }
        .check {
            display: inline-block;
            transform: rotate(45deg);
            height: var(--height);
            width: var(--width);
            border-bottom: var(--borderWidth) solid var(--borderColor);
            border-right: var(--borderWidth) solid var(--borderColor);
        }

  
    </style>
</head>

<body data-ng-controller="POSController">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            
            <ul class="nav navbar-nav navbar-right" style="font-family: 'Phetsarath OT';font-size: 20px">
                <li><a href="#" style=" color: #0a53be; ">ພະນັກງງານຂາຍ: <?= auth('username') ?></a></li>
                <!-- <li><a href="<?=url('logout')?>" style=" color: #0a53be; " onclick="return confirm('ທ່ານແນ່ໃຈບໍ?')"><strong>ອອກຈາກລະບົບ</strong></a></li> -->
            </ul>
        </div>
    </nav>
    <!-- /.nav -->
    <div class="container-fluid">
        <div class="row">
           

        
            <div class="col-md-7 ">
                <div class="panel panel-info w-100 p-3">
                    <div class="panel-heading">
                        <span class="panel-title"><strong>ໂປໂມຊັ້ນຈາກທາງຮ້ານ</strong></span>
                    </div>
                    <div class="w3-content w3-section " >
                    <img class="mySlides" src="<?=asset('img/cometic1.jpg ')?>" style="max-width:50%;">
                    <!-- <img class="mySlides" src="<?=asset('img/logo.jpeg ')?>"  style="max-width:50%;"> -->
                    <img class="mySlides" src="<?=asset('img/qr2.png ')?>"  style="max-width:50%;">
                    </div>
                </div>
            </div>
    


        <div  class="col-md-5">
                <div class="panel ">
                        <div class="row" id="mySecondMainDiv" style="text-align: center;" >
                            <!-- <div class="col-md-5"> -->
                                <!-- <form class="form-inline"> -->
                                    <!-- <div class="form-group"> -->
                                   <span class="text-danger" style="font-size: 50px; " id="mySecondRefresh">ລວມ: <?= $total; ?> ກີບ </span> 
                                    <!-- </div> -->
                                </form>
                            <!-- </div> -->

                        </div>
                   
                    <div  class="panel-body" style="max-height:auto; overflow:auto;">
                    <table id="product_list" class="table table-bordered table-hover ">
                                <thead style="background-color: lightblue;">
                                    <tr>
                                        <th style="width:100px;">ລາຍການ</th>
                                        <th  style="width:30px;">ຈຳນວນ</th>
                                        <th  style="width:80px;">ລາຄາລວມ</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id ="myMainDiv">
                                    <? $no = 1;
                                    foreach ($tbl_invoice_detail_temp as $product) { ?>
                                        <tr id="myRefreshDiv">
                                            <td><?= $product->product_name ?></td>
                                            <td><?= $product->qty ?></td>
                                            <td><?= number_format($product->total) ?> ກີບ</td>
                                            
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                     

                       
                    </div>
                </div>
            </div>


            <div class="col-md-7">
                <div class="panel panel-info">           
                <img src="<?=asset('img/qr2.png ')?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
                <img src="<?=asset('img/qr2.png ')?>"class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
                <img src="<?=asset('img/qr2.png ')?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
                </div>
            </div>


        </div>
    </div>
<div id="JQFrameLoad" hidden></div>
</body>
</html>
<script>    
//         $(document).ready(function () {

//             setInterval( function() {
//                 $("#myMainDiv").load(location.href + " #myRefreshDiv");
//             }, 1000 );

// });

   


var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); // Change image every 2 seconds
}

    $(document).ready(function() {
        setInterval( function() {
                $("#myMainDiv").load(location.href + " #myRefreshDiv");
             }, 3000 );

             setInterval( function() {
                $("#mySecondMainDiv").load(location.href + " #mySecondRefresh");
             }, 3000 );

        
       
    });

</script>