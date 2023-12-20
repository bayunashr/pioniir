<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        Donate
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Tons of informational report about your donate.
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
                            <i class="fa fa-2x fa-money-bill-1-wave text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= format_rupiah($incomeAllTime) ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Earned All-Time
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-money-bill-1 text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?= format_rupiah($incomeThisMonth) ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Earned This Month
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-user-tie text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                <?php if(empty($topThisMonth)) : ?>
                                    Belum ada donatur    
                                <?php else : ?>
                                    <?= $topThisMonth[0]['donateName'] ?>
                                <?php endif ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Is Your Sugar Daddy
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-user-secret text-muted"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                            <dt class="h3 fw-extrabold mb-0">
                                 <?php if(empty($topThisMonth)) : ?>
                                    Belum ada donatur    
                                <?php else : ?>
                                    <?= $topAllTime[0]['donateName'] ?>
                                <?php endif ?>
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                Is Your Real Sugar Daddy
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="row item-push">
            <div class="col-xl-12">
                <!-- Lines Chart -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Donate Overview</h3>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="py-3" style="height: 360px">
                            <!-- Lines Chart Container -->
                            <canvas id="donate-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END Lines Chart -->
            </div>
        </div>
        <div class="row item-push">
            <div class="col-xl-6">
                <!-- Top Products -->
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Most Spender This Month</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($topThisMonth as $key => $value): ?>
                                    <tr>
                                        <td class="fw-semibold fs-sm" style="width: 100px;">
                                            <a>#
                                                <?= $no++ ?>
                                            </a>
                                        </td>
                                        <td class="d-sm-table-cell fs-sm">
                                            <a>
                                                <?= $value['donateName'] ?>
                                            </a>
                                        </td>
                                        <td class="fw-medium fs-sm text-end">
                                            Gave Me
                                            <?= format_rupiah($value['totalDonation']) ?>
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
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Most Spender All Time</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($topAllTime as $key => $value): ?>
                                    <tr>
                                        <td class="fw-semibold fs-sm" style="width: 100px;">
                                            <a>#
                                                <?= $no++ ?>
                                            </a>
                                        </td>
                                        <td class="d-sm-table-cell fs-sm">
                                            <a>
                                                <?= $value['donateName'] ?>
                                            </a>
                                        </td>
                                        <td class="fw-medium fs-sm text-end">
                                            Gave Me
                                            <?= format_rupiah($value['totalDonation']) ?>
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
                callback: function () {
                    return <?= json_encode($currentYearDonateData) ?>
                }
            },
        };
        Chart.defaults.elements.line.borderWidth = 2;
        Chart.defaults.elements.point.radius = 4;
        Chart.defaults.elements.point.hoverRadius = 6;
        Chart.defaults.plugins.tooltip.radius = 3;
        Chart.defaults.plugins.legend.labels.boxWidth = 15;

        let donateChartCtx = document.getElementById('donate-chart');
        let donateChart;
        let donateChartData;

        donateChartData = {
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
                data: <?= json_encode($lastYearDonateData) ?>,
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
                data: <?= json_encode($currentYearDonateData) ?>,
            }
            ]
        };

        donateChart = new Chart(donateChartCtx, {
            type: 'line',
            data: donateChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tension: .4
            }
        },);
    });
</script>
<?= $this->endSection() ?>