<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <div class="row item-push">
         <div class="col-md-12">
            <div class="block block-rounded">
               <div class="block-content block-content-full">
                  <div class="row text-center">
                     <div class="col-3 border-end">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-2x fa-trophy text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 <?= $content ?>
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Content
                              </dd>
                           </dl>
                        </div>
                     </div>
                     <div class="col-3 border-end">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-2x fa-newspaper text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 <?= $content ?>
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Post
                              </dd>
                           </dl>
                        </div>
                     </div>
                     <div class="col-3 border-end">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-2x fa-users text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 <?= $sub ?>
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Subscriber
                              </dd>
                           </dl>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-2x fa-face-kiss-wink-heart text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 <?= $loves ?>
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Loves
                              </dd>
                           </dl>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 col-xl-4">
            <div class="block block-rounded">
               <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                  <div>
                     <i class="fa fa-2x fa-wallet text-primary"></i>
                  </div>
                  <dl class="ms-3 text-end mb-0">
                     <dt class="h3 fw-extrabold mb-0">
                        <?= ($creator['creatorBalance'] == 0) ? 'Empty :(' : format_rupiah($creator['creatorBalance']) ?>
                     </dt>
                     <dd class="fs-sm fw-medium text-muted mb-0">
                        My Balance
                     </dd>
                  </dl>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-xl-4">
            <div class="block block-rounded">
               <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                  <div>
                     <i class="fa fa-2x fa-money-bill-wave text-primary"></i>
                  </div>
                  <dl class="ms-3 text-end mb-0">
                     <dt class="h3 fw-extrabold mb-0">
                        <?= format_rupiah($income[$currentMonth - 1]) ?>
                     </dt>
                     <dd class="fs-sm fw-medium text-muted mb-0">
                        Income This Month
                     </dd>
                  </dl>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-xl-4">
            <div class="block block-rounded">
               <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                  <div>
                     <i class="fa fa-2x fa-money-bill-1-wave text-primary"></i>
                  </div>
                  <dl class="ms-3 text-end mb-0">
                     <dt class="h3 fw-extrabold mb-0">
                        <?= format_rupiah($income[$currentMonth - 2]) ?>
                     </dt>
                     <dd class="fs-sm fw-medium text-muted mb-0">
                        Income Last Month
                     </dd>
                  </dl>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">All Income (Content, Subscribe, & Donate)
                     <?= $currentYear ?>
                  </h3>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="income-chart"></canvas>
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
   document.addEventListener("DOMContentLoaded", function () {
      Chart.defaults.color = '#818d96';
      Chart.defaults.font.weight = '600';
      Chart.defaults.scale.grid.color = "rgba(0, 0, 0, .05)";
      Chart.defaults.scale.grid.zeroLineColor = "rgba(0, 0, 0, .1)";
      Chart.defaults.scale.beginAtZero = true;
      Chart.defaults.scale.y = {
         type: 'linear',
         ticks: {
            callback: function () {
               return <?= json_encode($income) ?>
            }
         },
      };
      Chart.defaults.elements.line.borderWidth = 2;
      Chart.defaults.elements.point.radius = 4;
      Chart.defaults.elements.point.hoverRadius = 6;
      Chart.defaults.plugins.tooltip.radius = 3;
      Chart.defaults.plugins.legend.labels.boxWidth = 15;

      let incomeChartCtx = document.getElementById('income-chart');
      let incomeChart;
      let incomeChartData;

      incomeChartData = {
         labels: <?= json_encode($month) ?>,
         datasets: [{
            label: 'Income',
            fill: true,
            backgroundColor: 'rgba(171, 227, 125, .5)',
            borderColor: 'rgba(171, 227, 125, 1)',
            pointBackgroundColor: 'rgba(171, 227, 125, 1)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
            data: <?= json_encode($income) ?>,
         },
         ]
      };

      incomeChart = new Chart(incomeChartCtx, {
         type: 'line',
         data: incomeChartData,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4
         }
      },);
   });
</script>
<?= $this->endsection() ?>