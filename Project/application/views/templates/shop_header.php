<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--Less styles -->
	<!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

	<!-- Bootstrap style -->
	<link id="callCss" rel="stylesheet" href="<?= base_url('assets/'); ?>themes/bootshop/bootstrap.min.css" media="screen" />
	<link href="<?= base_url('assets/'); ?>themes/css/base.css" rel="stylesheet" media="screen" />
	<!-- Bootstrap style responsive -->
	<link href="<?= base_url('assets/'); ?>themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/'); ?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->
	<link href="<?= base_url('assets/'); ?>themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="<?= base_url('assets/'); ?>themes/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>themes/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>themes/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>themes/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/'); ?>themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
</head>

<body>
	<div id="header">
		<div class="container">
			<div id="welcomeLine" class="row">
				<div class="span6">Welcome!<strong> <?= ($this->session->userdata('email')); ?></strong></div>
				<div class="span6">
					<div class="pull-right">
						<!-- <a href="product_summary.html"><span class="">Fr</span></a>
		<a href="product_summary.html"><span class="">Es</span></a>
		<span class="btn btn-mini">En</span>
		<a href="product_summary.html"><span>&pound;</span></a> -->
						<span class="btn btn-mini">$155.00</span>
						<!-- <a href="product_summary.html"><span class="">$</span></a> -->
						<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a>
					</div>
				</div>
			</div>
			<!-- Navbar ================================================== -->
			<div id="logoArea" class="navbar">
				<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-inner">
					<a class="brand" href="index.html"><img src="<?= base_url('assets/'); ?>themes/images/logo.png" alt="Bootsshop" /></a>
					<form class="form-inline navbar-search" method="post" action="products.html">
						<input id="srchFld" class="srchTxt" type="text" />
						<select class="srchTxt">
							<option>All</option>
							<option>CLOTHES </option>
							<option>FOOD AND BEVERAGES </option>
							<option>HEALTH & BEAUTY </option>
							<option>SPORTS & LEISURE </option>
							<option>BOOKS & ENTERTAINMENTS </option>
						</select>
						<button type="submit" id="submitButton" class="btn btn-primary">Go</button>
					</form>
					<ul id="topMenu" class="nav pull-right">
						<li class=""><a href="<?= base_url('produk/semuaproduk'); ?>">Products</a></li>
						<li class=""><a href="normal.html">Pemesanan</a></li>
						<li class=""><a href="contact.html">Contact</a></li>
						<?php if ($this->session->userdata('email') == null) : ?>
							<li class="">
								<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
								<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3>Login Block</h3>
									</div>
									<div class="modal-body">
										<form class="user" method="POST" action="<?= base_url('auth/login'); ?>">
											<div class="form-group">
												<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
												<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
												<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>

											<button type="submit" class="btn btn-success"> Login</button>
											<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>

										</form>

										<a class="small" href="forgot-password.html">Forgot Password?</a>
										<a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>

									</div>
								</div>

							<?php else : ?>
								<a href="#login" role="button" data-toggle="modal" data-target="#logoutModal" style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>
								<!-- <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3>Logout Block</h3>
									</div>
									<div class="modal-body">
										<form class="user" method="POST" action="<?= base_url('auth/logout'); ?>">


											<button type="submit" class="btn btn-success"> Logout</button>
											<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>

										</form>


									</div>
								</div> -->
							<?php endif; ?>


							</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End====================================================================== -->