<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
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
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
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
                  <?php $no = 1 ?>
                  <?php foreach ($content as $data) : ?>
                  <tr>
                     <td class="text-center fs-sm"><?= $no++ ?></td>
                     <td class="fw-semibold fs-sm"><?= $data['contentTitle'] ?></td>
                     <td class="fs-sm"><?= $data['contentLike'] ?></td>
                     <td class="fs-sm"><?= format_rupiah($data['contentPrice']) ?></td>
                     <td class="fs-sm">
                        <h5>
                           <?php if ($data['contentStatus'] == 'publish') : ?>
                           <span class="badge bg-success"><i class="fa fa-check"></i> Publish</span>
                           <?php elseif ($data['contentStatus'] == 'draft') : ?>
                           <span class="badge bg-info"><i class="fa fa-pencil"></i> Draft</span>
                           <?php elseif ($data['contentStatus'] == 'ban') : ?>
                           <span class="badge bg-danger"><i class="fa fa-ban"></i> Ban</span>
                           <?php else : ?>
                           <span class="badge bg-info"><i class="fa fa-exclamation-circle"></i> Archive</span>
                           <?php endif ?>
                        </h5>
                     </td>
                     <td class="fs-sm">
                        <?php if ($data['contentStatus'] != 'ban' ) : ?>
                        <a href="<?= base_url('dashboard/content/edit/'.$data['contentId']) ?>" class="btn btn-sm btn-info mb-4"><i class="nav-main-link-icon si si-pencil"></i> Edit</a> &nbsp;
                        <btn id="tombol" data-id="<?= $data['contentId'] ?>" class="btn btn-sm btn-danger mb-4 js-swal-confirm"><i class="nav-main-link-icon si si-trash"></i> Delete</btn>
                        <?php endif; ?>
                     </td>
                  </tr>
                  <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!-- END Page Content -->
</main>
<?= $this->endsection() ?>

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
<script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>

<script>
// Sweet Alert
<?php if (session()->getFlashdata('success')) : ?>
var pesan = <?= json_encode(session()->getFlashdata('success')) ?>;
Swal.fire({
   title: "Good job!",
   text: pesan,
   icon: "success"
});
<?php endif; ?>
<?php if(session()->getFlashdata('error')) : ?>
var pesan = <?= json_encode(session()->getFlashdata('error')) ?>;
Swal.fire({
   title: "Oops...",
   text: pesan,
   icon: "error"
});
<?php endif; ?>

$(document).on('click', '#tombol', function() {
   const id = this.getAttribute('data-id');
   Swal.fire({
      title: "Apakah ingin menghapus data ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Iya!",
      cancelButtonText: "Ga Dulu!",
   }).then((result) => {
      if (result.isConfirmed) {
         window.location.href = `<?= base_url('dashboard/content/delete/') ?>${id}`;
      }
   });
});
</script>
<?= $this->endsection() ?>