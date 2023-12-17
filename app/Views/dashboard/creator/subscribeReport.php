<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        Subscribe
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
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-trophy text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= $totalSub ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Total Subscriber
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-trend-up text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= ($diffSub > 0) ? '+ ' . $diffSub : '- ' . $diffSub ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Subscriber Changes From Last Month
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
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
                                Income From Subscription This Month
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
                        <h3 class="block-title">Subscription Overview</h3>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="py-3" style="height: 360px">
                            <!-- Lines Chart Container -->
                            <canvas id="sub-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END Lines Chart -->
            </div>
            <div class="col-xl-6">
                <!-- Top Products -->
                <div class="block block-rounded mb-0" style="height: 93.725%">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Most Loyal Bud</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($topSubscribedUser as $key => $value): ?>
                                    <tr>
                                        <td class="fw-semibold fs-sm" style="width: 100px;">
                                            <a>#
                                                <?= $no++ ?>
                                            </a>
                                        </td>
                                        <td class="d-sm-table-cell fs-sm">
                                            <a>
                                                <?= $value['userName'] ?>
                                            </a>
                                        </td>
                                        <td class="fw-medium fs-sm text-end">
                                            <?= $value['timeSubscribed'] ?> Month Subscribed
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

        let subChartCtx = document.getElementById('sub-chart');
        let subChart;
        let subChartData;

        subChartData = {
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
                data: [<?= json_encode($totalSubPerMonthLastYear) ?>],
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
                data: <?= json_encode($totalSubPerMonth) ?>,
            }
            ]
        };

        subChart = new Chart(subChartCtx, {
            type: 'bar',
            data: subChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tension: .4
            }
        },);
    });
</script>
<?= $this->endSection() ?>