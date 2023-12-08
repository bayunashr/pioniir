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
   <link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>
   <div class="content-wrapper">
      <!-- /header -->
      <section class="wrapper gradient-6">
         <div class="container pt-15 pb-21 pt-md-16 pb-md-21 text-center">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <h1 class="display-1 mb-3 text-white"><a href="<?= base_url() ?>"><img class="w-10" src="<?= base_url() ?>assets/front/img/pioniir.png" alt=""></a> Sign Up</h1>
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
                     <div class="card-body p-8 p-sm-11 text-center">
                        <h2 class="mb-3 text-start">Sign up to Pioniir</h2>
                        <p class="lead mb-6 text-start">Registration takes less than a minute.</p>
                        <form action="<?= base_url('register/auth')?>" class="text-start mb-3" method="POST">
                           <div class="form-floating mb-4">
                              <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?= session()->has('old_input') ? session('old_input')['username'] : null ?>" required>
                              <label for="username">Username</label>
                           </div>
                           <div class="form-floating mb-4">
                              <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" required value="<?= session()->has('old_input') ? session('old_input')['fullname'] : null ?>">
                              <label for="username">Full Name</label>
                           </div>
                           <div class="form-floating mb-4">
                              <input type="email" class="form-control" placeholder="Email" id="email" name="email" required value="<?= session()->has('old_input') ? session('old_input')['email'] : null ?>">
                              <label for="email">Email</label>
                           </div>
                           <div class="form-floating password-field mb-4">
                              <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                              <span class="password-toggle"><i class="uil uil-eye"></i></span>
                              <label for="password">Password</label>
                           </div>
                           <div class="form-floating password-field mb-4">
                              <input type="password" class="form-control" placeholder="Confirm Password" id="passwordConfirm" name="passwordConfirm" required>
                              <span class="password-toggle"><i class="uil uil-eye"></i></span>
                              <label for="passwordConfirm">Confirm Password</label>
                           </div>
                           <button type="submit" class="btn btn-navy rounded-pill btn-login w-100 mb-2">Sign Up</button>
                           <a href="<?= $link ?>" class="btn rounded-pill w-100 mb-2 btn-outline-danger"><i class="uil uil-google"></i> &nbsp; Sign Up With Gmail</a>
                        </form>
                        <!-- /form -->
                        <p class="mb-0">Already have an account? <a href="<?= base_url('login') ?>" class="hover link-navy">Sign in</a></p>
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
   <!-- /.content-wrapper -->
   <script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
   <script src="<?= base_url() ?>assets/front/js/theme.js"></script>
   <script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>

   <script>
   <?php if(session()->getFlashdata('success')) : ?>
   var pesan = <?= json_encode(session()->getFlashdata('success')) ?>;
   Swal.fire({
      title: "Good job!",
      text: pesan,
      icon: "success"
   });
   <?php endif; ?>
   <?php if(session()->getFlashdata('error') || session()->getFlashdata('validation')) : ?>
   var pesan = <?= session()->getFlashdata('error') ? json_encode(session()->getFlashdata('error')) : json_encode(current(session()->getFlashdata('validation')))?>;
   Swal.fire({
      icon: "error",
      title: "Oops...",
      text: pesan,
   });
   <?php endif; ?>
   </script>
</body>

</html>