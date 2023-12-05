<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
   <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
   <meta name="author" content="elemis">
   <title>Pioniir - Creator Homebase</title>
   <link rel="shortcut icon" href="<?= base_url('') ?>assets/front/img/pioniir.png">
   <link rel="stylesheet" href="<?= base_url('') ?>assets/front/css/plugins.css">
   <link rel="stylesheet" href="<?= base_url('') ?>assets/front/css/style.css">
   <link rel="stylesheet" href="<?= base_url('') ?>assets/front/css/colors/aqua.css">
   <style>
   .language-select .dropdown-menu {
      left: -50% !important;
   }
   </style>
</head>

<body>
   <div class="content-wrapper">
      <header class="wrapper bg-gray">
         <nav class="navbar navbar-expand-lg fancy navbar-light navbar-bg-light caret-none">
            <div class="container">
               <div class="navbar-collapse-wrapper bg-white d-flex flex-row flex-nowrap w-100 justify-content-between align-items-center py-sm-3">
                  <div class="navbar-brand w-100">
                     <a href="<?= base_url() ?>">
                        <img class="w-15" src="<?= base_url('') ?>assets/front/img/pioniirdark.png" alt="" />
                     </a>
                  </div>
                  <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start"></div>
                  <!-- /.navbar-collapse -->
                  <div class="navbar-other w-100 d-flex ms-auto">
                     <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('explore') ?>"><i class="uil uil-search"></i></a></li>
                        <?php if (session()->has('loginUser') && session()->has('userName') && session()->has('userFullName') && session()->has('userEmail')) : ?>
                        <li class="nav-item dropdown language-select">
                           <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img class="avatar w-8" src="<?= base_url('') ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                           </a>
                           <ul class="dropdown-menu">
                              <?php if(count($creator) == 1) : ?>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('dashboard')?>">Dashboard</a></li>
                              <?php else : ?>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('register/creator') ?>">Jadi Creator</a>
                              </li>
                              <?php endif; ?>
                              <li class="nav-item"><a class="dropdown-item" href="#">Profile</a></li>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('logout')?>">Logout</a></li>
                           </ul>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                           <a href="<?= base_url('login') ?>" class=" btn btn-sm btn-outline-navy rounded-pill">Get Started</a>
                        </li>
                        <?php endif;?>
                     </ul>
                     <!-- /.navbar-nav -->
                  </div>
                  <!-- /.navbar-other -->
               </div>
               <!-- /.navbar-collapse-wrapper -->
            </div>
            <!-- /.container -->
         </nav>
         <!-- /.navbar -->
      </header>
      <!-- /header -->
      <section class="wrapper bg-gray pb-12">
         <?= $this->renderSection('content') ?>
         <!-- /section -->
      </section>
   </div>
   <!-- /.content-wrapper -->
   <footer class="bg-dark text-inverse">
      <div class="container py-13 py-md-15">
         <div class="row gy-6 gy-lg-0">
            <div class="col-lg-4">
               <div class="widget">
                  <img class="mb-4" src="<?= base_url('') ?>assets/front/img/logo-light.png" srcset="<?= base_url('') ?>assets/front/img/logo-light@2x.png 2x" alt="" />
                  <p class="mb-4">© 2023 Sandbox. All rights reserved.</p>
                  <nav class="nav social social-white">
                     <a href="#"><i class="uil uil-twitter"></i></a>
                     <a href="#"><i class="uil uil-facebook-f"></i></a>
                     <a href="#"><i class="uil uil-dribbble"></i></a>
                     <a href="#"><i class="uil uil-instagram"></i></a>
                     <a href="#"><i class="uil uil-youtube"></i></a>
                  </nav>
                  <!-- /.social -->
               </div>
               <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-2 offset-lg-2">
               <div class="widget">
                  <h4 class="widget-title mb-3 text-white">Need Help?</h4>
                  <ul class="list-unstyled mb-0">
                     <li><a href="#">Support</a></li>
                     <li><a href="#">Get Started</a></li>
                     <li><a href="#">Terms of Use</a></li>
                     <li><a href="#">Privacy Policy</a></li>
                  </ul>
               </div>
               <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-2">
               <div class="widget">
                  <h4 class="widget-title mb-3 text-white">Learn More</h4>
                  <ul class="list-unstyled mb-0">
                     <li><a href="#">About Us</a></li>
                     <li><a href="#">Our Story</a></li>
                     <li><a href="#">Projects</a></li>
                     <li><a href="#">Pricing</a></li>
                     <li><a href="#">Features</a></li>
                  </ul>
               </div>
               <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-2">
               <div class="widget">
                  <h4 class="widget-title mb-3 text-white">Get in Touch</h4>
                  <address>Moonshine St. 14/05 Light City, London, United Kingdom</address>
                  <a href="mailto:first.last@email.com">info@email.com</a><br /> 00 (123) 456 78 90
               </div>
               <!-- /.widget -->
            </div>
            <!-- /column -->
         </div>
         <!--/.row -->
      </div>
      <!-- /.container -->
   </footer>
   <script src="<?= base_url('') ?>assets/front/js/plugins.js"></script>
   <script src="<?= base_url('') ?>assets/front/js/theme.js"></script>
</body>

</html>