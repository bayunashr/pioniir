<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>
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
<nav class="d-flex mt-8 justify-content-center" aria-label="pagination">
   <ul class="pagination">
      <li class="page-item disabled">
         <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
         </a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
         <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
         </a>
      </li>
   </ul>
   <!-- /.pagination -->
</nav>
<?= $this->endsection() ?>