<?php
$select = new database();
$inventorys = $select->query("SELECT * FROM tbl_inventory");

?>
<nav class="main-header navbar  navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
	<ul class="nav navbar-nav">
		<li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black">
				<span class="hidden-xs text-lowercase">ຜູ້ໃຊ້ລະບົບ: <?= auth('username') ?></span>
			</a>
			<ul class="dropdown-menu">
				<!-- <li class="user-header">
					<p class="text-lowercase">
						<?= auth('username') ?> - <?= auth('role') ?>
						<small class="text-capitalize"><?= auth('fullname') ?></small>
					</p>
				</li> -->
				<li class="user-footer">
					<!-- <div class="pull-left">
						<a href="profile.php" class="btn btn-default btn-flat">Profile</a>
					</div> -->
					<div class="pull-right">
						<a href="<?=url('logout')?>" class="btn btn-default btn-flat" onclick="return confirm('ທ່ານແນ່ໃຈບໍ?')" class="btn btn-danger">ອອກຈາກລະບົບ</a>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<aside class="main-sidebar sidebar-light-white-primary elevation-4" style="background-color:#1565C0; color: white; ">
	<? foreach ($inventorys as $inventory) { ?>
		<a href="<?=url('home')?>" class="brand-link">
			<img src="<?= asset('img/logo.png') ?>" class="brand-image img-circle elevation-3" style="opacity: 1">
			<span class="brand-text font-weight-bold" style="color: white"> <strong><?= $inventory->shop_name ?></strong></span>
		</a>
	<? } ?>
	<div class="sidebar" style="font-size: 20px;">
		<nav class="mt-2">
			<ul id="myTab" class="nav nav-tabs nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item " style="color: white">
					<a href="<?=url('home')?>" class="nav-link " style="color: white">
						<i class="nav-icon fas fa-home"></i>
						<p style="color: white">
							ໜ້າຫຼັກ
							</i>
						</p>
					</a>
				</li>
				<? if(isset($_SESSION['role_auth']) == "Admin" || $_SESSION['roles_auth'] == "AdmHouse" ){ ?>
				<li class="nav-item " style="color: white">
					<a href="#" class="nav-link " style="color: white">
						<i class="nav-icon fas fa-list-alt"></i>
						
						<p style="color: white">
							ສິນຄ້າ
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=url('item')?>" class="nav-link" style="color: white">
								<i class="fas fa-file-archive nav-icon"></i>
								<p style="color: white; font-size:17px;">ລາຍການສິນຄ້າຕ່າງໆ</p>
							</a>
						</li>
					</ul>
				</li>
				<? }  ?>
				<? if(isset($_SESSION['role_auth']) == "Admin" || $_SESSION['roles_auth'] == "AdmHouse"){ ?>
				<li class="nav-item ">
					<a href="#" class="nav-link " style="color: white">
						<i class="nav-icon fas fa-list-alt"></i>
					
						<p style="color: white">
							ຈັດການສິນຄ້າ
							<i class="right fas fa-angle-left"></i>
						</p>
						
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item" style="color: white">
							<a href="<?=url('store')?>" class="nav-link" style="color: white">
								<i class="nav-icon fas fa-store"></i>
								<p style="color: white; font-size:17px;">ນຳສິນຄ້າອອກໜ້າຮ້ານ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('product_remain')?>" class="nav-link" style="color: white">
								<i class="fas fa-list nav-icon"></i>
								<p style="color: white; font: size 17px;">ສິນຄ້າທີ່ຍັງເຫຼືອ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('product_outstock')?>" class="nav-link" style="color: white">
								<i class="fas fa-bell nav-icon"></i>
								<p style="color: white; font-size:17px;">ສິນຄ້າໝົດສະຕ໋ອກ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('product_expired')?>" class="nav-link" style="color: white">
								<i class="fas fa-bell nav-icon"></i>
								<p style="color: white; font-size:17px;">ສີນຄ້າໃກ້ໝົດອາຍຸ ແລະ ໝົດອາຍຸແລ້ວ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('product_return')?>" class="nav-link" style="color: white">
								<i class="fas fa-truck nav-icon"></i>
								<p style="color: white; font-size:17px;">ຄືນສິນຄ້າ</p>
							</a>
						</li>
					</ul>
				</li>
				<? }  ?>
				<? if(isset($_SESSION['role_auth']) == "Admin" && $_SESSION['roles_auth'] == "Admin"){ ?>
				<li class="nav-item">
					<a href="#" class="nav-link" style="color: white">
						<i class="nav-icon fas fa-bookmark"></i>
						<p style="color: white">
							ລາຍລະອຽດອື່ນໆ
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=url('detail_category')?>" class="nav-link" style="color: white">
								<i class="fas fa-object-group nav-icon"></i>
								<p style="color: white; font-size:17px;">ໝວດໝູ່</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('detail_unit')?>" class="nav-link" style="color: white">
								<i class="fas fa-book-reader nav-icon"></i>
								<p style="color: white; font-size:17px;">ຫົວໜ່ວຍສິນຄ້າ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('detail_supplier')?>" class="nav-link" style="color: white">
								<i class="fas fa-sort-numeric-up-alt nav-icon"></i>
								<p style="color: white; font-size:17px;">ຜູ້ສະໜອງ/ຜູ້ຜະລິດ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('detail_salezone')?>" class="nav-link" style="color: white">
								<i class="fas fa-place-of-worship nav-icon"></i>
								<p style="color: white; font-size:17px;">ໂຊນສິນຄ້າ</p>
							</a>
						</li>
					</ul>
				</li>
				<? }  ?>
				<? if(isset($_SESSION['role_auth']) == "Admin" && $_SESSION['roles_auth'] == "Admin"){ ?>
				<li class="nav-item">
					<a href="#" class="nav-link" style="color: white">
						<i class="nav-icon fas fa-chart-line"></i>
						<p style="color: white">
							ລາຍງານຕ່າງໆ
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=url('report/order')?>" class="nav-link" style="color: white">
								<i class="fas fa-newspaper nav-icon"></i>
								<p style="color: white; font-size:17px;">ລາຍງານການຂາຍທັງໝົດ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('report/detail_order')?>" class="nav-link" style="color: white">
								<i class="fas fa-file-invoice nav-icon"></i>
								<p style="color: white; font-size:17px;">ລາຍງານການຂາຍທັງໝົດແບບລະອຽດ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('report/sales')?>" class="nav-link" style="color: white">
								<i class="fas fa-newspaper nav-icon"></i>
								<p style="color: white; font-size:17px;">ລາຍງານການຂາຍຕາມວັນທີ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=url('report/byStaff')?>" class="nav-link" style="color: white">
								<i class="fas fa-people-arrows nav-icon"></i>
								<p style="color: white; font-size:17px;">ລາຍງານການຂາຍຕາມຊື່ພະນັກງານ</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?=url('report/profit') ?>" class="nav-link" style="color: white">
								<i class="fas fa-chart-pie nav-icon"></i>
								<p style="color: white; font-size:17px;">ລາຍງານຜົນກຳໄລ</p>
							</a>
						</li>
					</ul>
				</li>
				<? }  ?>
				<? if(isset($_SESSION['role_auth']) == "Admin" && $_SESSION['roles_auth'] == "Admin"){ ?>
				<li class="nav-item ">
					<a href="<?=url('pos')?>" class="nav-link" style="color: white">
						<i class="nav-icon fas fa-warehouse"></i>
						<p style="color: white">
							ໜ້າຮ້ານ
						</p>
					</a>
				</li>
				<? }  ?>
				<? if(isset($_SESSION['role_auth']) == "Admin" && $_SESSION['roles_auth'] == "Admin"){ ?>
				<li class="nav-item">
					<a href="#" class="nav-link" style="color: white">
						<i class="nav-icon fas fa-tools"></i>
						<p style="color: white">
							ຈັດການການຂາຍ
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						
						<li class="nav-item">
							<a href="staff-info" class="nav-link" style="color: white">
								<i class="fas fa-people-arrows nav-icon"></i>
								<p style="color: white; font-size:17px;">ພະນັກງານ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="inventory" class="nav-link" style="color: white">
								<i class="fas fa-shopping-bag nav-icon"></i>
								<p style="color: white; font-size:17px;">ຂໍ້ມູນຮ້ານ</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="exchange" class="nav-link" style="color: white">
								<i class="fas fa-money-bill-alt nav-icon"></i>
								<p style="color: white; font-size:17px;">ອັດຕາແລກປ່ຽນ</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="barcode-print" class="nav-link" style="color: white">
								<i class="fas fa-barcode nav-icon"></i>
								<p style="color: white; font-size:17px;">ສ້າງ Barcode</p>
							</a>
						</li>


					</ul>
				</li>
				<? }  ?>
				
			</ul>
		</nav>
	</div>
</aside>