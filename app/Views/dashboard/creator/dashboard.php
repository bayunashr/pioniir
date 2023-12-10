<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <!-- Overview -->
      <div class="row items-push">
         <div class="col-sm-4 col-xxl-3">
            <!-- Messages -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
               <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                     <dt class="fs-3 fw-bold"><?= $donate ?></dt>
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Donasi Diterima</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-gift fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                     <span>Lihat semua donatur</span>
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
                     <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Jumlah Subscriber</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                     <i class="fa fa-money-check-dollar fs-3 text-primary"></i>
                  </div>
               </div>
               <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
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
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
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
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
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
<script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/chart.js/chart.umd.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_pages_dashboard.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_comp_charts.min.js"></script>

<script>
   document.addEventListener("DOMContentLoaded", function() {

      Chart.defaults.color = '#818d96';
      Chart.defaults.font.weight = '600';
      Chart.defaults.scale.grid.color = "rgba(0, 0, 0, .05)";
      Chart.defaults.scale.grid.zeroLineColor = "rgba(0, 0, 0, .1)";
      Chart.defaults.scale.beginAtZero = true;
      Chart.defaults.elements.line.borderWidth = 2;
      Chart.defaults.elements.point.radius = 4;
      Chart.defaults.elements.point.hoverRadius = 6;
      Chart.defaults.plugins.tooltip.radius = 3;
      Chart.defaults.plugins.legend.labels.boxWidth = 15;

      const chartDataSubM = {
         labels: <?= json_encode($chartMonth) ?>,
         datasets: [{
            label: 'Subscriber',
            fill: true,
            backgroundColor: 'rgba(0, 0, 0, .1)',
            borderColor: 'rgba(0, 0, 0, .3)',
            pointBackgroundColor: 'rgba(0, 0, 0, .3)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
            data: <?= json_encode($chartDataSubM) ?>
         }]
      };

      const chartConfigSubM = {
         type: 'line',
         data: chartDataSubM,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4,
            scales: {
               y: {
                  type: 'linear',
                  ticks: {
                     stepSize: 1,
                  },
               },
            },
         },
      };

      let t = [];
      for (let i = 1; i <= <?= $currentDayMonth ?>; i++) {
         t[i] = i;
      }

      const chartDataSubD = {
         labels: t,
         datasets: [{
            label: 'Subscriber',
            fill: true,
            backgroundColor: 'rgba(0, 0, 0, .1)',
            borderColor: 'rgba(0, 0, 0, .3)',
            pointBackgroundColor: 'rgba(0, 0, 0, .3)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
            data: <?= json_encode($chartDataSubD) ?>
         }]
      };

      const chartConfigSubD = {
         type: 'line',
         data: chartDataSubD,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4,
            scales: {
               y: {
                  type: 'linear',
                  ticks: {
                     stepSize: 1,
                  },
               },
            },
         },
      };

      const ctxM = document.getElementById('chartSubM');
      const ctxD = document.getElementById('chartSubD');
      const chartSubM = new Chart(ctxM, chartConfigSubM);
      const chartSubD = new Chart(ctxD, chartConfigSubD);
   });
</script>
<?= $this->endsection() ?>