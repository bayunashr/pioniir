<?= $this->extend('dashboard/templates/admin-layout') ?>

<?= $this->section('header-addons') ?>
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
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
              <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">NO</th>
                    <th class="d-none" style="width: 15%;">ID</th>
                    <th style="width: 10%;">Username</th>
                    <th style="width: 10%;">Alias</th>
                    <th style="width: 25%;">Tag</th>
                    <th style="width: 15%;">Sub Price</th>
                    <th style="width: 15%;">Description</th>
                    <th style="width: 10%;">Banner</th>
                    <th style="width: 10%;">Balance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($creator as $data => $value): ?>
                  <tr>
                    <td class="text-center fs-sm"><?= $no++; ?></td>
                    <td class="d-none fw-semibold fs-sm"><?= $value['creatorId'] ?></td>
                    <td class="fw-semibold fs-sm"><?= $value['user_name'] ?></td>
                    <td class="fs-sm">
                      <?= $value['creatorAlias'] ?>
                    </td>
                    <td class="fs-sm">
                      <?= $value['creatorTag'] ?>
                    </td>
                    <td class="fs-sm">
                      <?= format_rupiah($value['creatorSubPrice']) ?>
                    </td>
                    <td class="fs-sm">
                      <button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="popover" data-bs-placement="left" title="Description" data-bs-content="<?= $value['creatorDescription'] ?>"><i class="nav-main-link-icon si si-magnifier-add"></i></button>
                    </td>
                    <td class="fs-sm">
                      <button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="left" title="Banner" data-bs-content="<div class='text-center'><img class='w-100' src='<?= base_url('') ?>assets/dashboard/media/photos/photo32.jpg' alt=''></div>"><i class="nav-main-link-icon si si-magnifier-add"></i></button>
                    </td>
                    <td class="fs-sm text-center">
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info"><?= $value['creatorBalance'] ?></span>
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

    <!-- Page JS Code -->
    <script src="<?= base_url('') ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
<?= $this->endSection() ?>