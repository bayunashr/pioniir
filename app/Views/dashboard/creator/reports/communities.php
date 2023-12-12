<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <!-- Overview -->
      <div class="row items-push">
         <div class="col-sm-4 col-xxl-4">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold">komunis</dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Postingan</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-newspaper fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                     <span>Lihat semua postingan</span>
                     <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
               </div>
            </div>
            <!-- END Conversion Rate-->
         </div>
      </div>
      <div class="row">
         <div class="col-xl-6">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">Monthly Subscriber Overview</h3>
                  <div class="block-options">
                     <button type="button" class="btn-block-option" id="toggle-chart">
                        <i class="si si-refresh"></i> Toggle View
                     </button>
                  </div>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="chartSubM"></canvas>
                  </div>
               </div>
            </div>
            <!-- END Lines Chart -->
         </div>
         <div class="col-xl-6">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">Daily Subscriber Overview</h3>
                  <div class="block-options">
                     <button type="button" class="btn-block-option" id="toggle-chart">
                        <i class="si si-refresh"></i> Toggle View
                     </button>
                  </div>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="chartSubD"></canvas>
                  </div>
               </div>
            </div>
            <!-- END Lines Chart -->
         </div>
      </div>
      <!-- END Overview -->
   </div>
   <!-- END Page Content -->
</main>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="assets/js/oneui.app.min.js"></script>
<?= $this->endSection() ?>