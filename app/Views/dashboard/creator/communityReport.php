<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <!-- Overview -->
      <div class="row items-push">
         <div class="col-md-12">
            <a class="block block-rounded block-link-shadow">
               <div class="block-content block-content-full">
                  <div class="row text-center">
                     <div class="col-4 border-end">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-briefcase text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 85
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Total Content
                              </dd>
                           </dl>
                        </div>
                     </div>
                     <div class="col-4 border-end">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-chart-line text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 24
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Total Post
                              </dd>
                           </dl>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="py-3">
                           <div class="item item-circle bg-body-light mx-auto">
                              <i class="fa fa-users text-primary"></i>
                           </div>
                           <dl class="mb-0">
                              <dt class="h3 fw-extrabold mt-3 mb-0">
                                 96
                              </dt>
                              <dd class="fs-sm fw-medium text-muted mb-0">
                                 Subscriber
                              </dd>
                           </dl>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-6">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">Monthly Content Overview</h3>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="monthly-content-chart"></canvas>
                  </div>
               </div>
            </div>
            <!-- END Lines Chart -->
         </div>
         <div class="col-xl-6">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">Yearly Content Overview</h3>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="yearly-content-chart"></canvas>
                  </div>
               </div>
            </div>
            <!-- END Lines Chart -->
         </div>
      </div>
      <div class="row">
         <div class="col-xl-6">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">Monthly Post Overview</h3>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="monthly-post-chart"></canvas>
                  </div>
               </div>
            </div>
            <!-- END Lines Chart -->
         </div>
         <div class="col-xl-6">
            <!-- Lines Chart -->
            <div class="block block-rounded">
               <div class="block-header block-header-default">
                  <h3 class="block-title">Yearly Post Overview</h3>
               </div>
               <div class="block-content block-content-full text-center">
                  <div class="py-3" style="height: 360px">
                     <!-- Lines Chart Container -->
                     <canvas id="yearly-post-chart"></canvas>
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
<script src="<?= base_url() ?>assets/dashbooard/js/oneui.app.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/chart.js/chart.umd.js"></script>

<script>
   document.addEventListener("DOMContentLoaded", function() {
      Chart.defaults.color = '#818d96';
      Chart.defaults.font.weight = '600';
      Chart.defaults.scale.grid.color = "rgba(0, 0, 0, .05)";
      Chart.defaults.scale.grid.zeroLineColor = "rgba(0, 0, 0, .1)";
      Chart.defaults.scale.beginAtZero = true;
      Chart.defaults.scale.y = {
         type: 'linear',
         ticks: {
            stepSize: 1,
         },
      };
      Chart.defaults.elements.line.borderWidth = 2;
      Chart.defaults.elements.point.radius = 4;
      Chart.defaults.elements.point.hoverRadius = 6;
      Chart.defaults.plugins.tooltip.radius = 3;
      Chart.defaults.plugins.legend.labels.boxWidth = 15;

      let yearlyContentChartCtx = document.getElementById('yearly-content-chart');
      let monthlyContentChartCtx = document.getElementById('monthly-content-chart');
      let yearlyPostChartCtx = document.getElementById('yearly-post-chart');
      let monthlyPostChartCtx = document.getElementById('monthly-post-chart');
      let yearlyContentChart, monthlyContentChart, yearlyPostChart, monthlyPostChart;
      let yearlyContentChartData, monthlyContentChartData, yearlyPostChartData, monthlyPostChartData;

      yearlyContentChartData = {
         labels: <?= json_encode($month) ?>,
         datasets: [{
               label: 'Last Year',
               fill: true,
               backgroundColor: 'rgba(171, 227, 125, .5)',
               borderColor: 'rgba(171, 227, 125, 1)',
               pointBackgroundColor: 'rgba(171, 227, 125, 1)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
               data: <?= json_encode($lastYearContentData) ?>,
            },
            {
               label: 'This Year',
               fill: true,
               backgroundColor: 'rgba(0, 0, 0, .1)',
               borderColor: 'rgba(0, 0, 0, .3)',
               pointBackgroundColor: 'rgba(0, 0, 0, .3)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
               data: <?= json_encode($currentYearContentData) ?>,
            }
         ]
      };

      monthlyContentChartData = {
         datasets: [{
               label: 'Last Month',
               fill: true,
               backgroundColor: 'rgba(171, 227, 125, .5)',
               borderColor: 'rgba(171, 227, 125, 1)',
               pointBackgroundColor: 'rgba(171, 227, 125, 1)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
               data: <?= json_encode($lastMonthContentData) ?>,
            },
            {
               label: 'This Month',
               fill: true,
               backgroundColor: 'rgba(0, 0, 0, .1)',
               borderColor: 'rgba(0, 0, 0, .3)',
               pointBackgroundColor: 'rgba(0, 0, 0, .3)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
               data: <?= json_encode($currentMonthContentData) ?>,
            }
         ]
      };

      yearlyPostChartData = {
         labels: <?= json_encode($month) ?>,
         datasets: [{
               label: 'Last Year',
               fill: true,
               backgroundColor: 'rgba(171, 227, 125, .5)',
               borderColor: 'rgba(171, 227, 125, 1)',
               pointBackgroundColor: 'rgba(171, 227, 125, 1)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
               data: <?= json_encode($lastYearPostData) ?>,
            },
            {
               label: 'This Year',
               fill: true,
               backgroundColor: 'rgba(0, 0, 0, .1)',
               borderColor: 'rgba(0, 0, 0, .3)',
               pointBackgroundColor: 'rgba(0, 0, 0, .3)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
               data: <?= json_encode($currentYearPostData) ?>,
            }
         ]
      };

      monthlyPostChartData = {
         datasets: [{
               label: 'Last Month',
               fill: true,
               backgroundColor: 'rgba(171, 227, 125, .5)',
               borderColor: 'rgba(171, 227, 125, 1)',
               pointBackgroundColor: 'rgba(171, 227, 125, 1)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
               data: <?= json_encode($lastMonthPostData) ?>,
            },
            {
               label: 'This Month',
               fill: true,
               backgroundColor: 'rgba(0, 0, 0, .1)',
               borderColor: 'rgba(0, 0, 0, .3)',
               pointBackgroundColor: 'rgba(0, 0, 0, .3)',
               pointBorderColor: '#fff',
               pointHoverBackgroundColor: '#fff',
               pointHoverBorderColor: 'rgba(0, 0, 0, .3)',
               data: <?= json_encode($currentMonthPostData) ?>,
            }
         ]
      };

      yearlyContentChart = new Chart(yearlyContentChartCtx, {
         type: 'bar',
         data: yearlyContentChartData,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4
         }
      }, );

      monthlyContentChart = new Chart(monthlyContentChartCtx, {
         type: 'line',
         data: monthlyContentChartData,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4
         }
      }, );

      yearlyPostChart = new Chart(yearlyPostChartCtx, {
         type: 'bar',
         data: yearlyPostChartData,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4
         }
      }, );

      monthlyPostChart = new Chart(monthlyPostChartCtx, {
         type: 'line',
         data: monthlyPostChartData,
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tension: .4
         }
      }, );

   });
</script>
<?= $this->endSection() ?>