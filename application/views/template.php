<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Oppa Studio - Admin</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="icon" href="<?=base_url()?>assets/images/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/fonts/fonts-source-sans-pro.css">

		<!-- Extra Css -->
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
		
		
		<?php if(@$page_js != ''): $this->load->view($page_js); else: @$page_js = ''; endif; ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">
		<header class="main-header">
			<a href="<?=base_url()?>" class="logo">
				<span class="logo-mini"><b>Oppa</b></span>
				<span class="logo-lg">Studio <b>Oppa</b></span>
			</a>

			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
				</div>
			</nav>
		</header>

		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?=base_url()?>assets/images/avatars/admin.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?=@$this->session->name?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
					
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<!-- Tree Navigation -->
					<li class="<?php if (@$activeMenu == 'member') echo 'active';?>">
			        	<a href="<?=base_url()?>member/view">
			        		<i class="fa fa-users"></i> <span>Member</span>
			        	</a>
			        </li>
			        <li class="<?php if (@$activeMenu == 'product') echo 'active';?>">
			        	<a href="<?=base_url()?>product/view">
			        		<i class="fa fa-tags"></i> <span>Products</span>
			        	</a>
			        </li>
			        <li class="<?php if (@$activeMenu == 'promo') echo 'active';?>">
			        	<a href="<?=base_url()?>promo/view">
			        		<i class="fa fa-ticket"></i> <span>Promo</span>
			        	</a>
			        </li>
					<li class="<?php if (@$activeMenu == 'booking') echo 'active';?>">
			        	<a href="#">
			        		<i class="fa fa-book"></i> <span>Booking</span>
			        	</a>
			        </li>
			        <li class="<?php if (@$activeMenu == 'transaksi') echo 'active';?>">
			        	<a href="#">
			        		<i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
			        	</a>
			        </li>
			        <li class="<?php if (@$activeMenu == 'opersional') echo 'active';?>">
			        	<a href="#">
			        		<i class="fa fa-th-list"></i> <span>Operasional</span>
			        	</a>
			        </li>
			        <li class="<?php if (@$activeMenu == 'admin') echo 'active';?>">
			        	<a href="<?=base_url()?>admin/view">
			        		<i class="fa fa-secret-user"></i> <span>Admin</span>
			        	</a>
			        </li>
					<li class="<?php if (@$activeMenu == 'logout') echo 'active';?>">
						<a href="#" onclick="return logoutBtn()">
							<i class="fa fa-power-off"></i> <span>Log Out</span>
						</a>
					</li>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<?php if(@$page_content != ''){
				$this->load->view($page_content); 
			}else{ 
				@$page_content = ''; 
			} ?>
		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
			<strong>Copyright &copy; 2018 Oppa Studio</strong> 
			All rights reserved.
		</footer>

		<div class="control-sidebar-bg"></div></div>
	
		<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
		<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
		<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

		<!-- Extra Plugins -->
        <script src="<?=base_url()?>assets/plugins/datatables.net-bs/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/moment/min/moment.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

        <script type="text/javascript">
        	$(document).ready(function(){
				$('.sidebar-menu').tree();
	            $('#DataTable').DataTable();
	            $('[data-toggle="tooltip"]').tooltip();
	            	        
    			$('#daterangepicker').datepicker({
				    language: "id",
				    format: "yyyy-mm-dd",
				    clearBtn: true,
				    orientation: "bottom left",
				    daysOfWeekHighlighted: "1,2,3,4,5",
				    autoclose: true,
				    todayHighlight: true,
				    todayBtn: "linked",
				});
			});

			function logoutBtn() {
				var txt;
				var r = confirm("Anda yakin ingin logout?");
				if (r == true) {
					document.location = '<?=base_url()?>login/logout';
				} else {
				}
		    }
		</script>
	</body>
</html>
