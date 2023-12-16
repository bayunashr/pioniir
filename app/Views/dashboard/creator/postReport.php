<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        Post
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Tons of informational report about your post.
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <div class="row item-push">
            <div class="col-md-12 col-xl-6">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-trophy text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= $currentYearPostData[$currentMonth - 1] ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                New Post This Month
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-heart text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= $loveThisMonth ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Loves Obtained From Post This Month
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="row item-push">
            <div class="col-xl-6">
                <!-- Lines Chart -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Monthly Post Frequency</h3>
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
                        <h3 class="block-title">Yearly Post Frequency</h3>
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
        <div class="row item-push">
            <div class="col-xl-12">
                <!-- Top Products -->
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Top Loved</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                                <?php foreach ($topLoved as $key => $value): ?>
                                    <tr>
                                        <td>
                                            <a href="be_pages_ecom_product_edit.html">
                                                <?= $value['postTitle'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">
                                                <?= $value['postStatus'] ?>
                                            </span>
                                        </td>
                                        <td class="fw-semibold">
                                            <i class="text-danger fa fa-heart"></i>
                                            <?= $value['postLike'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Top Products -->
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
                stepSize: 1,
            },
        };
        Chart.defaults.elements.line.borderWidth = 2;
        Chart.defaults.elements.point.radius = 4;
        Chart.defaults.elements.point.hoverRadius = 6;
        Chart.defaults.plugins.tooltip.radius = 3;
        Chart.defaults.plugins.legend.labels.boxWidth = 15;

        let yearlyPostChartCtx = document.getElementById('yearly-post-chart');
        let monthlyPostChartCtx = document.getElementById('monthly-post-chart');
        let yearlyPostChart, monthlyPostChart;
        let yearlyPostChartData, monthlyPostChartData;

        yearlyPostChartData = {
            labels: <?= json_encode($month) ?>,
            datasets: [{
                label: <?= $currentYear - 1 ?>,
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
                label: <?= $currentYear ?>,
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
                label: <?= json_encode($month[$currentMonth - 2]) ?>,
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
                label: <?= json_encode($month[$currentMonth - 1]) ?>,
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

        yearlyPostChart = new Chart(yearlyPostChartCtx, {
            type: 'bar',
            data: yearlyPostChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tension: .4
            }
        },);

        monthlyPostChart = new Chart(monthlyPostChartCtx, {
            type: 'line',
            data: monthlyPostChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tension: .4
            }
        },);

    });
</script>
<?= $this->endSection() ?>