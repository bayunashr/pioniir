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
                     <th style="width: 10%;">Creator</th>
                     <th style="width: 35%;">Title</th>
                     <th style="width: 5%;">Content</th>
                     <th style="width: 10%;">Status</th>
                     <th style="width: 10%;">Price</th>
                     <th style="width: 5%;">Preview</th>
                     <th style="width: 5%;">Download</th>
                     <th style="width: 10%;">Like</th>
                     <th style="width: 10%;">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($content as $data => $value): ?>
                  <tr>
                     <td class="text-center fs-sm"><?= $no++; ?></td>
                     <td class="d-none fw-semibold fs-sm"><?= $value['contentId'] ?></td>
                     <td class="fw-semibold fs-sm"><?= esc($value['creator_name']) ?></td>
                     <td class="fs-sm">
                        <?= esc($value['contentTitle']) ?>
                     </td>
                     <td class="fs-sm">
                        <button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="bottom" title="Content" data-bs-content="<?= $value['contentValue'] ?>"><i class="nav-main-link-icon si si-magnifier-add"></i></button>
                     </td>
                     <td class="text-center">
                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"><?= $value['contentStatus'] ?></span>
                     </td>
                     <td class="fs-sm">
                        <?= format_rupiah($value['contentPrice']) ?>
                     </td>
                     <td class="fs-sm">
                        <button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="left" title="Preview Image"
                           data-bs-content="<div class='text-center'><img class='w-100' src='<?= base_url() ?>assets/dashboard/media/photos/photo32.jpg' alt=''></div>"><i class="nav-main-link-icon si si-magnifier-add"></i></button>
                     </td>
                     <td class="text-center">
                        <button type="button" class="btn btn-alt-primary w-100" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="left" title="Download Image"
                           data-bs-content="<div class='text-center'><img class='w-100' src='<?= base_url() ?>assets/dashboard/media/photos/photo32.jpg' alt=''></div>"><i class="nav-main-link-icon si si-magnifier-add"></i></button>
                     </td>
                     <td class="fs-sm">
                        <?= $value['contentLike'] ?>
                     </td>
                     <td class="text-center">
                        <?php if($value['contentStatus'] == 'ban') : ?>
                        <button id="tombol" action-type="unban" data-type="content" content-id="<?= $value['contentId'] ?>" content-title="<?= $value['contentTitle'] ?>" class="btn btn-sm btn-alt-danger js-swal-confirm">
                           <i class="fa fa-fw fa-circle-notch"></i> Unban
                        </button>
                        <?php else : ?>
                        <button id="tombol" action-type="ban" data-type="content" content-id="<?= $value['contentId'] ?>" content-title="<?= $value['contentTitle'] ?>" class="btn btn-sm btn-alt-danger js-swal-confirm">
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
function escapeHtml(text) {
   const map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
   };
   return text.replace(/[&<>"']/g, function(m) {
      return map[m];
   });
}

<?php if (session()->getFlashdata('success')) : ?>
var pesan = <?= json_encode(session()->getFlashdata('success')) ?>;
Swal.fire({
   title: "Good job!",
   text: pesan,
   icon: "success"
});
<?php endif; ?>

$(document).on('click', '#tombol', function() {
   const id = this.getAttribute('content-id');
   const title = this.getAttribute('content-title');
   const action = this.getAttribute('action-type');
   const type = this.getAttribute('data-type');
   var customTitle;
   if (action == "ban") {
      customTitle = "Ban ";
   } else {
      customTitle = "Unban ";
   }
   Swal.fire({
      title: customTitle + escapeHtml(title) + "?",
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