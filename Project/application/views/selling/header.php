<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Alby Poultry &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="<?=base_url('assets/asset/');?>https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/aos.css">

    <link rel="stylesheet" href="<?=base_url('assets/asset/');?>css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="#" class=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <ul class="social-media float-right">
            <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
            </ul>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h2 class="mb-0 site-logo"><a href="index.html" class="text-black mb-0">Alby Poultry<span class="text-primary">.</span> </a></h2>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#products-section" class="nav-link">Products</a></li>
                <li><a href="#about-section" class="nav-link">About Us</a></li>
                <li><a href="#special-section" class="nav-link">Special</a></li>
                <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                <!-- <li><a href="#blog-section" class="nav-link">Blog</a></li> -->
                <li><a href="#contact-section" class="nav-link">Contact</a></li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                           <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile') . $user['image']; ?>">
                       </a>
                       <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <a class="dropdown-item" href="#">
                               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                               My Profile
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                               Logout
                           </a>
                       </div>
                   </li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    <div class="site-blocks-cover overlay" style="background-image: url(<?=base_url('assets/asset/');?>images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      
    </div>  