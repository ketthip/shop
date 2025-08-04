<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Online Shop</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!--    bootstrap-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



    <style type="text/css">
        btn .addList{
            float: right;
        }
    </style>

    <!--    <link rel="stylesheet" href="dist/css/bootstrap.min.css">-->
    <!--    <script type="text/javascript" src="dist/js/bootstrap.bundle.min.js"></script>-->

</head>

<body>





<nav class="navbar navbar-default" role="navigation" style="color:#fff;background-image: linear-gradient(to bottom,#337ab7 0,#337ab7 100%);">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="HOME" style="color: #fff;">
                <b>KMN IT </b>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li>
                    <a href="HOME" style="color: #fff;"> <b>ຫນ້າທໍາອິດ</b></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">



                <li>
                    <a style="color: #fff;">Admin </a>
                </li>


                <li> <a href="http://laos-it.com/vtn/logout" style="color: #fff;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> ອອກຈາກລະບົບ</a></li>



            </ul>
        </div><!-- /.navbar-collapse -->
    </div>




</nav>
<div class="col-md-12" ng-app="firstapp" ng-controller="Index">

    <div class="panel panel-default">
        <div class="panel-body">

            <b>ອອກແບບບາໂຄ້ດ</b>
            <br />


            <table class="table table-bordered">
                <thead>
                <tr class="trheader">
                    <th>ຄວາມກ້ວາງ</th>
                    <th>ຄວາມສູງ</th>
                    <th>ໄລຍະທາງຂວາ</th>
                    <th>ໄລຍະທາງຊ້າຍ</th>
                    <th>ຄວາມສູງ barcode</th>
                    <th>ຄວາມກວ້າງ barcode</th>
                    <th>ຂະໜາດລາຄາ</th>
                    <th>ຂະໜາດຊື່ສິນຄ້າ</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="number" class="form-control" ng-model="widthlabel"></td>
                    <td><input type="number" class="form-control" ng-model="heightlabel"></td>
                    <td><input type="number" class="form-control" ng-model="marginright"></td>
                    <td><input type="number" class="form-control" ng-model="marginbottom" ></td>
                    <td><input type="number" class="form-control" ng-model="heightbarcode" ></td>
                    <td><input type="number" class="form-control" ng-model="widthbarcode" ></td>
                    <td><input type="number" class="form-control" ng-model="sizeprice" ></td>
                    <td><input type="number" class="form-control" ng-model="sizepname" ></td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-success"  ng-click="Savesetting()">ບັນທຶກການຕັ້ງຄ່າ</button>


            <hr />
            <button class="btn btn-warning"  onclick="window.print()">ຕົວຢ່າງກ່ອນພິມ</button>
            <br /><br />


            <div id="section-to-print" >

     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div><div style="margin-right: {{marginright}}px;margin-bottom: {{marginbottom}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: 1px;">
                    <center>
 <span style="font-size: {{sizepname}}px;">	3454.53.4<span>
<br />
     <img style="width: {{widthbarcode}}px;height: {{heightbarcode}}px;" src="http://laos-it.com/vtn/warehouse/barcode/png?barcode=	1624551528"> <br />

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
0.00/1,000,000.00
     </span></center></div>
            </div>

            <div class="col-md-12">
                <hr />
            </div>








        </div>


    </div>

</div>


<script>
    var app = angular.module('firstapp', []);
    app.controller('Index', function($scope,$http,$location) {


        $scope.widthlabel = '';
        $scope.heightlabel = '';
        $scope.marginright = '';
        $scope.marginbottom = '';
        $scope.heightbarcode = '';
        $scope.widthbarcode = '';
        $scope.sizeprice = '';
        $scope.sizepname = '';



        $scope.Getsetting = function(s){
            $http.post("Barcode_ds/getsetting",{

            }).success(function(data){

                $scope.widthlabel = parseFloat(data[0].widthlabel);
                $scope.heightlabel = parseFloat(data[0].heightlabel);
                $scope.marginright = parseFloat(data[0].marginright);
                $scope.marginbottom = parseFloat(data[0].marginbottom);
                $scope.heightbarcode = parseFloat(data[0].heightbarcode);
                $scope.widthbarcode = parseFloat(data[0].widthbarcode);
                $scope.sizeprice = parseFloat(data[0].sizeprice);
                $scope.sizepname = parseFloat(data[0].sizepname);


            });

        }
        $scope.Getsetting();


        $scope.Savesetting = function(s){
            $http.post("Barcode_ds/savesetting",{
                widthlabel: $scope.widthlabel,
                heightlabel: $scope.heightlabel,
                marginright: $scope.marginright,
                marginbottom: $scope.marginbottom,
                heightbarcode: $scope.heightbarcode,
                widthbarcode: $scope.widthbarcode,
                sizeprice: $scope.sizeprice,
                sizepname: $scope.sizepname
            }).success(function(data){
                toastr.success('บันทึกสำเร็จ');
                $scope.Getsetting();

            });

        }





    });
</script>
﻿<br />
<div class="text-center" style="color: #fff;">
    <!-- Language <a href="http://laos-it.com/vtn/?lang=th">ภาษาไทย</a>
    | <a href="http://laos-it.com/vtn/?lang=lao">ພາສາລາວ</a>
    <br /> -->

    Support: <a style="color: #fff;" href="https://www.facebook.com/laosoftware.asia" target="_blank">
        laosoftware.asia
    </a>
</div>



<script src="http://laos-it.com/vtn/js/excel-export.js"></script>


</body>
</html>





<style type="text/css">
    body{
        font-family: Phetsarath OT;
        background-color: #f5f5f5;
    }
</style>