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
        <h3 class="block-title">Manage Your Content</h3>
      </div>
      <div class="block-content block-content-full">
        <a href="<?= base_url('dashboard/content/add') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="nav-main-link-icon fa fa-plus"></i> Add Content</a>
        <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
          <thead>
            <tr>
              <th class="text-center" style="width: 5%;">NO</th>
              <th>Title</th>
              <th>Like</th>
              <th>Price</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center fs-sm">1</td>
              <td class="fw-semibold fs-sm">Podcast 1</td>
              <td class="fs-sm">12</td>
              <td class="fs-sm">150000</td>
              <td class="fs-sm">
                <!-- Pilih salah satu -->
                <a href="#" class="btn btn-sm btn-success mb-4"><i class="nav-main-link-icon si si-pencil"></i> Publish</a> &nbsp;
                <a href="#" class="btn btn-sm btn-warning mb-4"><i class="nav-main-link-icon si si-pencil"></i> Hide</a>
              </td>
              <td class="fs-sm">
                <a href="<?= base_url('dashboard/content/edit/1') ?>" class="btn btn-sm btn-info mb-4"><i class="nav-main-link-icon si si-pencil"></i> Edit</a> &nbsp;
                <a href="#" class="btn btn-sm btn-danger mb-4"><i class="nav-main-link-icon si si-trash"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td class="text-center fs-sm">2</td>
              <td class="fw-semibold fs-sm">Podcast 2</td>
              <td class="fs-sm">12</td>
              <td class="fs-sm">160000</td>
              <td class="fs-sm">
                <!-- Pilih salah satu -->
                <a href="#" class="btn btn-sm btn-success mb-4"><i class="nav-main-link-icon si si-pencil"></i> Publish</a> &nbsp;
                <a href="#" class="btn btn-sm btn-warning mb-4"><i class="nav-main-link-icon si si-pencil"></i> Hide</a>
              </td>
              <td class="fs-sm">
                <a href="<?= base_url('dashboard/content/edit/1') ?>" class="btn btn-sm btn-info mb-4"><i class="nav-main-link-icon si si-pencil"></i> Edit</a> &nbsp;
                <a href="#" class="btn btn-sm btn-danger mb-4"><i class="nav-main-link-icon si si-trash"></i> Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- END Page Content -->
</main>
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