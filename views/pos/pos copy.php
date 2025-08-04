<?php
$select = new database();
$tbl_inventorys = $select->query("SELECT * FROM tbl_inventory");

?>
<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <title>Breakfast POS Demo</title>
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
    </style>
</head>

<body data-ng-controller="POSController">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header" style="float: left; font-family: 'Phetsarath OT';font-size: 30px">
                <a class="navbar-brand font-weight-bold" style="color: #0c63e4; font-size: 30px" href="#"><strong>ເກດມະນີໄອທີ</strong></a>
            </div>
            <ul class="nav navbar-nav navbar-right" style="font-family: 'Phetsarath OT';font-size: 20px">
                <li><a href="#" style=" color: #0a53be; ">ຜູ້ໃຊ້ລະບົບ:<?= auth('username') ?></a></li>
                <li><a href="#" style=" color: #0a53be; "><strong>ອອກຈາກລະບົບ</strong></a></li>
            </ul>
        </div>
    </nav>
    <!-- /.nav -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-7">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="JQProductCode">ປ້ອນລະຫັດສິນຄ້າ: </label>
                                        <!--<input class="form-control productcode" id="JQProductCode" ng-model="code" ng-change="addOrder(code,1)" placeholder="ປ້ອນລະຫັດສິນຄ້າ">-->
                                        <input class="form-control productcode" id="JQProductCode" ng-model="code" ng-keypress="addOrder(code,1,$event)" placeholder="ປ້ອນລະຫັດສິນຄ້າ">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2" ng-show="order.length">
                                <span class="btn btn-default btn-marginTop btn-block" ng-click="clearOrder()" ng-disabled="!order.length">ເລີ່ມໃໝ່</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="max-height:auto; overflow:auto;">
                        <div class="text-danger text-center" ng-hide="order.length">
                            <strong>ຍັງບໍ່ມີລາຍງການສິນຄ້າ.</strong>
                        </div>
                        <div class="text-right" ng-show="order.length">
                            <h4>
                                ລາຍການຂາຍ: <span class="label label-info">{{qtyTotal()}}</span> |
                                <strong>ລາຄາທັງໝົດ: <span class="text-danger">{{orderTotal() | currency:"":0}}</span></strong>
                            </h4>
                            <hr>
                        </div>

                        <div class="row" ng-show="order.length">
                            <div class="col-md-1 text-center">ຈຳນວນ</div>
                            <div class="col-md-4">ຊື່ສິນຄ້າ</div>
                            <div class="col-md-2">ລາຄາລວມ</div>
                            <div class="col-md-2">ລາຄາຫົວໜ່ວຍ</div>
                            <div class="col-md-1">ເພີ່ມ/ລຶບ</div>
                            <div class="col-md-2">ລຶບລາຍການ</div>
                        </div>
                        <ul class="list-group" ng-show="order.length">
                            <li class="list-group-item order_list" ng-repeat="itemlist in order">
                                <div class="row">
                                    <div class="col-md-1">
                                        <span class="badge badge-left order_item" ng-bind="itemlist.qty"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="order_item">{{itemlist.product_name}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="text-danger"><strong class="order_item">{{itemlist.sell_price * itemlist.qty | currency:"":0}}</strong></span>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="order_item">{{itemlist.sell_price | currency:"":0}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <!--<button class="btn btn-success btn-sm" ng-click="addItemOrder(itemlist,1)">-->
                                        <button class="btn btn-success btn-sm" ng-click="addItemOrder(itemlist,1,$event)" ng-disabled="custEnable">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                        <button class="btn btn-warning btn-sm" ng-click="removeItemOrder(itemlist,1)" ng-disabled="custEnable">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" ng-click="removeOrder(itemlist)" ng-disabled="custEnable">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="panel-title"><strong>ຮັບເງິນຈາກລູກຄ້າ</strong></span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-7">
                                <button type="button" class="btn btn-primary btn-block" ng-disabled="!order.length" ng-click="receiveCustPay()">ຮັບເງິນ</button>
                                <input class="form-control input-lg" type="text" placeholder="ມູນຄ່າ" id="JQCustPay" disabled>
                                <div>
                                    <div class="div_num">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="1" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="2" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="3" ng-disabled="!custEnable">
                                        <input class="btn btn-success btn-lg JQbtn_price_row" type="button" value="500" ng-disabled="!custEnable">
                                    </div>
                                    <div class="div_num">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="4" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="5" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="6" ng-disabled="!custEnable">
                                        <input class="btn btn-success btn-lg JQbtn_price_row" type="button" value="1000" ng-disabled="!custEnable">
                                    </div>
                                    <div class="div_num">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="7" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="8" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num" type="button" value="9" ng-disabled="!custEnable">
                                        <input class="btn btn-success btn-lg JQbtn_price_row" type="button" value="2000" ng-disabled="!custEnable">
                                    </div>
                                    <div class="div_num">
                                        <input class="btn btn-warning btn-lg JQbtn_num" type="button" value="C" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num_zero" type="button" value="0" ng-disabled="!custEnable">
                                        <input class="btn btn-default btn-lg JQbtn_num_zero" type="button" value="00" ng-disabled="!custEnable">
                                        <input class="btn btn-success btn-lg JQbtn_price_row" type="button" value="5000" ng-disabled="!custEnable">
                                    </div>
                                    <div class="div_num">
                                        <input class="btn btn-success btn-lg JQbtn_price" type="button" value="10000" ng-disabled="!custEnable">
                                        <input class="btn btn-success btn-lg JQbtn_price" type="button" value="20000" ng-disabled="!custEnable">
                                    </div>
                                    <div class="div_num">
                                        <input class="btn btn-success btn-lg JQbtn_price" type="button" value="50000" ng-disabled="!custEnable">
                                        <input class="btn btn-success btn-lg JQbtn_price" type="button" value="100000" ng-disabled="!custEnable">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <h4 class="text-primary text-center"><strong><ins>ລາຍລະອຽດການຈ່າຍເງິນ</ins></strong></h4>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <dl ng-show="submitShow">
                                            <dt>ລາຄາທັງໝົດ:</dt>
                                            <dd class="text-primary">{{submitCheckout.checkOutTotal | currency:"":0}}</dd>
                                            <dt>ຮັບເງິນຈາກລູກຄ້າ:</dt>
                                            <dd class="text-primary">{{submitCheckout.checkOutPay | currency:"":0}}</dd>
                                            <dt>ສ່ວນລຸດ:</dt>
                                            <dd class="text-primary">{{submitCheckout.checkOutDiscount | currency:"":0}}</dd>
                                            <dt>ເງິນຖອນ:</dt>
                                            <dd class="text-primary">{{submitCheckout.checkOutChange | currency:"":0}}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-5">
                                <button class="btn btn-info btn-block" type="button" id="JQCheckOut" ng-click="checkOut()" disabled><strong>ພິມບິນ</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>

</html>
<script>
$(document).ready(function() {
    $('#JQProductCode').focus();
});
</script>