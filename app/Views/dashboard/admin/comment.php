<?= $this->extend('dashboard/templates/admin-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
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
                     <th style="width: 15%;">Username</th>
                     <th style="width: 25%;">Comment On</th>
                     <th style="width: 35%;">Comment</th>
                     <th style="width: 10%;">Status</th>
                     <th style="width: 10%;">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($comment as $data => $value): ?>
                  <tr>
                     <td class="text-center fs-sm"><?= $no++; ?></td>
                     <td class="d-none fw-semibold fs-sm"><?= $value['commentId'] ?></td>
                     <td class="fw-semibold fs-sm"><?= esc($value['user_name']) ?></td>
                     <td>
                        <a href="<?= base_url() ?>"><span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill <?= (($value['content_title'] == '') ? "bg-info-light text-info" : "bg-success-light text-success") ?>">
                              <?= ($value['content_title'] == '') ? "Post - ".esc($value['post_title']) : "Content - ".esc($value['content_title']) ?>
                           </span></a>
                     </td>
                     <td class="fs-sm">
                        <?= esc($value['commentValue']) ?>
                     </td>
                     <td class="text-center">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"><?= $value['commentStatus'] ?></span>
                     </td>
                     <td class="text-center">
                        <?php if($value['commentStatus'] == 'ban') : ?>
                        <button id="tombol" action-type="unban" data-type="comment" comment-id="<?= $value['commentId'] ?>" comment-value="<?= $value['commentValue'] ?>" class="btn btn-sm btn-alt-danger js-swal-confirm">
                           <i class="fa fa-fw fa-circle-notch"></i> Unban
                        </button>
                        <?php else : ?>
                        <button id="tombol" action-type="ban" data-type="comment" comment-id="<?= $value['commentId'] ?>" comment-value="<?= $value['commentValue'] ?>" class="btn btn-sm btn-alt-danger js-swal-confirm">
                           <i class="fa fa-fw fa-ban"></i> Ban
                        </button>
                        <?php endif ?>
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
<script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_comp_dialogs.min.js"></script>

<script>
$(document).on('click', '#tombol', function() {
   const id = this.getAttribute('comment-id');
   const value = this.getAttribute('comment-value');
   const action = this.getAttribute('action-type');
   const type = this.getAttribute('data-type');
   var customTitle;
   if (action == "ban") {
      customTitle = "Ban ";
   } else {
      customTitle = "Unban ";
   }
   Swal.fire({
      title: customTitle + "Komentar ?",
      text: value,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Woiya!",
      cancelButtonText: "Ga Dulu!",
      input: 'text',
      inputPlaceholder: 'Masukin alasan disini',
      inputAttributes: {
         maxlength: 255,
         autocapitalize: 'off',
         autocorrect: 'off'
      },
      inputValidator: (value) => {
         if (!value) {
            return 'Masukin alasannya!';
         }
      }
   }).then((result) => {
      if (result.isConfirmed) {
         const msg = Swal.getPopup().querySelector('input').value;

         if (action == "ban") {
            window.location.href = `<?= base_url('admin/ban/') ?>${id}?type=${type}&msg=${msg}`;
         } else {
            window.location.href = `<?= base_url('admin/unban/') ?>${id}?type=${type}&msg=${msg}`;
         }
      }
   });
});
</script>
<?= $this->endSection() ?>