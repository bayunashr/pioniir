<?= $this->extend('dashboard/templates/admin-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <!-- Overview -->
      <div class="row items-push">
         <div class="col-sm-6 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $user ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Pengguna</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-user fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/user' ?>">
                     <span>Lihat semua pengguna</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Pending Orders -->
         </div>
         <div class="col-sm-6 col-xxl-3">
            <!-- New Customers -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $creator ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Kreator</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-user-ninja fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/creator' ?>">
                     <span>Lihat semua kreator</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END New Customers -->
         </div>
         <div class="col-sm-4 col-xxl-3">
            <!-- Messages -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $donate ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Donasi</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-gift fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/donate' ?>">
                     <span>Lihat semua donasi</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Messages -->
         </div>
         <div class="col-sm-4 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $sub ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Subscribe Ditekan</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-money-check-dollar fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/subscribe' ?>">
                     <span>Lihat semua subscriber</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
         <div class="col-sm-4 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $buy ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Konten Dibeli</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-box fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/buy' ?>">
                     <span>Lihat semua buyer</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
         <div class="col-sm-3 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $content ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Konten</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-dice-six fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/content' ?>">
                     <span>Lihat semua konten</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
         <div class="col-sm-3 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $post ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Postingan</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-newspaper fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/post' ?>">
                     <span>Lihat semua postingan</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
         <div class="col-sm-3 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $comment ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Komentar</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-comment-dots fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/comment' ?>">
                     <span>Lihat semua komentar</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
         <div class="col-sm-3 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $love ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Love</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-heart fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="<?= current_url().'/love' ?>">
                     <span>Lihat semua love</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
      </div>
      <!-- END Overview -->
   </div>
   <!-- END Page Content -->
</main>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_pages_dashboard.min.js"></script>
<?= $this->endsection() ?>