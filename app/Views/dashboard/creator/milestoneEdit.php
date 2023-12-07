<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <div class="block block-rounded">
         <div class="block-header block-header-default">
            <h3 class="block-title">Edit Milestone</h3>
         </div>
         <div class="block-content block-content-full">
            <form action="<?= base_url('dashboard/milestone/edit/'.$miles['milestoneId']) ?>" method="post">
               <div class="mb-4">
                  <label class="form-label" for="milestoneName">Milestone Name</label>
                  <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="milestoneName" name="milestoneName" value="<?= $miles['milestoneName']?>">
               </div>
               <div class="mb-4">
                  <label class="form-label" for="milestoneTarget">Target</label>
                  <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="number" class="form-control" id="milestoneTarget" name="milestoneTarget" value="<?= $miles['milestoneTarget']?>">
               </div>
               <div class="mb-4">
                  <label class="form-label" for="milestonetStatus">Status</label>
                  <select class="form-select" id="milestonetStatus" name="milestoneStatus">
                     <?php if($miles['milestoneStatus'] === "publish" || $miles['milestoneStatus'] === "archive") : ?>
                     <option <?= ($miles['milestoneStatus'] === 'archive') ? 'selected' : '' ?> value="archive">Archive</option>
                     <?php elseif($miles['milestoneStatus'] === "draft") :?>
                     <option <?= ($miles['milestoneStatus'] === 'draft') ? 'selected' : '' ?> value="draft">Draft</option>
                     <?php endif; ?>
                     <option <?= ($miles['milestoneStatus'] === 'publish') ? 'selected' : '' ?> value="publish">Publish</option>
                  </select>
               </div>
               <button type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">Update</button>
            </form>
         </div>
      </div>
      <!-- END Dynamic Table with Export Buttons -->
   </div>
   <!-- END Page Content -->
</main>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
<?php if(session()->getFlashdata('alert')) : ?>
var pesan = <?= json_encode(session()->getFlashdata('alert')) ?>;
Swal.fire({
   icon: "error",
   title: "Oops...",
   text: pesan,
});
<?php endif; ?>
</script>
<?= $this->endsection() ?>