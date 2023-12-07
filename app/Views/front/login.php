<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
   <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
   <meta name="author" content="elemis">
   <title>Pioniir - Creator Homebase</title>
   <link rel="shortcut icon" href="<?= base_url() ?>assets/front/img/pioniir.png">
   <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/plugins.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/style.css">
</head>

<body>
   <div class="content-wrapper">
      <!-- /header -->
      <section class="wrapper gradient-6">
         <div class="container pt-15 pb-21 pt-md-16 pb-md-21 text-center">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <h1 class="display-1 mb-3 text-white"><a href="<?= base_url() ?>"><img class="w-10" src="<?= base_url() ?>assets/front/img/pioniir.png" alt=""></a> Sign In</h1>
                  <!-- /nav -->
               </div>
               <!-- /column -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light">
         <div class="container pb-14 pb-md-16">
            <div class="row">
               <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
                  <div class="card">
                     <!-- <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
                        <i class="uil uil-times-circle"></i> A simple danger alert with <a href="#" class="alert-link hover">an example link</a>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div> -->

                     <!--/.modal -->
                     <div class="card-body p-8 p-sm-11 text-center">
                        <h2 class="mb-3 text-start">Welcome Back</h2>
                        <p class="lead mb-6 text-start">Fill your email or username and password to sign in.</p>
                        <form action="<?=base_url('login/auth')?>" method="POST" class="text-start mb-3">
                           <div class="form-floating mb-4">
                              <input type="email" class="form-control" placeholder="Email" id="loginEmail" name="identitas">
                              <label for="loginEmail">Email</label>
                           </div>
                           <div class="form-floating password-field mb-4">
                              <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="password">
                              <span class="password-toggle"><i class="uil uil-eye"></i></span>
                              <label for="loginPassword">Password</label>
                           </div>
                           <button type="submit" class="btn btn-navy rounded-pill btn-login w-100 mb-2">Sign In</button>
                           <a href="<?= $link ?>" class="btn rounded-pill w-100 mb-2 btn-outline-danger"><i class="uil uil-google"></i> &nbsp; Sign In With Gmail</a>
                        </form>
                        <!-- /form -->
                        <p class="mb-1"><a href="#" class="hover link-navy">Forgot Password?</a></p>
                        <p class="mb-0">Don't have an account? <a href="<?= base_url('register') ?>" class="hover link-navy">Sign up</a></p>
                     </div>
                     <!--/.card-body -->
                  </div>
                  <!--/.card -->
               </div>
               <!-- /column -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container -->
      </section>
      <!-- /section -->
   </div>
   <?php if (session()->getFlashdata('error')):?>
   <div class="modal fade modal-popup" id="modal-02" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-sm">
         <div class="modal-content text-center">
            <div class="modal-body">
               <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <div class="row">
                  <div class="col-md-12">
                     <h1 class="fs-100 text-danger"><i class="uil uil-times"></i></h1>
                  </div>
               </div>
               <h3 class="text-danger"><?= session()->getFlashdata('error') ?></h3>
            </div>
         </div>
      </div>
   </div>
   <?php endif;?>
   <!-- /.content-wrapper -->
   <script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
   <script src="<?= base_url() ?>assets/front/js/theme.js"></script>
</body>

</html>