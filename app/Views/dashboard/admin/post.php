<?= $this->extend('dashboard/templates/admin-layout') ?>

<?= $this->section('header-addons') ?>
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <!-- Dynamic Table with Export Buttons -->
          <div class="block block-rounded">
            <div class="block-content block-content-full">
              <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <button type="button" class="js-swal-confirm btn btn-alt-secondary push mb-2">
                <i class="fa fa-check-square text-muted me-1"></i> iki kenek
              </button>
              <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">NO</th>
                    <th class="d-none" style="width: 15%;">ID</th>
                    <th style="width: 25%;">Creator</th>
                    <th style="width: 35%;">Title</th>
                    <th style="width: 10%;">Post</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 10%;">Like</th>
                    <th style="width: 5%;">Action</th>
                    <th>Tes Sweetalert</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($post as $data => $value): ?>
                  <tr>
                    <td class="text-center fs-sm"><?= $no++ ?></td>
                    <td class="d-none fw-semibold fs-sm"><?= $value['postId'] ?></td>
                    <td class="fw-semibold fs-sm"><?= $value['creator_name'] ?></td>
                    <td class="fs-sm">
                      <?= $value['postTitle'] ?>
                    </td>
                    <td class="fs-sm">
                      <button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="left" title="Post" data-bs-content="<?= $value['postValue'] ?>"><i class="nav-main-link-icon si si-magnifier-add"></i></button>
                    </td>
                    <td class="text-center">
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning"><?= $value['postStatus'] ?></span>
                    </td>
                    <td class="fs-sm">
                      <?= $value['postLike'] ?>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/ban/'.$value['postId']) ?>" class="btn btn-sm btn-alt-danger js-swal-confirm">
                        <i class="fa fa-fw fa-ban"></i> Ban
                      </a>
                    </td>
                    <td>
                      <button type="button" class="js-swal-confirm btn btn-alt-secondary push mb-2">
                        <i class="fa fa-check-square text-muted me-1"></i> iki gakenek
                      </button>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END Dynamic Table with Export Buttons -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
<?= $this->endSection() ?>

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
    <script src="<?= base_url('') ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url('') ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
    <script src="<?= base_url('') ?>assets/dashboard/js/pages/be_comp_dialogs.min.js"></script>
<?= $this->endSection() ?>