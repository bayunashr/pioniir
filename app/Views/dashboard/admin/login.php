<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?= $title ?></title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/dashboard/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/dashboard/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/dashboard/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/dashboard/css/oneui.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/dashboard/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  </head>

  <body>
    <!-- Page Container -->
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-color: black;">
          <div class="hero-static d-flex align-items-center bg-primary-dark-op">
            <div class="content">
              <div class="row justify-content-center push">
                <div class="col-md-8 col-lg-6 col-xl-4">
                  <!-- Unlock Block -->
                  <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                      <h3 class="block-title">Login Admin</h3>
                    </div>
                    <div class="block-content">
                      <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5 text-center">
                        <img class="img-avatar img-avatar96" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="">
                        <p class="fw-semibold my-2">
                          admin@pioniir.com
                        </p>

                        <!-- Unlock Form -->
                        <!-- jQuery Validation (.js-validation-lock class is initialized in js/pages/op_auth_lock.min.js which was auto compiled from _js/pages/op_auth_lock.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-lock mt-4" action="<?=base_url('admin/login')?>" method="POST">
                          <div class="mb-4">
                            <input type="password" class="form-control form-control-lg form-control-alt" id="lock-password" name="password" placeholder="Password..">
                          </div>
                          <div class="row justify-content-center mb-4">
                            <div class="col-md-6 col-xl-5">
                              <button type="submit" class="btn w-100 btn-alt-success">
                                <i class="fa fa-fw fa-lock-open me-1 opacity-50"></i> Login
                              </button>
                            </div>
                          </div>
                        </form>
                        <!-- END Unlock Form -->
                      </div>
                    </div>
                  </div>
                  <!-- END Unlock Block -->
                </div>
              </div>
              <div class="fs-sm text-center text-white">
                <span class="fw-medium">OneUI 5.7</span> &copy; <span data-toggle="year-copy"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="<?= base_url() ?>assets/dashboard/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url() ?>assets/dashboard/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url() ?>assets/dashboard/js/pages/op_auth_lock.min.js"></script>

    <script>
        <?php if(session()->getFlashdata('error')) : ?>
            var pesan = <?= json_encode(session()->getFlashdata('error')) ?>;
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: pesan,
            });
        <?php endif; ?>
    </script>
  </body>
</html>
