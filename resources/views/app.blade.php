<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from laravel.spruko.com/xino/ltr/horizontal by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Feb 2024 18:28:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Tihani Cetak">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="cryptocurrency, dashboard, admin, crypto, ico, bootstrap admin template, admin template, bootstrap dashboard template, crypto dashboard, cryptocurrency dashboard, ico dashboard, crypto admin, dashboard cryptocurrency, cryptocurrency trading dashboard, crypto dashboard template "/>

		<!-- Title -->
        <title> Tihani Cetak </title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('assets/img/tihani.png') }}" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{ asset('assets/plugins/icons/icons.css') }}" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

		<!--  Custom Scroll bar-->
		<link href="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet"/>

		<!--- Animations css-->
		<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">


		<!-- Internal Chart-Morris css-->
        <link href="{{ asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">

		<!-- Internal Nice-select css  -->
		<link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet"/>

		<!-- Internal News-Ticker css-->
		<link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

		<!-- Jquery-countdown css-->
		<link href="{{ asset('assets/plugins/jquery-countdown/countdown.css') }}" rel="stylesheet">

		<!-- Internal News-Ticker css-->
        <link href="{{ asset('assets/plugins/newsticker/jquery.jConveyorTicker.css') }}" rel="stylesheet" />


		<!-- style css-->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

		<!-- skin css-->
		<link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet">

		<!-- dark-theme css-->
		<link href="{{ asset('assets/css/style-dark.css') }}" rel="stylesheet">

        <!-- Select 2 css-->
        <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">


		<!-- Switcher css -->
		<link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/switcher/demo.css') }}">

	</head>
	<body class="main-body app sidebar-mini Light-mode">

		<!-- Loader -->
		<div id="global-loader" class="light-loader">
			<img src="{{ asset('assets/img/loaders/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Start Switcher -->
		{{-- <div class="switcher-wrapper ">
			<div class="demo_changer">
				<div class="demo-icon bg_dark"><i class="fa fa-cog fa-spin  text_primary"></i></div>
				<div class="form_holder sidebar-right1">
					<div class="row">
                        <div class="swichermainleft border-top  mt-2 text-center">
                            <div class="p-3">
                                <a href="https://laravel.spruko.com/xino" class="btn btn-primary btn-block mt-0">View Demo</a>
                                <a href="https://themeforest.net/item/xino-laravel-crypto-admin-dashboard-template/30694936" class="btn btn-danger btn-block">Buy Now</a>
                                <a href="https://themeforest.net/user/sprukosoft/portfolio" class="btn btn-info btn-block">Our Portfolio</a>
                            </div>
                        </div>
						<div class="predefined_styles">
							<div class="swichermainleft">
								<h4>Versions</h4>
								<div class="pl-3 pr-3">
									<a class="btn btn-success btn-block" href="index.html">
										LTR
									</a>
									<a class="btn btn-warning btn-block" href="https://laravel.spruko.com/xino/rtl/index">
										RTL
									</a>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Navigation Style</h4>
								<div class="pl-3 pr-3">
									<a class="btn btn-primary btn-block" href="horizontal.html">
										Horizontal
									</a>
									<a class="btn btn-secondary btn-block" href="index.html">
										Left-menu
									</a>
								</div>
							</div>
                            <div class="swichermainleft">
								<h4>Theme Styles</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Light Theme</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch2" class="onoffswitch2-checkbox">
											<label for="myonoffswitch2" class="onoffswitch2-label"></label>
										</div>
									</div>
                                    <div class="switch-toggle d-flex">
										<span class="mr-auto">Dark Theme</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch" class="onoffswitch2-checkbox">
											<label for="myonoffswitch" class="onoffswitch2-label"></label>
										</div>
									</div>
                                </div>
                            </div>
							<div class="swichermainleft">
								<h4>Horizontal Menu Styles</h4>
								<div class="switch_section">
									<div class="switch-toggle horizontal-light-switcher d-flex">
										<span class="mr-auto">Horizontal Light</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch18" class="onoffswitch2-checkbox">
											<label for="myonoffswitch18" class="onoffswitch2-label"></label>
										</div>
									</div>
                                    <div class="switch-toggle horizontal-dark-switcher d-flex">
										<span class="mr-auto">Horizontal Light</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch16" class="onoffswitch2-checkbox">
											<label for="myonoffswitch16" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Horizontal Color</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch3" class="onoffswitch2-checkbox">
											<label for="myonoffswitch3" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle horizontal-light-switcher d-flex">
										<span class="mr-auto">Horizontal Dark</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch4" class="onoffswitch2-checkbox">
											<label for="myonoffswitch4" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Horizontal Gradient Color</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch5" class="onoffswitch2-checkbox">
											<label for="myonoffswitch5" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex horizontal-light-switcher">
										<span class="mr-auto">Horizontal theme</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch22" class="onoffswitch2-checkbox">
											<label for="myonoffswitch22" class="onoffswitch2-label"></label>
										</div>
									</div>
                                    <div class="switch-toggle d-flex  horizontal-dark-switcher">
										<span class="mr-auto">Horizontal theme</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch23" class="onoffswitch2-checkbox">
											<label for="myonoffswitch23" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Reset Horizontal Styles</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch8" class="onoffswitch2-checkbox">
											<label for="myonoffswitch8" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Switcher -->

		<!-- Page -->
		<div class="page">

			<!-- main-header -->
		{{-- <div class="main-header nav nav-item hor-header">
			<div class="container">
				<div class="main-header-left ">
					<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
					<a class="header-brand" href="index.html">
						<img src="assets/img/brand/logo-theme-dark.png" class="desktop-dark">
						<img src="assets/img/brand/logo.png" class="desktop-logo">
					</a>

				</div>
				<div class="main-header-center">
					<div class="responsive-logo">
                        <img src="assets/img/brand/logo.png" class="mobile-logo" alt="logo">
                        <img src="assets/img/brand/logo-theme-dark.png" class="dark-mobile-logo" alt="logo">
					</div>
				</div>
				<div class="main-header-right">
					<div class="nav nav-item  navbar-nav-right ml-auto">
						<form class="navbar-form nav-item my-auto d-lg-none" role="search">
							<div class="input-group nav-item my-auto">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button type="reset" class="btn btn-default">
										<i class="ti-close"></i>
									</button>
									<button type="submit" class="btn btn-default nav-link">
										<i class="ti-search"></i>
									</button>
								</span>
							</div>
						</form>
						<div class="nav-item full-screen fullscreen-button">
							<a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
						</div>
						<div class="dropdown  nav-item main-header-message ">
							<a class="new nav-link" href="#" ><i class="ti-email"></i><span class="pulse-danger"></span></a>
							<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp ">
								<div class="main-dropdown-header  d-sm-none">
									<a class="main-header-arrow" href="#"><i class="icon ion-md-arrow-back"></i></a>
								</div>
								<div class="menu-header-content text-left d-flex">
									<div class="">
										<h6 class="menu-header-title text-white mb-0">5 new Messages</h6>
									</div>
									<div class="my-auto ml-auto">
										<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
									</div>
								</div>
								<div class="main-message-list chat-scroll">
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="  drop-img  cover-image  " data-image-src="assets/img/faces/3.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>

										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Paul Molive</h5>
												<p class="time mb-0 text-right ml-auto float-right">10 min ago</p>
											</div>
											<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/2.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Sahar Dary</h5>
												<p class="time mb-0 text-right ml-auto float-right">13 min ago</p>
											</div>
											<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/9.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Khadija Mehr</h5>
												<p class="time mb-0 text-right ml-auto float-right">20 min ago</p>
											</div>
											<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/12.jpg">
											<span class="avatar-status bg-danger"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Barney Cull</h5>
												<p class="time mb-0 text-right ml-auto float-right">30 min ago</p>
											</div>
											<p class="mb-0 desc">Here are some products ...</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/5.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Petey Cruiser</h5>
												<p class="time mb-0 text-right ml-auto float-right">35 min ago</p>
											</div>
											<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
										</div>
									</a>
								</div>
								<div class="text-center dropdown-footer">
									<a href="text-center.html">VIEW ALL</a>
								</div>
							</div>
						</div>
						<div class="dropdown nav-item main-header-notification">
							<a class="new nav-link " href="#"><i class="ti-bell animated bell-animations"></i><span class=" pulse"></span></a>
							<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
								<div class="menu-header-content text-left d-flex">
									<div class="">
										<h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
									</div>
									<div class="my-auto ml-auto">
										<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
									</div>
								</div>
								<div class="main-notification-list Notification-scroll">
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-success-transparent">
											<i class="la la-shopping-basket text-success"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">New Order Received</h5>
											<div class="notification-subtext">1 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-danger-transparent">
											<i class="la la-user-check text-danger"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">22 verified registrations</h5>
											<div class="notification-subtext">2 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-primary-transparent">
											<i class="la la-check-circle text-primary"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">Project has been approved</h5>
											<div class="notification-subtext">4 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-pink-transparent">
											<i class="la la-file-alt text-pink"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">New files available</h5>
											<div class="notification-subtext">10 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-warning-transparent">
											<i class="la la-envelope-open text-warning"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">New review received</h5>
											<div class="notification-subtext">1 day ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3" href="#">
										<div class="notifyimg bg-purple-transparent">
											<i class="la la-gem text-purple"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">Updates Available</h5>
											<div class="notification-subtext">2 days ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
								</div>
								<div class="dropdown-footer">
									<a href="#">VIEW ALL</a>
								</div>
							</div>
						</div>
						<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
							aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon fe fe-more-vertical "></span>
						</button>
						<div class="dropdown main-profile-menu nav nav-item nav-link">
							<a class="profile-user" href="#"><img alt="" src="assets/img/faces/5.jpg"></a>
							<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
								<div class="main-header-profile header-img">
									<div class="main-img-user"><img alt="" src="assets/img/faces/5.jpg"></div>
									<h6>Elizabeth Jane</h6><span>Premium Member</span>
								</div>
								<a class="dropdown-item" href="#"><i class="far fa-user"></i> My Profile</a>
								<a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit Profile</a>
								<a class="dropdown-item" href="#"><i class="far fa-clock"></i> Activity Logs</a>
								<a class="dropdown-item" href="#"><i class="fas fa-sliders-h"></i> Account Settings</a>
								<a class="dropdown-item" href="page-signin.html"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
							</div>
						</div>
						<div class="dropdown main-header-message right-toggle">
							<a class="nav-link " data-toggle="sidebar-right" data-target=".sidebar-right">
								<i class="ti-menu tx-20 bg-transparent"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- /main-header -->

			<!-- mobile-header -->
		<div class="responsive main-header">
			<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark d-sm-none ">
				<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
					<div class="d-flex order-lg-2 ml-auto">
						<form class="navbar-form nav-item my-auto d-lg-none" role="search">
							<div class="input-group nav-item my-auto">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button type="reset" class="btn btn-default">
										<i class="ti-close"></i>
									</button>
									<button type="submit" class="btn btn-default nav-link">
										<i class="ti-search"></i>
									</button>
								</span>
							</div>
						</form>
						<div class="d-md-flex">
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
							</div>
						</div>
						<div class="dropdown  nav-item main-header-message header-contact">
							<a class="new nav-link" href="#" ><i class="ti-email"></i><span class=" pulse-danger"></span></a>
							<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
								<div class="main-dropdown-header d-sm-none">
									<a class="main-header-arrow" href="#"><i class="icon ion-md-arrow-back"></i></a>
								</div>
								<div class="menu-header-content text-left d-flex">
									<div class="">
										<h6 class="menu-header-title text-white mb-0">5 new Messages</h6>
									</div>
									<div class="my-auto ml-auto">
										<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
									</div>
								</div>
								<div class="main-message-list text-scroll">
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="  drop-img  cover-image  " data-image-src="assets/img/faces/3.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>

										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Paul Molive</h5>
												<p class="time mb-0 text-right ml-auto float-right">10 min ago</p>
											</div>
											<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/2.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Sahar Dary</h5>
												<p class="time mb-0 text-right ml-auto float-right">13 min ago</p>
											</div>
											<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/9.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Khadija Mehr</h5>
												<p class="time mb-0 text-right ml-auto float-right">20 min ago</p>
											</div>
											<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/12.jpg">
											<span class="avatar-status bg-danger"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Barney Cull</h5>
												<p class="time mb-0 text-right ml-auto float-right">30 min ago</p>
											</div>
											<p class="mb-0 desc">Here are some products ...</p>
										</div>
									</a>
									<a href="#" class="p-3 d-flex border-bottom">
										<div class="drop-img cover-image" data-image-src="assets/img/faces/5.jpg">
											<span class="avatar-status bg-teal"></span>
										</div>
										<div class="wd-90p">
											<div class="d-flex">
												<h5 class="mb-1 name">Petey Cruiser</h5>
												<p class="time mb-0 text-right ml-auto float-right">35 min ago</p>
											</div>
											<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
										</div>
									</a>
								</div>
								<div class="text-center dropdown-footer">
									<a href="text-center.html">VIEW ALL</a>
								</div>
							</div>
						</div>
						<div class="dropdown nav-item main-header-notification">
							<a class="new nav-link" href="#"><i class="ti-bell "></i><span class=" pulse"></span></a>
							<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
								<div class="menu-header-content text-left d-flex">
									<div class="">
										<h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
									</div>
									<div class="my-auto ml-auto">
										<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
									</div>
								</div>
								<div class="main-notification-list notify-scroll">
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-success-transparent">
											<i class="la la-shopping-basket text-success"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">New Order Received</h5>
											<div class="notification-subtext">1 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-danger-transparent">
											<i class="la la-user-check text-danger"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">22 verified registrations</h5>
											<div class="notification-subtext">2 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-primary-transparent">
											<i class="la la-check-circle text-primary"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">Project has been approved</h5>
											<div class="notification-subtext">4 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-pink-transparent">
											<i class="la la-file-alt text-pink"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">New files available</h5>
											<div class="notification-subtext">10 hour ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3 border-bottom" href="#">
										<div class="notifyimg bg-warning-transparent">
											<i class="la la-envelope-open text-warning"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">New review received</h5>
											<div class="notification-subtext">1 day ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
									<a class="d-flex p-3" href="#">
										<div class="notifyimg bg-purple-transparent">
											<i class="la la-gem text-purple"></i>
										</div>
										<div class="ml-3">
											<h5 class="notification-label mb-1">Updates Available</h5>
											<div class="notification-subtext">2 days ago</div>
										</div>
										<div class="ml-auto" >
											<i class="las la-angle-right text-right text-muted"></i>
										</div>
									</a>
								</div>
								<div class="dropdown-footer">
									<a href="#">VIEW ALL</a>
								</div>
							</div>
						</div>
						<div class="dropdown main-profile-menu nav nav-item nav-link">
							<a class="profile-user" href="#"><img alt="" src="assets/img/faces/5.jpg"></a>
							<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
								<div class="main-header-profile header-img">
									<div class="main-img-user"><img alt="" src="assets/img/faces/5.jpg"></div>
									<h6>Elizabeth Jane</h6><span>Premium Member</span>
								</div>
								<a class="dropdown-item" href="#"><i class="far fa-user"></i> My Profile</a>
								<a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit Profile</a>
								<a class="dropdown-item" href="#"><i class="far fa-clock"></i> Activity Logs</a>
								<a class="dropdown-item" href="#"><i class="fas fa-sliders-h"></i> Account Settings</a>
								<a class="dropdown-item" href="page-signin.html"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
							</div>
						</div>
						<div class="dropdown main-header-message right-toggle">
							<a class="nav-link " data-toggle="sidebar-right" data-target=".sidebar-right">
								<i class="ti-menu tx-20 bg-transparent"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- mobile-header -->

			<!--Horizontal-main -->
		<div class="sticky">
			<div class="horizontal-main hor-menu clearfix side-header">
				<div class="horizontal-mainwrapper container clearfix">
					<!--Nav-->
					<nav class="horizontalMenu clearfix d-flex">
						<div class="main-header-left ">
							<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
							<a class="header-brand" href="index.html">
								<img src="{{ asset('assets/img/tihani.png') }}" class="desktop-dark">
								<div class="d-flex"><img src="{{ asset('assets/img/tihani.png') }}" class="desktop-logo"> <span class="text-white mx-2 text" style="font-size: 26px;">Tihani Cetak</span></div>
							</a>

						</div>
						<ul class="horizontalMenu-list">
							<li aria-haspopup="true"><a href="index.html" class=""><i class="ti-home menu-icon"></i> Home</a></li>
							<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-bar-chart-alt"></i> MES </a>
								<div class="horizontal-megamenu clearfix">
									<div class="container-fluid">
										<div class="mega-menubg hor-mega-menu">
											<div class="row">
												<div class="col-lg-2 col-md-12 col-xs-12 link-list">
                                                       <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Management</div>
													<ul>
														{{-- <li><h3 class="fs-14 font-weight-bold mb-1 mt-2">Elements</h3></li> --}}
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Sales Order</a></li>

													</ul>
												</div>

												<div class="col-lg-5 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Laporan / Rekod Proses</div>
                                                    <ul>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Senarai Semak Pencetakan  <br> Digita</a></li>
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Senarai Semak Pra Cetak</a></li>
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Rekod serahan plate cetak <br> serta Sample</a></li>
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Laporan Proses Pencetakan </a></li>

                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Laporan Proses Lipat</a></li>
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Laporan Proses Penjilidan  <br> (Perfect Bind)</a></li>
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Laporan Proses Penjilidan  <br> (Saddle stitch)</a></li>
                                                                <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Laporan Proses 3 Knife</a></li>


                                                            </div>
                                                        </div>


													</ul>
												</div>
												<div class="col-lg-5 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Laporan Pemeriksaan Kualiti</div>
													<ul>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>CTP</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>POD</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Plate Cetak</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Proses Pencetakan</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Proses Lipat</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Proses Penjilidan  <br> (Perfect Bind)</a></li>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-xs-12 link-list">
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Prosess Penjilidan  <br> (Saddle Stitch)</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Proses Three Knife</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Proses Pembungkusan</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Pengumpulan/ Gathering</a></li>
                                                            <li aria-haspopup="true"><a href="treeview.html" class="slide-item"><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon>Pemotongan Kulit Buku/ Teks</a></li>

                                                        </div>
                                                    </div>


													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-layers"></i> Production</a>
                                <div class="horizontal-megamenu clearfix">
									<div class="container-fluid">
										<div class="mega-menubg hor-mega-menu">
											<div class="row">
												<div class="col-lg-5 col-md-12 col-xs-12 link-list">
                                                       <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Jobsheet</div>
													<ul>
														{{-- <li><h3 class="fs-14 font-weight-bold mb-1 mt-2">Elements</h3></li> --}}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12 col-xs-12 link-list">
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Digital Printing</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Cover  & End Paper</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Textg</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Mesin Lipat</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Staple Bind</a></li>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-xs-12 link-list">
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Mesin Perfect Bind</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Mesin 3Knife</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Borang Serahan Kerja  (Kulit Buku /Cover)</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Borang Serahan Kerja  (Teks)</a></li>


                                                    </div>

													</ul>
												</div>

												<div class="col-lg-2 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Production</div>
                                                    <ul>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Production Scheduling</a></li>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Printing Process</a></li>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Call for assistance</a></li>



													</ul>
												</div>
												<div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Dashboard</div>
													<ul>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Machine Dashboard</a></li>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Shopfloor</a></li>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> OEE</a></li>
                                                        <li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Production Report</a></li>




													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="ti-write"></i> WMS </a>
                                <div class="horizontal-megamenu clearfix">
									<div class="container-fluid">
										<div class="mega-menubg hor-mega-menu">
											<div class="row">
												<div class="col-lg-5 col-md-12 col-xs-12 link-list">
                                                       <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Jobsheet</div>
													<ul>
														{{-- <li><h3 class="fs-14 font-weight-bold mb-1 mt-2">Elements</h3></li> --}}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12 col-xs-12 link-list">
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Good Receiving</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Material Request</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Manage Transfer</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Stock In</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Stock Transfer</a></li>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-xs-12 link-list">
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Stock Transfer (Location)</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Laporan Pemeriksaan <br> Akhir, Pembungkusan & <br> Penghantaran ke Stor</a></li>
														<li aria-haspopup="true" ><a href="alerts.html"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Pemeriksaan Penghantaran</a></li>


                                                    </div>

													</ul>
												</div>

												<div class="col-lg-2 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Dashboard</div>
                                                    <ul>
                                                        <li aria-haspopup="true" ><a href="{{route('invertory_ShopFloor.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Inventory Shopfloor</a></li>
													</ul>
												</div>
												<div class="col-lg-3 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Report</div>
													<ul>
                                                        <li aria-haspopup="true" ><a href="{{route('StockCard_report.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Stock Card Report</a></li>
                                                        <li aria-haspopup="true" ><a href="{{route('Invertory_report.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Inventory Report -  By Location</a></li>
                                                        <li aria-haspopup="true" ><a href="{{route('Sub_monitring_report.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Subcon Monitoring Report</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="icon ion-ios-settings"></i> Setting </a>
                                <div class="horizontal-megamenu clearfix">
									<div class="container-fluid">
										<div class="mega-menubg hor-mega-menu">
											<div class="row">
												<div class="col-lg-4 col-md-12 col-xs-12 link-list">
                                                       <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Administration</div>
                                                       <ul>
                                                        <li aria-haspopup="true" ><a href="{{route('role.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Roles</a></li>
                                                        <li aria-haspopup="true" ><a href="{{route('department.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Department</a></li>
                                                        <li aria-haspopup="true" ><a href="{{route('desgination.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Designation</a></li>
                                                        <li aria-haspopup="true" ><a href="{{route('user.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Users</a></li>
													    </ul>


												</div>

												<div class="col-lg-4 col-md-12 col-xs-12 link-list">
                                                    <div class="bg-black-9 text-center p-1" style="color: white; border-radius:5px;">Database</div>
                                                    <ul>
														{{-- <li><h3 class="fs-14 font-weight-bold mb-1 mt-2">Elements</h3></li> --}}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12 col-xs-12 link-list">
														<li aria-haspopup="true" ><a href="{{route('Product.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Product</a></li>
														<li aria-haspopup="true" ><a href="{{ route('uom') }}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> UOM</a></li>
														<li aria-haspopup="true" ><a href="{{route('UOMConversion.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> UOM Conversion </a></li>
														<li aria-haspopup="true" ><a href="{{route('machine.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Machine</a></li>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-xs-12 link-list">
														<li aria-haspopup="true" ><a href="{{route('area_level.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Area - Level</a></li>
														<li aria-haspopup="true" ><a href="{{route('area_Shelf.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Area - Shelf</a></li>
														<li aria-haspopup="true" ><a href="{{route('area.index')}}"  class="slide-item" ><iconify-icon icon="ph:arrow-square-right" width="17"  style="color: #a41843"></iconify-icon> Area</a></li>


                                                    </div>

													</ul>
												</div>

											</div>
										</div>
									</div>
								</div>
							</li>

							</li>

						</ul>
						<div class="main-header-right">
							<div class="nav nav-item  navbar-nav-right ml-auto">
								<form class="navbar-form nav-item my-auto d-lg-none" role="search">
									<div class="input-group nav-item my-auto">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="ti-close"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link">
												<i class="ti-search"></i>
											</button>
										</span>
									</div>
								</form>
								{{-- <div class="nav-item full-screen fullscreen-button">
									<a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
								</div> --}}
								{{-- <div class="dropdown  nav-item main-header-message ">
									<a class="new nav-link" href="#" ><i class="ti-email"></i><span class="pulse-danger"></span></a>
									<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp ">
										<div class="main-dropdown-header  d-sm-none">
											<a class="main-header-arrow" href="#"><i class="icon ion-md-arrow-back"></i></a>
										</div>
										<div class="menu-header-content text-left d-flex">
											<div class="">
												<h6 class="menu-header-title text-white mb-0">5 new Messages</h6>
											</div>
											<div class="my-auto ml-auto">
												<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
											</div>
										</div>
										<div class="main-message-list chat-scroll">
											<a href="#" class="p-3 d-flex border-bottom">
												<div class="  drop-img  cover-image  " data-image-src="assets/img/faces/3.jpg">
													<span class="avatar-status bg-teal"></span>
												</div>

												<div class="wd-90p">
													<div class="d-flex">
														<h5 class="mb-1 name">Paul Molive</h5>
														<p class="time mb-0 text-right ml-auto float-right">10 min ago</p>
													</div>
													<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
												</div>
											</a>
											<a href="#" class="p-3 d-flex border-bottom">
												<div class="drop-img cover-image" data-image-src="assets/img/faces/2.jpg">
													<span class="avatar-status bg-teal"></span>
												</div>
												<div class="wd-90p">
													<div class="d-flex">
														<h5 class="mb-1 name">Sahar Dary</h5>
														<p class="time mb-0 text-right ml-auto float-right">13 min ago</p>
													</div>
													<p class="mb-0 desc">All set ! Now, time to get to you now......</p>
												</div>
											</a>
											<a href="#" class="p-3 d-flex border-bottom">
												<div class="drop-img cover-image" data-image-src="assets/img/faces/9.jpg">
													<span class="avatar-status bg-teal"></span>
												</div>
												<div class="wd-90p">
													<div class="d-flex">
														<h5 class="mb-1 name">Khadija Mehr</h5>
														<p class="time mb-0 text-right ml-auto float-right">20 min ago</p>
													</div>
													<p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
												</div>
											</a>
											<a href="#" class="p-3 d-flex border-bottom">
												<div class="drop-img cover-image" data-image-src="assets/img/faces/12.jpg">
													<span class="avatar-status bg-danger"></span>
												</div>
												<div class="wd-90p">
													<div class="d-flex">
														<h5 class="mb-1 name">Barney Cull</h5>
														<p class="time mb-0 text-right ml-auto float-right">30 min ago</p>
													</div>
													<p class="mb-0 desc">Here are some products ...</p>
												</div>
											</a>
											<a href="#" class="p-3 d-flex border-bottom">
												<div class="drop-img cover-image" data-image-src="assets/img/faces/5.jpg">
													<span class="avatar-status bg-teal"></span>
												</div>
												<div class="wd-90p">
													<div class="d-flex">
														<h5 class="mb-1 name">Petey Cruiser</h5>
														<p class="time mb-0 text-right ml-auto float-right">35 min ago</p>
													</div>
													<p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
												</div>
											</a>
										</div>
										<div class="text-center dropdown-footer">
											<a href="text-center.html">VIEW ALL</a>
										</div>
									</div>
								</div> --}}
								<div class="dropdown nav-item main-header-notification">
									<a class="new nav-link " href="#"><i class="ti-bell animated bell-animations"></i><span class=" pulse"></span></a>
									<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
										<div class="menu-header-content text-left d-flex">
											<div class="">
												<h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
											</div>
											<div class="my-auto ml-auto">
												<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
											</div>
										</div>
										<div class="main-notification-list Notification-scroll">
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-success-transparent">
													<i class="la la-shopping-basket text-success"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">New Order Received</h5>
													<div class="notification-subtext">1 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-danger-transparent">
													<i class="la la-user-check text-danger"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">22 verified registrations</h5>
													<div class="notification-subtext">2 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-primary-transparent">
													<i class="la la-check-circle text-primary"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">Project has been approved</h5>
													<div class="notification-subtext">4 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-pink-transparent">
													<i class="la la-file-alt text-pink"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">New files available</h5>
													<div class="notification-subtext">10 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-warning-transparent">
													<i class="la la-envelope-open text-warning"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">New review received</h5>
													<div class="notification-subtext">1 day ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3" href="#">
												<div class="notifyimg bg-purple-transparent">
													<i class="la la-gem text-purple"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">Updates Available</h5>
													<div class="notification-subtext">2 days ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
										</div>
										<div class="dropdown-footer">
											<a href="#">VIEW ALL</a>
										</div>
									</div>
								</div>
								<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical "></span>
								</button>
								<div class="dropdown main-profile-menu nav nav-item nav-link">
									<a class="profile-user" href="#"><img alt="" src="assets/img/faces/5.jpg"></a>
									<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
										<div class="main-header-profile header-img">
											<div class="main-img-user"><img alt="" src="assets/img/faces/5.jpg"></div>
											<h6>Elizabeth Jane</h6><span>Premium Member</span>
										</div>
										<a class="dropdown-item" href="#"><i class="far fa-user"></i> My Profile</a>
										<a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit Profile</a>
										<a class="dropdown-item" href="#"><i class="far fa-clock"></i> Activity Logs</a>
										<a class="dropdown-item" href="#"><i class="fas fa-sliders-h"></i> Account Settings</a>
										<a class="dropdown-item" href="page-signin.html"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
									</div>
								</div>
								{{-- <div class="dropdown main-header-message right-toggle ">
									<a class="nav-link " data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="ti-menu tx-20 bg-transparent"></i>
									</a>
								</div> --}}
							</div>
						</div>
					</nav>
					<!--Nav-->
				</div>
			</div>
		</div>
		<!--Horizontal-main -->

			<!-- main-content opened -->
			<div class="main-content horizontal-content">

				<!-- container -->
				<div class="container">

                    @yield('content')



				</div>
				<!-- Container closed -->

			</div>
			<!-- main-content closed -->

			<!-- Right-sidebar-->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="p-3">
				<a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
			</div>
			<div class="tab-menu-heading border-0 card-header">
				<div class="card-title mb-0">Notifications</div>
				<div class="card-options ml-auto">
					<a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="tabs-menu ">
				<!-- Tabs -->
				<ul class="nav panel-tabs">
					<li class=""><a href="#tab" class="active show" data-toggle="tab">Profile</a></li>
					<li class=""><a href="#tab1" data-toggle="tab" class="">Friends</a></li>
					<li><a href="#tab2" data-toggle="tab" class="">Activity</a></li>
					<li><a href="#tab3" data-toggle="tab" class="">Todo</a></li>
				</ul>
			</div>
			<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
				<div class="tab-content">
					<div class="tab-pane active" id="tab">
						<div class="card-body p-0">
							<div class="header-user text-center mt-4">
								<span class="avatar avatar-xxl brround mx-auto"><img src="assets/img/faces/5.jpg" alt="Profile-img" class="avatar avatar-xxl brround"></span>
								<div class=" text-center font-weight-semibold user mt-3 h6 mb-0">Elizabeth Jane</div>
								<span class="text-muted">App Developer</span>
								<div class="card-body">
									<div class="form-group ">
										<label class="form-label  text-left">Offline/Online</label>
										<select class="form-control mb-4 nice-select " data-placeholder="Choose one">
											<option value="1">Online</option>
											<option value="2">Offline</option>
										</select>
									</div>
									<div class="form-group mt-3">
										<label class="form-label text-left">Website</label>
										<select class="form-control nice-select " data-placeholder="Choose one">
											<option value="1">Spruko.com</option>
											<option value="2">sprukosoft.com</option>
											<option value="3">sprukotechnologies.com</option>
											<option value="4">sprukoinfo.com</option>
											<option value="5">sprukotech.com</option>
										</select>
									</div>
								</div>
							</div>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon fe fe-edit mr-2"></i> Edit Profile
							</a>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon fe fe-user mr-2"></i> Spruko technologies
							</a>
							<a class="dropdown-item border-top" href="#">
								<i class="dropdown-icon  fe fe-unlock mr-2"></i> Add Another Account
							</a>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon fe fe-mail mr-2"></i> Message
							</a>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon fe fe-help-circle mr-2"></i> Need Help?
							</a>
							<div class="card-body border-top">
								<h6>Followers</h6>
								<div class="row mt-4">
									<div class="col-12">
										<div class="followers">
											<a href="#" class="avatar brround avatar-md cover-image m-1" data-image-src="assets/img/faces/3.jpg">
												<span class="avatar-status bg-green"></span>
											</a>
											<a href="#" class="avatar brround avatar-md cover-image m-1" data-image-src="assets/img/faces/6.jpg">
												<span class="avatar-status bg-red"></span>
											</a>
											<a href="#" class="avatar brround avatar-md cover-image m-1" data-image-src="assets/img/faces/3.jpg">
												<span class="avatar-status bg-warning"></span>
											</a>
											<a href="#" class="avatar brround avatar-md cover-image m-1" data-image-src="assets/img/faces/4.jpg">
												<span class="avatar-status bg-green"></span>
											</a>
											<a href="#" class="avatar brround avatar-md cover-image m-1" data-image-src="assets/img/faces/9.jpg">
												<span class="avatar-status bg-warning"></span>
											</a>
											<a href="#" class="avatar brround avatar-md cover-image m-1 follwers">+34</a>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body border-top border-bottom">
								<div class="row">
									<div class="col-4 text-center">
										<a class="" href="#"><i class="dropdown-icon mdi  mdi-message-outline fs-20 m-0 leading-tight"></i></a>
										<div>Inbox</div>
									</div>
									<div class="col-4 text-center">
										<a class="" href="#"><i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight"></i></a>
										<div>Settings</div>
									</div>
									<div class="col-4 text-center">
										<a class="" href="#"><i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight"></i></a>
										<div>Sign out</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab1">
						<div class="chat">
							<div class="contacts_card">
								<div class="input-group mb-0 p-3">
									<input type="text" placeholder="Search..." class="form-control search">
									<div class="input-group-prepend mr-0">
										<span class="input-group-text  search_btn  btn-primary"><i class="fa fa-search text-white"></i></span>
									</div>
								</div>
								<ul class="contacts mb-0">
									<li class="active">
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/12.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Maryam Naz</h5>
												<small class="text-muted">is online</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/2.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class=" online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Sahar Darya</h5>
												<small class="text-muted">left 7 mins ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/5.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Maryam Naz</h5>
												<small class="text-muted">online</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/7.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Yolduz Rafi</h5>
												<small class="text-muted">online</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>02-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/8.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Nargis Hawa</h5>
												<small class="text-muted">30 mins ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>02-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/3.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Khadija Mehr</h5>
												<small class="text-muted">50 mins ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/14.jpg') }}" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Petey Cruiser</h5>
												<small class="text-muted">1hr ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="{{ asset('assets/img/faces/11.jpg') }}" class="rounded-circle user_img" alt="img">
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Khadija Mehr</h5>
												<small class="text-muted">2hr ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab2">
						<div class="list d-flex align-items-center border-bottom p-3 mt-3">
							<div class="">
								<span class="avatar bg-primary brround avatar-md">CH</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>New Websites is Created</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">30 mins ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-3">
							<div class="">
								<span class="avatar bg-danger brround avatar-md">N</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare For the Next Project</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">2 hours ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-3">
							<div class="">
								<span class="avatar bg-info brround avatar-md">S</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Decide the live Discussion Time</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">3 hours ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-3">
							<div class="">
								<span class="avatar bg-warning brround avatar-md">K</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Team Review meeting</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">4 hours ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-3">
							<div class="">
								<span class="avatar bg-success brround avatar-md">R</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">1 days ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center  border-bottom p-3">
							<div class="">
								<span class="avatar bg-pink brround avatar-md">MS</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">1 days ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-3">
							<div class="">
								<span class="avatar bg-purple brround avatar-md">L</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">45 mintues ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-3">
							<div class="">
								<span class="avatar bg-primary brround avatar-md">CH</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>New Websites is Created</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">30 mins ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center p-3">
							<div class="">
								<span class="avatar bg-blue brround avatar-md">U</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">2 days ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab3">
						<div class="mt-3">
							<div class="d-flex p-3">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
									<span class="custom-control-label">Do Even More..</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked="">
									<span class="custom-control-label">Find an idea.</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" checked="">
									<span class="custom-control-label">Hangout with friends</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4">
									<span class="custom-control-label">Do Something else</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox5" value="option5">
									<span class="custom-control-label">Eat healthy, Eat Fresh..</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox6" value="option6" checked="">
									<span class="custom-control-label">Finsh something more..</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox7" value="option7" checked="">
									<span class="custom-control-label">Do something more</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox8" value="option8">
									<span class="custom-control-label">Updated more files</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9">
									<span class="custom-control-label">System updated</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top border-bottom">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10">
									<span class="custom-control-label">Settings Changings...</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="text-center pt-5">
								<a href="#" class="btn btn-primary">Add more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Right-sidebar-closed -->

			<!-- Footer opened -->
			<div class="main-footer ht-40">
				<div class="container-fluid pd-t-0-f ht-100p">

					<span class="text-white">Copyright © 2023 . All rights reserved IIOT FACTORY.</span>
				</div>
			</div>
			<!-- Footer closed -->
		</div>
		<!--end  Page -->

        <!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="la la-chevron-up"></i></a>

		<!-- Jquery js-->
		<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap js-->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Ionicons js-->
		<script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>

		<!-- Moment js -->
		<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

		<!-- P-scroll js -->
		<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

		<!-- Rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
		<script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

		<!-- Custom Scroll bar Js-->
		<script src="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

		<!-- Horizontalmenu js-->
		<script src="{{ asset('assets/plugins/horizontal-menu/horizontal-menu.js') }}"></script>

		<!-- Right-sidebar js -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
		<script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>

		<!-- Sticky js-->
		<script src="{{ asset('assets/js/sticky.js') }}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>


		<!-- Datepicker js -->
        <script src="{{ asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

		<!--Chart bundle min js -->
		<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

		<!-- JQuery sparkline js -->
		<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- Sampledata js -->
		<script src="{{ asset('assets/js/chart.flot.sampledata.js') }}"></script>

		<!-- Perfect-scrollbar js -->
		<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

		<!-- Internal  Flot js-->
		<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
		<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
		<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
		<script src="{{ asset('assets/js/dashboard.sampledata.js') }}"></script>
		<script src="{{ asset('assets/js/chart.flot.sampledata.js') }}"></script>

		<!-- Internal Newsticker js-->
		<script src="{{ asset('assets/plugins/newsticker/jquery.jConveyorTicker.js') }}"></script>
        <script src="{{ asset('assets/js/newsticker.js') }}"></script>

		<!-- Internal Nice-select js-->
		<script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

		<!-- index js -->
		<script src="{{ asset('assets/js/dashboard.js') }}"></script>

        <!-- Select 2 Js-->
        <link rel="stylesheet" href="{{ asset('assets/js/select2.min.js') }}">


        	<!-- Internal Data tables -->
		<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>

		<!-- Internal Datatable js -->
		<script src="{{ asset('assets/js/table-data.js') }}"></script>


		<!-- Custom js-->
		<script src="{{asset('assets/js/custom.js') }}"></script>

		<!-- Switcher js -->
		<script src="{{ asset('assets/switcher/js/switcher.js')}}"></script>

        <!-- Iconify Download Library -->
		<script src="{{ asset('assets/js/iconify-icon.min.js')}}"></script>

	</body>

<!-- Mirrored from laravel.spruko.com/xino/ltr/horizontal by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Feb 2024 18:28:13 GMT -->
</html>
