<?= $this->extend('dashboard/templates/admin-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
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
                     <th style="width: 25%;">Buyer</th>
                     <th style="width: 25%;">Creator</th>
                     <th style="width: 25%;">Content</th>
                     <th style="width: 25%;">Timestamp</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($buy as $data => $value): ?>
                  <tr>
                     <td class="text-center fs-sm"><?= $no++; ?></td>
                     <td class="d-none fw-semibold fs-sm"><?= $value['buyId'] ?></td>
                     <td class="fw-semibold fs-sm"><?= esc($value['user_name']) ?></td>
                     <td class="fw-semibold fs-sm"><?= esc($value['creatorAlias']) ?></td>
                     <td class="fs-sm">
                        <?= esc($value['content_title']) ?>
                     </td>
                     <td class="fs-sm">
                        <?= format_date($value['buyTimestamp']) ?>
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
<script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>

<!-- jQuery (required for DataTables plugin) -->
<script src="<?= base_url() ?>assets/dashboard/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
<?= $this->endSection() ?>