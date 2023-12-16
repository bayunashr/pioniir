<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        Content
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Tons of informational report about your contents.
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content mb-4">
        <!-- Overview -->
        <div class="row item-push">
            <div class="col-md-12 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-trophy text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= $currentYearContentData[$currentMonth - 1] ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                New Content This Month
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-money-bill-wave text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= format_rupiah($incomeThisMonth) ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Gained From Content Sales This Month
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
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
                                Loves Obtained From Content This Month
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
                        <h3 class="block-title">Monthly Upload Frequency</h3>
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
                        <h3 class="block-title">Yearly Upload Frequency</h3>
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
        <div class="row item-push">
            <div class="col-xl-6">
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
                                                <?= $value['contentTitle'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">
                                                <?= $value['contentStatus'] ?>
                                            </span>
                                        </td>
                                        <td class="fw-semibold">
                                            <i class="text-danger fa fa-heart"></i>
                                            <?= $value['contentLike'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Top Products -->
            </div>
            <div class="col-xl-6">
                <!-- Top Products -->
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Top Purchased</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                                <?php foreach ($topPurchased as $key => $value): ?>
                                    <tr>
                                        <td>
                                            <a href="be_pages_ecom_product_edit.html">
                                                <?= $key ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">Sold
                                                <?= $value ?> Copies
                                            </span>
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

        let yearlyContentChartCtx = document.getElementById('yearly-content-chart');
        let monthlyContentChartCtx = document.getElementById('monthly-content-chart');
        let yearlyContentChart, monthlyContentChart;
        let yearlyContentChartData, monthlyContentChartData;

        yearlyContentChartData = {
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
                data: <?= json_encode($lastYearContentData) ?>,
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
                data: <?= json_encode($currentYearContentData) ?>,
            }
            ]
        };

        monthlyContentChartData = {
            datasets: [{
                label: <?= json_encode($month[$currentMonth - 2]) ?>,
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
                label: <?= json_encode($month[$currentMonth - 1]) ?>,
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

        yearlyContentChart = new Chart(yearlyContentChartCtx, {
            type: 'bar',
            data: yearlyContentChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tension: .4
            }
        },);

        monthlyContentChart = new Chart(monthlyContentChartCtx, {
            type: 'line',
            data: monthlyContentChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tension: .4
            }
        },);

    });
</script>
<?= $this->endSection() ?>