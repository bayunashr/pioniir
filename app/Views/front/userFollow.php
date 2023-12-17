<?= $this->extend('front/templateUser') ?>

<?= $this->section('pages') ?>
<h4>Subscribed Creator</h4>
<div class="row">
   <?php if (empty($dataSubs)) : ?>
   <h3 class="text-center mt-4 text-secondary">Data Kosong</h3>
   <?php else : ?>
   <?php foreach ($dataSubs as $key => $value) :?>
   <div class="col-sm-6 col-12 mt-5">
      <a href="#" class="card shadow-lg lift">
         <div class="card-body px-4 pt-4 pb-3">
            <div class="row">
               <div class="col-4 col-sm-3">
                  <img class="rounded-circle w-100" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $value['userAvatar'] ?>" alt="" />
               </div>
               <div class="col-8 col-sm-9">
                  <p class="fs-20 fw-bolder text-dark mb-n1 mt-2"><?= $value['creatorAlias'] ?></p>
                  <p class="fs-12 meta mt-1"><?= date('d F Y', strtotime($value['subTimestamp'])); ?></p>
               </div>
            </div>
         </div>
      </a>
   </div>
   <?php endforeach; ?>
   <?php endif?>
</div>

<?= (empty($dataSubs)) ? null : $pager->links('default', 'paginate_custom') ?>
<?= $this->endsection() ?>