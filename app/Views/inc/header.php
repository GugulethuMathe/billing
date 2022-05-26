<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="Net 15 Billing System">
	<meta name="author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin template, admin dashboard, bootstrap dashboard template, bootstrap 4 admin template, codeigniter 4 admin panel, template codeigniter bootstrap, php, codeigniter, php framework, web template, html5 template, php code, php html, codeigniter 4, codeigniter mvc">

	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url() ?>/assets/img/brand/favicon.png" type="image/x-icon">

	<!-- Title -->
	<title>Net 15 Billing System</title>

	<!-- Bootstrap css-->
	<link href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Icons css-->
	<link href="<?php echo base_url() ?>/assets/plugins/web-fonts/icons.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/plugins/web-fonts/plugin.css" rel="stylesheet">

	<!-- Style css-->
	<link href="<?php echo base_url() ?>/assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/css/skins.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/css/dark-style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/css/colors/default.css" rel="stylesheet">

	<!-- Color css-->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>/assets/css/colors/color.css">

	<!-- Select2 css-->
	<link href="<?php echo base_url() ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet">

	<!-- Sidemenu css-->
	<link href="<?php echo base_url() ?>/assets/css/sidemenu/sidemenu.css" rel="stylesheet">

	<!-- Switcher css-->
	<link href="<?php echo base_url() ?>/assets/switcher/css/switcher.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/switcher/demo.css" rel="stylesheet">

	<!-- Mutipleselect css-->
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/multipleselect/multiple-select.css">
	<link href="<?php echo base_url() ?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
	
	<script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>


</head>

<body class="main-body leftmenu">
	<div class="page">

		<!-- Sidemenu -->
		<div class="main-sidebar main-sidebar-sticky side-menu">
			<div class="sidemenu-logo">
				<a class="main-logo" href="<?php echo base_url() ?>">
					<img src="<?php echo base_url() ?>/assets/logo.png" class="header-brand-img desktop-logo" alt="logo">
					<img src="<?php echo base_url() ?>/assets/logo.png" class="header-brand-img icon-logo" alt="logo">
					<img src="<?php echo base_url() ?>/assets/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
					<img src="<?php echo base_url() ?>/assets/logo.png" class="header-brand-img icon-logo theme-logo" alt="logo">
				</a>
			</div>
			<?php if( $_SESSION['user_role']=="Administrator"){?>
			<div class="main-sidebar-body">
				<ul class="nav">
					<li class="nav-header"><span class="nav-label"></span></li>
					<li class="nav-header"><span class="nav-label"></span></li>
					<li class="nav-header"><span class="nav-label"></span></li>
					<li class="nav-item">
						<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">User management</span><i class="angle fe fe-chevron-right"></i></a>
						<ul class="nav-sub">
							<li class="nav-sub-item">
								<a class="nav-sub-link" href="<?php echo base_url() ?>/add-user">Add User</a>
							</li>
							<li class="nav-sub-item">
								<a class="nav-sub-link" href="<?php echo base_url() ?>/administrators">Administrators</a>
							</li>
							<li class="nav-sub-item">
								<a class="nav-sub-link" href="<?php echo base_url() ?>/clients">Clients</a>
							</li>
						</ul>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Organisations</span></a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/monthly-report"><span class="shape1"></span><span class="shape2"></span><i class="fa fa-calendar sidemenu-icon"></i><span class="sidemenu-label">Monthly Billing Reports</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/custom-report"><span class="shape1"></span><span class="shape2"></span><i class="fa fa-bar-chart sidemenu-icon"></i><span class="sidemenu-label">Custom Billing Reports</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/incoming-call-rates"><span class="shape1"></span><span class="shape2"></span><i class=" fa fa-money sidemenu-icon"></i><span class="sidemenu-label">Incoming call rates</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/trunk-report"><span class="shape1"></span><span class="shape2"></span><i class=" fa fa-money sidemenu-icon"></i><span class="sidemenu-label">Trunk Reports</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="fa fa-cog sidemenu-icon"></i><span class="sidemenu-label">Configurations</span><i class="angle fe fe-chevron-right"></i></a>
						<ul class="nav-sub">
							<li class="nav-sub-item">
								<a class="nav-sub-link" href="<?php echo base_url() ?>/billing-cycle-configurations">Billing Cycle Configurations</a>
							</li>
							<li class="nav-sub-item">
								<a class="nav-sub-link" href="<?php echo base_url() ?>/ip-configurations">IP Server Configuration</a>
							</li>
						</ul>
					</li>
					
				</ul>
			</div>
			<?php } ?>
			<?php if( $_SESSION['user_role']=="Tenant"){?>
			<div class="main-sidebar-body">
				<ul class="nav">
					<li class="nav-header"><span class="nav-label"></span></li>
					<li class="nav-header"><span class="nav-label"></span></li>
					<li class="nav-header"><span class="nav-label"></span></li>
				
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/monthly-report"><span class="shape1"></span><span class="shape2"></span><i class="fa fa-calendar sidemenu-icon"></i><span class="sidemenu-label">Monthly Billing Reports</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>/custom-report"><span class="shape1"></span><span class="shape2"></span><i class="fa fa-bar-chart sidemenu-icon"></i><span class="sidemenu-label">Custom Billing Reports</span></a>
					</li>
					
					
				</ul>
			</div>
			<?php } ?>
		</div>
		<!-- End Sidemenu -->
		<!-- Main Header-->
		<div class="main-header side-header sticky">
			<div class="container-fluid">

				<div class="main-header-left">
					<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
				</div>
				<div class="main-header-center">
					<div class="responsive-logo">
						<a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>/assets/logo.png" class="mobile-logo" alt="logo"></a>
						<a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>/assets/logo.png" class="mobile-logo-dark" alt="logo"></a>
					</div>
				</div>
				<div class="main-header-right">
					<div class="dropdown d-md-flex full-screen-link">
						<a class="nav-link icon " href="">
							<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
							<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
						</a>
					</div>
					<div class="dropdown main-profile-menu">
						<a class="d-flex" href="">
							<span class="main-img-user"><img alt="avatar" src="<?php echo base_url() ?>/assets/img/users/1.jpg"></span>
						</a>
						<div class="dropdown-menu">
							<div class="header-navheading">
								<h6 class="main-notification-title"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h6>
							</div>
							<?php
							$id = $_SESSION['id'];
							$link = 'view_user?id=';
							$edit_link = 'edit_user?id=';
							?>


							<a class="dropdown-item border-top" href="<?php echo base_url() ?>/<?php echo $link . $id ?>">
								<i class="fe fe-user"></i> My Profile
							</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>/<?php echo $edit_link . $id ?>">
								<i class="fe fe-edit"></i> Edit Profile
							</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>/user/logout">
								<i class="fe fe-power"></i> Sign Out
							</a>
						</div>
					</div>
					<div class="dropdown d-md-flex header-settings">
						<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
							<i class="fe fe-align-right header-icons"></i>
						</a>
					</div>
					<button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
					</button><!-- Navresponsive closed -->
				</div>
			</div>
		</div>
		<!-- End Main Header-->

		<!-- Mobile-header -->
		<div class="mobile-main-header">
			<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
				<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
					<div class="d-flex order-lg-2 ml-auto">
						<div class="dropdown header-search">
							<a class="nav-link icon header-search">
								<i class="fe fe-search header-icons"></i>
							</a>

						</div>

						<div class="dropdown full-screen-link">
							<a class="nav-link icon ">
								<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
								<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
							</a>
						</div>
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="#">
								<span class="main-img-user"><img alt="avatar" src="<?php echo base_url() ?>/assets/img/users/1.jpg"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></h6>
								</div>
								<?php
								$id = $_SESSION['id'];
								$link = 'view_user?id=';
								$edit_link = 'edit_user?id=';
								?>
								<a class="dropdown-item border-top" href="<?php echo base_url() ?>/<?php echo $link . $id ?>">
									<i class="fe fe-user"></i> My Profile
								</a>
								<a class="dropdown-item" href="<?php echo base_url() ?>/<?php echo $edit_link . $id ?>">
									<i class="fe fe-edit"></i> Edit Profile
								</a>
								<a class="dropdown-item" href="<?php echo base_url() ?>/user/logout">
									<i class="fe fe-power"></i> Sign Out
								</a>
							</div>
						</div>
						<div class="dropdown  header-settings">
							<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
								<i class="fe fe-align-right header-icons"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile-header closed -->