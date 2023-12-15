<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>
<?php if (empty($donate)) : ?>
<h4 class="text-center">Tidak Ada Aktivitas</h4>
<?php else: ?>
<h4>Activity Feeds</h4>
<div class="row mb-4">
   <?php foreach ($donate as $key => $value) :?>
   <div class="col-sm-6 col-12 d-flex mt-6">
      <img class="rounded-circle w-13" src="<?= base_url() ?>assets/uploads/photo_profile/<?= empty($value['userAvatar']) ? '1.jpg' : $value['userAvatar'] ?>" alt="" />
      <div class="mx-3 d-flex flex-column align-self-center">
         <p class="m-0"><span class="fw-bold"><?= esc(potongString($value['donateName'])) ?></span> mentraktir <?= format_rupiah($value['donateAmount']) ?></p>
         <p class="m-0"><?= date('d F Y', strtotime($value['donateTimestamp'])); ?></p>
      </div>
   </div>
   <?php endforeach?>
</div>
<?php endif ?>
<?= $this->endsection() ?>