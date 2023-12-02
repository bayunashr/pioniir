<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Milestone</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- If (tidak ada milstone aktif) -->
                <a href="<?= base_url('dashboard/milestone/add') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="nav-main-link-icon fa fa-plus"></i> Add Milestone</a>
                <!-- Else -->
                <div class="row">
                    <div class="col-12 col-sm-3">
                        <span class="h5">Jumat Berbagi</span> <br>
                        <span style="font-size: 13px;">500.000 terkumpul dari 1.000.000</span>
                        <div class="progress push" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 63%;">
                                <span class="fs-sm fw-semibold">63%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Else -->

                <p class="fw-bold h3 mt-4">Milestone History</p>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">NO</th>
                            <th>Nama</th>
                            <th>Balance</th>
                            <th>Target</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center fs-sm">1</td>
                            <td class="fw-semibold fs-sm">Jumat berbagi</td>
                            <td class="fs-sm">500.000</td>
                            <td class="fs-sm">1.000.000</td>
                            <td class="fs-sm">
                                <h5>
                                    <span class="badge bg-success"><i class="fa fa-check"></i> Publish</span> &nbsp;
                                    <span class="badge bg-info"><i class="fa fa-pencil"></i> Draft</span> &nbsp;
                                    <span class="badge bg-info"><i class="fa fa-exclamation-circle"></i> Archive</span> &nbsp;
                                    <span class="badge bg-danger"><i class="fa fa-times-circle"></i> Cancel</span>
                                </h5>
                            </td>
                            <td class="fs-sm">
                                <a href="<?= base_url('dashboard/milestone/edit/1') ?>" class="btn btn-sm btn-info mb-4"><i class="nav-main-link-icon si si-pencil"></i> Edit</a> &nbsp;
                                <a href="#" class="btn btn-sm btn-danger mb-4"><i class="nav-main-link-icon si si-trash"></i> Cancel</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center fs-sm">2</td>
                            <td class="fw-semibold fs-sm">Buat Beli PC</td>
                            <td class="fs-sm">10.000.000</td>
                            <td class="fs-sm">10.000.000</td>
                            <td class="fs-sm">
                                <h5>
                                    <span class="badge bg-success"><i class="fa fa-check"></i> Publish</span> &nbsp;
                                    <span class="badge bg-info"><i class="fa fa-pencil"></i> Draft</span> &nbsp;
                                    <span class="badge bg-info"><i class="fa fa-exclamation-circle"></i> Archive</span> &nbsp;
                                    <span class="badge bg-danger"><i class="fa fa-times-circle"></i> Cancel</span>
                                </h5>
                            </td>
                            <td class="fs-sm">
                                <a href="<?= base_url('dashboard/milestone/edit/1') ?>" class="btn btn-sm btn-info mb-4"><i class="nav-main-link-icon si si-pencil"></i> Edit</a> &nbsp;
                                <a href="#" class="btn btn-sm btn-danger mb-4"><i class="nav-main-link-icon si si-trash"></i> Cancel</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>

<div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tarik Saldo</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            <label class="form-label" for="jumlah">Jumlah Saldo</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Saldo">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="pass">User Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url('') ?>assets/dashboard/js/oneui.app.min.js"></script>

<!-- jQuery (required for DataTables plugin) -->
<script src="<?= base_url('') ?>assets/dashboard/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url('') ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
<?= $this->endsection() ?>