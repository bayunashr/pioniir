<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>

<?php if (empty($post)) : ?>
<h4 class="text-center">Belum Ada Postingan</h4>
<?php else:  ?>
<h4>Post</h4>
<div class="row">
   <?php foreach ($post as $key => $value) :?>
   <div class="col-sm-6 col-12 mt-5">
      <div class="card shadow-lg lift">
         <div class="card-body px-4 py-4">
            <h5 class="mb-1"><?= $value['postTitle'] ?></h5>
            <div class="meta mb-2 fs-12"><?= date('d F Y', strtotime($value['createdAt'])); ?></div>
         </div>
         <div class="d-flex justify-content-between px-4">
            <p class="fs-20"><a class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart-solid.svg" alt=""> <?= $value['postLike'] ?></a></p>
            <a href="<?= base_url('view/post/'.$value['postId']) ?>" class="btn btn-sm btn-outline-navy rounded btn-login mb-2">See more</a>
         </div>
      </div>
   </div>
   <?php endforeach;?>
</div>
<?php endif ?>
<?= $this->endsection() ?>