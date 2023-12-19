<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>
<?php if (empty($content)) : ?>
<h4 class="text-center">Belum Ada Konten</h4>
<?php else:  ?>
<h4>Content</h4>
<div class="row">
   <?php foreach ($content as $key => $value) :?>
   <?php
        $isFree = ($value['contentPrice'] == null || $value['contentPrice'] == 0);
        $isSubscribed = count($ceksubs) >= 1;
        $isBought = false;
        $isCreator = ($creator != null && ($creator[0]['creatorId'] == $creatorData[0]['creatorId']));
        foreach ($dataBuy as $key => $data) {
            if ($data['contentId'] == $value['contentId']) {
                $isBought = true;
                break;
            }
        }
        ?>

   <div class="col-sm-12 col-md-6 col-lg-4 mt-5">
      <div class="card shadow-lg lift">
         <!-- Jika free dan Subscribe -->
         <?php if ($isFree && $user['userId'] == null) : ?>
         <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;">
            <a href="<?= base_url('login') ?>" class="rounded-top blur-img d-flex align-items-center justify-content-center text-center text-white fw-bold fs-20 px-sm-2 px-4" style="height: 150px;cursor:pointer;">
               <span>Login Untuk Akses Konten Ini <i class="uil uil-padlock"></i></span>
            </a>
         </div>
         <div class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </div>
         <?php elseif ($isFree || $isSubscribed || $isCreator) : ?>
         <a href="<?= base_url('view/content/'.$value['contentId']) ?>">
            <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/uploads/thumbnail/<?= $value['contentPreview'] ?>');background-position: center;background-size: cover;"></div>
         </a>
         <a href="<?= base_url('view/content/'.$value['contentId']) ?>" class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </a>
         <!-- Buy content -->
         <?php elseif ((!$isFree) && count($dataBuy) >= 1):?>
         <?php if ($isBought):  ?>
         <a href="<?= base_url('view/content/'.$value['contentId']) ?>">
            <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/uploads/thumbnail/<?= $value['contentPreview'] ?>');background-position: center;background-size: cover;"></div>
         </a>
         <a href="<?= base_url('view/content/'.$value['contentId']) ?>" class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </a>
         <?php else:?>
         <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;">
            <div data-bs-toggle="modal" data-bs-target="#modal-buy" id="tombolDetailBuy" class="rounded-top blur-img d-flex align-items-center justify-content-center text-center text-white fw-bold fs-20 px-sm-2 px-4" data-name="<?= $value['contentTitle'] ?>"
               data-harga="<?= $value['contentPrice'] ?>" data-id="<?= $value['contentId'] ?>" style="height: 150px;cursor:pointer;">
               <span>Beli atau subscribe untuk akses konten ini <i class="uil uil-padlock"></i></span>
            </div>
         </div>
         <div class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </div>
         <?php endif;?>
         <?php else: ?>
         <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;">
            <div data-bs-toggle="modal" data-bs-target="#modal-buy" id="tombolDetailBuy" class="rounded-top blur-img d-flex align-items-center justify-content-center text-center text-white fw-bold fs-20 px-sm-2 px-4" data-name="<?= $value['contentTitle'] ?>"
               data-harga="<?= $value['contentPrice'] ?>" data-id="<?= $value['contentId'] ?>" style="height: 150px;cursor:pointer;">
               <span>Beli atau subscribe untuk akses konten ini <i class="uil uil-padlock"></i></span>
            </div>
         </div>
         <div class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['contentTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </div>
         <?php endif?>
         <div class="d-flex justify-content-between px-4">
            <p class="fs-20"><a class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart-solid.svg" alt=""> <?= $value['contentLike'] ?></a></p>
            <!-- Jika dia subscribe namun content tidak free -->
            <?php if((!$isFree) || $isSubscribed || $isCreator):?>
            <p class="fs-20"><span class="badge bg-green"><?= format_rupiah($value['contentPrice']) ?></span></p>
            <?php else: ?>
            <p class="fs-20"><span class="badge bg-green">Free</span></p>
            <?php endif;?>
         </div>
      </div>
   </div>
   <?php endforeach?>

</div>
<?php endif ?>
<?= $this->endsection() ?>