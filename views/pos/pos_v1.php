<?php
$select = new database();
$tbl_inventorys = $select->query("SELECT * FROM tbl_inventory");

?>
<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <title>Breakfast POS Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet" />-->
    <link href="<?= asset('plugins/fontawesome-free/css/all.min.css" rel="stylesheet') ?>" />
    <link href="<?= asset('css/style.css') ?>" rel="stylesheet" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="https://code.angularjs.org/1.7.9/angular.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="<?= asset('js/angular/app.js') ?>"></script>
    <style>

    </style>
</head>

<body data-ng-controller="PosController">
    <div class="col-md-12">
        <div class="row">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header" style="float: left; font-family: 'Phetsarath OT';font-size: 30px">
                        <? foreach ($tbl_inventorys as $tbl_inventory) { ?>
                            <div>
                                <a href="#" class="brand-link" ng-repeat="user in users | filter:search">
                                    <span class="brand-text font-weight-bold" style="color: #0c63e4; "> <strong><?= $tbl_inventory->shop_name ?></strong></span>
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <div class="navbar-header" style="float: right; font-family: 'Phetsarath OT';font-size: 20px">
                        <strong><span class="hidden-xs text-lowercase" style=" color: #0a53be; ">ຜູ້ໃຊ້ລະບົບ:
                                <?= auth('username') ?></span> </strong>
                        &ensp;&ensp;
                        <strong><span style=" color: #0a53be; ">ອອກຈາກລະບົບ</span> </strong>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="bar">
                            <input type="text" ng-model="searchString" placeholder="ປ້ອນຂໍ້ມູນສິນຄ້າເພື່ອຄົ້ນຫາ" />
                        </div>
                        <div class="product-item">
                            <button class="btn btn-warning btn-pos btn-marginTop" data-ng-repeat="item in products | searchFor:searchString" data-ng-bind="item.product_name" data-ng-click="addToOrder(item,1)"></button>
                        </div>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4"><span class="panel-title">Order Summary</span></div>
                            <div class="col-md-4"><span>ວັນທີ: {{getDate()}}</span></div>
                            <div class="col-md-3 col-md-push-1"><span>ລາຍການຂາຍທັງໝົດ - </span><span class="badge">{{totOrders}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input class="form-control productcode" name="productcode[]" ng-model="code" ng-change="addProductToOrder(code,1)" placeholder="ປ້ອນລະຫັດສິນຄ້າ">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="max-height:320px; overflow:auto;">
                        <div class="text-warning" ng-hide="order.length">
                            Nothing ordered yet!
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item" ng-repeat="item in order">
                                <div class="row">
                                    <div class="col-md-1">
                                        <span class="badge badge-left" ng-bind="item.qty"></span>
                                    </div>
                                    <div class="col-md-4">
                                        {{item.product_name}}
                                    </div>
                                    <div class="col-md-1">
                                        <div class="label label-success">{{item.sell_price * item.qty | currency:"KIP ":0}}</div>
                                    </div>
                                    <div class="col-md-1 col-md-push-1">
                                        <div class="label label-warning">{{item.sell_price | currency:"KIP ":0}}</div>
                                    </div>
                                    <div class="col-md-2 col-md-push-2">
                                        <button class="btn btn-success btn-xs" ng-click="addToOrder(item,1)">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                        <button class="btn btn-warning btn-xs" ng-click="removeOneEntity(item)">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </div>
                                    <div class="col-md-1 col-md-push-2">
                                        <button class="btn btn-danger btn-xs" ng-click="removeItem(item)">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer" ng-show="order.length">
                        <h3><span class="label label-danger">Total: {{getTotal() | currency:"KIP ":0}}</span></h3>
                    </div>
                    <div class="panel-footer" ng-show="order.length">
                        <div>
                            <span class="btn btn-default btn-marginTop" ng-click="clearOrder()" ng-disabled="!order.length">ເລີ່ມໃໝ່</span>
                            <button type="button" class="btn btn-primary btn-marginTop" id="openModal">ຮັບເງິນ</button>
                            <!--                        <span class="btn btn-danger btn-marginTop" ng-click="checkout()" ng-disabled="!order.length">Checkout</span>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal checkout -->
    <div class="modal fade" id="modal-checkout" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ລາຍການຂາຍທັງໝົດ</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Total: {{getTotal() | currency:"KIP ":0}}</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="add_product">ເພີ່ມສິນຄ້າ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ກັບຄືນ</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#openModal').click(function() {
            $('#modal-checkout').modal('show');
        });

        /*$("#myTab a").click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });*/

        /*$('.productcode').on('change', function(e) {

            var product_code = $("input[name='productcode[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            $.ajax({
                method: "get",
                url: "data/barcodeApi.php",
                data: {
                    product_code: product_code
                },
            })
        });*/
    });
</script>