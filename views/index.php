<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=asset('plugins/bootstrap-4.3.1/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=asset('css/style.css')?>">
    <script type="text/javascript" src="<?=asset('plugins/jquery-3.2.1/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?=asset('plugins/bootstrap-4.3.1/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?=asset('plugins/bootstrap-4.3.1/js/bootstrap.bundle.min.js')?>"></script>
</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-7">
                    <div class="card1 pb-5">
                        <div class="row px-5 justify-content-center mt-4 mb-8 border-line"> <img src="<?=asset('img/logo.png ')?>" style="width: 760px; height:720px;" > </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card2 card border-0 px-4 py-5">
                        <form action="login" method="post" autocomplete="off">
                            <div class="row px-3 mb-4">
                                <h3 style="font-family: 'Phetsarath OT'; text-align: center; color: #1f96f3; font-size:40px; ">ກະລຸນາປ້ອນຂໍ້ມູນເພື່ອເຂົ້າໃຊ້ລະບົບ</h4>
                            </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h5 class="mb-0 text-mb-2" style="font-size:30px;">ຊື່ເຂົ້າໃຊ້</h6>
                                </label>
                                <input class="mb-4" type="text" name="username" placeholder="ປ້ອນຊື່ເຂົ້າໃຊ້" required autocomplete="off">
                            </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h5 class="mb-0 text-mb-2" style="font-size:30px;">ລະຫັດຜ່ານ</h6>
                                </label>
                                <input type="password" name="password" placeholder="ປ້ອນລະຫັດຜ່ານ" required autocomplete="off">
                            </div>
                            <!-- <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">ຈື່ລະຫັດຜ່ານ</label> </div> <a href="#" class="ml-auto mb-0 text-sm">ລືມລະຫັດຜ່ານບໍ?</a>
                            </div> -->
                            <div class="row mb-3 px-3"> <button type="submit"  class="btn btn-primary text-center" style="font-size:30px;"  name="btn_login">ເຂົ້າລະບົບ</button> </div>
                            <!-- <div class="row mb-4 px-3"> <small class="font-weight-bold">ທ່ານໄດ້ລົງທະບຽນແລ້ວບໍ? <a class="text-danger ">ສະໝັກນຳໃຊ້</a></small> </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">ຂໍສະຫງວນລິກະສິດ &copy; ບໍລິສັດເກດມະນີໄອທີ</small>
                    <!-- <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div> -->
                </div>
            </div>
        </div>
    </div>
</body>
<? if(flash('error')){?>
    <script>alert("<?=flash('error')?>")</script>
<? } ?>
</html>