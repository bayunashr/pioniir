<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>
<?php if (empty($content)) : ?>
<h4 class="text-center">Belum Ada Konten</h4>
<?php else:  ?>
<h4>Content</h4>
<div class="row">
   <?php foreach ($content as $key => $value) :?>
   <?php if ($value['contentPrice'] == null || $value['contentPrice'] == 0) :?>
   <div class="col-sm-4 col-12 mt-5">
      <div class="card shadow-lg lift">
         <a href="#">
            <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;"></div>
         </a>
         <a href="#" class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </a>
         <div class="d-flex justify-content-between px-4">
            <p class="fs-20"><a href="#" class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart.svg" alt=""> <?= $value['contentLike'] ?></a></p>
            <p class="fs-20"><span class="badge bg-green">Free</span></p>
         </div>
      </div>
   </div>
   <?php else : ?>
   <div class="col-sm-4 col-12 mt-5">
      <div class="card shadow-lg lift">
         <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;">
            <div data-bs-toggle="modal" data-bs-target="#modal-buy" class="rounded-top blur-img d-flex align-items-center justify-content-center text-center text-white fw-bold fs-20 px-sm-1 px-4" style="height: 150px;cursor:pointer;">
               <span>Beli atau subscribe untuk akses konten ini <i class="uil uil-padlock"></i></span>
            </div>
         </div>
         <div class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </div>
         <div class="d-flex justify-content-between px-4">
            <p class="fs-20"><a href="#" class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart-solid.svg" alt=""> <?= $value['contentLike'] ?></a></p>
            <p class="fs-20"><span class="badge bg-secondary"><?= format_rupiah($value['contentPrice']) ?></span></p>
         </div>
      </div>
   </div>
   <?php endif ?>
   <?php endforeach?>
</div>
<?php endif ?>
<?= $this->endsection() ?>