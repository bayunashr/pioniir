<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet"
   href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet"
   href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet"
   href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <div class="block block-rounded">
         <div class="block-header block-header-default">
            <h3 class="block-title">Notification History</h3>
         </div>
         <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
               <thead>
                  <tr>
                     <th class="text-center" style="width: 5%;">NO</th>
                     <th>Message</th>
                     <th>Time</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1 ?>
                  <?php foreach ($notifAll as $key => $value): ?>
                     <tr>
                        <td class="text-center fs-sm">
                           <?= $no++ ?>
                        </td>
                        <td class="fs-sm">
                           <?php
                           switch ($value->notificationType) {
                              case "bcontent":
                                 $icon = "fa-circle-xmark text-danger";
                                 $title = "Kontenmu Terblokir!";
                                 $text = "Konten " . '"' . esc($value->content_title) . '"' . " diblokir karena " . esc($value->notificationMessage);
                                 break;
                              case "ubcontent":
                                 $icon = "fa-circle-check text-success";
                                 $title = "Kontenmu Terbuka!";
                                 $text = "Konten " . '"' . esc($value->content_title) . '"' . " dibuka kembali karena " . esc($value->notificationMessage);
                                 break;
                              case "bpost":
                                 $icon = "fa-circle-xmark text-danger";
                                 $title = "Postinganmu Terblokir!";
                                 $text = "Post " . '"' . esc($value->post_title) . '"' . " diblokir karena " . esc($value->notificationMessage);
                                 break;
                              case "ubpost":
                                 $icon = "fa-circle-check text-success";
                                 $title = "Postinganmu Terbuka!";
                                 $text = "Post " . '"' . esc($value->post_title) . '"' . " dibuka kembali karena " . esc($value->notificationMessage);
                                 break;
                              case "bcomment":
                                 $icon = "fa-circle-xmark text-danger";
                                 $title = "Komentarmu Terblokir!";
                                 $text = "Komentar " . '"' . esc($value->comment_value) . '"' . " diblokir karena " . esc($value->notificationMessage);
                                 break;
                              case "ubcomment":
                                 $icon = "fa-circle-check text-success";
                                 $title = "Komentarmu Terbuka!";
                                 $text = "Komentar " . '"' . esc($value->comment_value) . '"' . " dibuka kembali karena " . esc($value->notificationMessage);
                                 break;
                              case "buser":
                                 $icon = "fa-circle-xmark text-danger";
                                 $title = "Akunmu Terblokir!";
                                 $text = "Akun " . '"' . esc($value->user_name) . '"' . " diblokir karena " . esc($value->notificationMessage);
                                 break;
                              case "ubuser":
                                 $icon = "fa-circle-check text-success";
                                 $title = "Akunmu Terbuka!";
                                 $text = "Akun " . '"' . esc($value->user_name) . '"' . " dibuka kembali karena " . esc($value->notificationMessage);
                                 break;
                              case "ndonate":
                                 $icon = "fa-money-bill-1 text-success";
                                 $title = "Donasi Diterima!";
                                 $text = "Kamu menerima " . format_rupiah($value->donate_amount) . " dari " . '"' . esc($value->donatur_name) . '"';
                                 break;
                              case "nsubscribe":
                                 $icon = "fa-compact-disc text-primary";
                                 $title = "Supporter Baru!";
                                 $text = '"' . esc($value->subscriber_name) . '"' . " mulai mengikuti";
                                 break;
                              case "nbuy":
                                 $icon = "fa-bag-shopping text-warning";
                                 $title = "Kontenmu Terjual!";
                                 $text = '"' . esc($value->buyer_name) . '"' . " membeli " . '"' . esc($value->content_buy_title) . '"';
                                 break;
                              case "nmilestone":
                                 $icon = "fa-rocket text-info";
                                 $title = "Milestone Tercapai!";
                                 $text = '"' . esc($value->miles_name) . '"' . " sudah mencapai batasnya";
                                 break;
                           }
                           ?>
                           <span class="fw-semibold">
                              <?= $title ?>
                           </span> -
                           <?= $text ?>
                        </td>
                        <td class="fs-sm">
                           <?= $value->createdAt ?>
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
<script
   src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script
   src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
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
<?= $this->endsection() ?>