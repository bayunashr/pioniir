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
              <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">NO</th>
                    <th style="width: 10%;">Username</th>
                    <th class="d-none d-sm-table-cell" style="width: 10%;">Alias</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Tag</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Sub Price</th>
                    <th class="d-none d-sm-table-cell" style="width: 30%;">Description</th>
                    <th style="width: 10%;">Balance</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fs-sm"><button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="click" data-bs-placement="top" title="36c2ade6-5c02-4fd7-8995-ac7fc95378b1">1</button></td>
                    <td class="fw-semibold fs-sm">dvfuller</td>
                    <td class="d-none d-sm-table-cell fs-sm">
                      dvfuller
                    </td>
                    <td class="d-none d-sm-table-cell fs-sm">
                      3D Designer, 3D Artist
                    </td>
                    <td class="d-none d-sm-table-cell fs-sm">
                      50.000
                    </td>
                    <td class="d-none d-sm-table-cell fs-sm">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus explicabo doloribus consectetur sit assumenda ad in minus magni harum aliquid. Praesentium ut accusantium quo nihil rerum odio veritatis illum sed!
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">1.500.000</span>
                    </td>
                  </tr>
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