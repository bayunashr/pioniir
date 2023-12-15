<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>
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
            <p class="fs-20"><a href="#" class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart.svg" alt=""> <?= $value['postLike'] ?></a></p>
            <a href="#" class="btn btn-sm btn-outline-navy rounded btn-login mb-2">See more</a>
         </div>
      </div>
   </div>
   <?php endforeach;?>
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