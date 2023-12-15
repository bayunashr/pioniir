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
   <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/colors/aqua.css">
   <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-JrdkEpErGj3jhkFJ"></script>
   <style>
   .language-select .dropdown-menu {
      left: -50% !important;
   }

   .creator-nav {
      background-color: white;
      color: #333F52;
      border: 1px solid #333F52;
   }

   .creator-nav-active {
      background-color: #333F52 !important;
      color: white !important;
      border: 0 !important;
   }

   .blur-img {
      backdrop-filter: blur(10px);
      background-color: transparent;
   }
   </style>
</head>

<body>
   <div class="content-wrapper bg-gray">
      <header class="wrapper bg-gray">
         <nav class="navbar navbar-expand-lg fancy navbar-light navbar-bg-light caret-none">
            <div class="container">
               <div class="navbar-collapse-wrapper bg-white d-flex flex-row flex-nowrap w-100 justify-content-between align-items-center py-sm-3">
                  <div class="navbar-brand w-100">
                     <a href="<?= base_url() ?>">
                        <img class="w-15" src="<?= base_url() ?>assets/front/img/pioniirdark.png" alt="" />
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
                              <img class="avatar w-8" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                           </a>
                           <ul class="dropdown-menu">
                              <?php if (count($creator) == 1) : ?>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                              <?php else : ?>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('register/creator') ?>">Jadi Creator</a>
                              </li>
                              <?php endif; ?>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('user/profile/'.session()->get('userName')) ?>">Profile</a></li>
                              <li class="nav-item"><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                           </ul>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                           <a href="<?= base_url('login') ?>" class=" btn btn-sm btn-outline-navy rounded-pill">Get Started</a>
                        </li>
                        <?php endif; ?>
                     </ul>
                     <!-- /.navbar-nav -->
                  </div>
                  <!-- /.navbar-other -->
               </div>
               <!-- /.navbar-collapse-wrapper -->
            </div>
            <!-- /.container -->
            <?php if (current_url(true)->getSegment(1) == 'creator' || current_url(true)->getSegment(1) == 'post' || current_url(true)->getSegment(1) == 'content') : ?>
            <div class="d-block d-sm-none py-3 bg-gray px-3 w-100">
               <a href="<?= base_url('creator/' . $creatorData[0]['creatorAlias']) ?>" style="margin-right: 3px; height: 40px;" class="btn btn-sm rounded <?= current_url(true)->getSegment(1) == 'creator' ? 'creator-nav-active' : 'creator-nav' ?>">Home</a>
               <a href="<?= base_url('post/' . $creatorData[0]['creatorAlias']) ?>" style="margin-right: 3px; height: 40px;" class="btn btn-sm rounded <?= current_url(true)->getSegment(1) == 'post' ? 'creator-nav-active' : 'creator-nav' ?>">Post</a>
               <a href="<?= base_url('content/' . $creatorData[0]['creatorAlias']) ?>" style="height: 40px;" class="btn btn-sm rounded <?= current_url(true)->getSegment(1) == 'content' ? 'creator-nav-active' : 'creator-nav' ?>">Content</a>
            </div>
            <?php endif ?>
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
      <div class="container pt-4">
         <p>© 2023. All rights reserved.</p>
      </div>
   </footer>
   <script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
   <script src="<?= base_url() ?>assets/front/js/theme.js"></script>
   <?= $this->renderSection('js') ?>
</body>

</html>