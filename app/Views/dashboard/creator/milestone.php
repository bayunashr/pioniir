<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
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
            <a href="<?= base_url('dashboard/milestone/add') ?>" class="btn btn-sm btn-outline-secondary mb-4"><i class="nav-main-link-icon fa fa-plus"></i> Add Milestone</a>
            <?php if (count($milespublish) == 1) :?>
            <div class="row">
               <div class="col-12 col-sm-3">
                  <span class="h5"><?= $milespublish[0]['milestoneName'] ?></span> <br>
                  <span style="font-size: 13px;"><?= format_rupiah($milespublish[0]['milestoneBalance']) ?> terkumpul dari <?= format_rupiah($milespublish[0]['milestoneTarget']) ?> </span>
                  <div class="progress push" role="progressbar" aria-valuenow="<?= format_persen_miles_creator($milespublish[0]['milestoneBalance'], $milespublish[0]['milestoneTarget']) ?>" aria-valuemin="0" aria-valuemax="100">
                     <div class="progress-bar bg-info" style="width: <?= format_persen_miles_creator($milespublish[0]['milestoneBalance'], $milespublish[0]['milestoneTarget']) ?>%;">
                        <span class="fs-sm fw-semibold"><?= format_persen_miles_creator($milespublish[0]['milestoneBalance'], $milespublish[0]['milestoneTarget']) ?>%</span>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif;?>
            <p class="fw-bold h3 mt-4">Milestone History</p>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
               <thead>
                  <tr>
                     <th class="text-center" style="width: 5%;">NO</th>
                     <th class="d-none" style="width: 15%;">ID</th>
                     <th>Nama</th>
                     <th>Balance</th>
                     <th>Target</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($miles as $data => $value): ?>
                  <tr>
                     <td class="text-center fs-sm"><?= $no++ ?></td>
                     <td class="d-none fw-semibold fs-sm"><?= $value['milestoneId'] ?></td>
                     <td class="fw-semibold fs-sm"><?= $value['milestoneName'] ?></td>
                     <td class="fs-sm"><?= format_rupiah($value['milestoneBalance']) ?></td>
                     <td class="fs-sm"><?= format_rupiah($value['milestoneTarget']) ?></td>
                     <td class="fs-sm">
                        <h5>
                           <?php if ($value['milestoneStatus'] === 'archive' ) : ?>
                           <span class="badge bg-info"><i class="fa fa-exclamation-circle"></i> Archive</span>
                           <?php elseif ($value['milestoneStatus'] === 'publish' ) : ?>
                           <span class="badge bg-success"><i class="fa fa-check"></i> Publish</span>
                           <?php elseif ($value['milestoneStatus'] === 'draft' ) : ?>
                           <span class="badge bg-info"><i class="fa fa-pencil"></i> Draft</span>
                           <?php elseif ($value['milestoneStatus'] === 'ended' ) : ?>
                           <span class="badge bg-danger"><i class="fa fa-times-circle"></i> Ended</span>
                           <?php else : ?>
                           <span class="badge bg-danger"><i class="fa fa-ban"></i> Ban</span>
                           <?php endif; ?>
                        </h5>
                     </td>
                     <td class="fs-sm">
                        <?php if ($value['milestoneStatus'] != 'ended' ) : ?>
                        <a href="<?= base_url('dashboard/milestone/edit/'.$value['milestoneId']) ?>" class="btn btn-sm btn-info mb-4"><i class="nav-main-link-icon si si-pencil"></i> Edit</a> &nbsp;
                        <btn id="tombol" data-id="<?= $value['milestoneId'] ?>" class="btn btn-sm btn-danger mb-4 js-swal-confirm"><i class="nav-main-link-icon si si-trash"></i> Ended</btn>
                        <?php endif; ?>
                     </td>
                  </tr>
                  <?php endforeach;?>
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
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url('') ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>

<script>
<?php if(session()->getFlashdata('success')) : ?>
var pesan = <?= json_encode(session()->getFlashdata('success')) ?>;
Swal.fire({
   title: "Good job!",
   text: pesan,
   icon: "success"
});
<?php endif; ?>

$(document).on('click', '#tombol', function() {
   const id = this.getAttribute('data-id');
   Swal.fire({
      title: "Apakah ingin mengakhiri milestone ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Iya!",
      cancelButtonText: "Ga Dulu!",
   }).then((result) => {
      if (result.isConfirmed) {
         window.location.href = `<?= base_url('dashboard/milestone/ended/') ?>${id}`;
      }
   });
});
</script>
<?= $this->endsection() ?>