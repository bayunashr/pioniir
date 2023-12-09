<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container pt-10 pt-md-10 text-center">
   <form action="" method="get">
      <div class="input-group input-group-sm mb-4">
         <input id="textInputExample" type="text" class="form-control" name="search" placeholder="Search" aria-describedby="button-addon2">
         <button class="btn btn-navy" type="submit" id="button-addon2">Search</button>
      </div>
   </form>
   <div class="swiper-container mb-4" data-margin="10" data-nav="false" data-dots="false" data-items-xl="8" data-items-md="7" data-items-xs="3">
      <div class="swiper">
         <div class="swiper-wrapper p-2">
            <div class="swiper-slide w-auto"><a class="fw-bold btn btn-sm <?= current_url(true)->getSegment(2) != null ?  'text-navy btn-light' : 'text-white btn-navy' ?>" href="<?= base_url('explore')?>">All</a></div>
            <?php foreach ($options as $data): ?>
            <div class="swiper-slide w-auto" data-name="<?= strtolower($data)?>"><a class="btn btn-sm <?= current_url(true)->getSegment(2) == strtolower(str_replace(" ", "-", $data)) ? 'text-white btn-navy' : 'text-navy btn-light' ?>"
                  href="<?= base_url('explore/'.strtolower(str_replace(" ", "-", $data)))?>"><?= $data ?></a></div>
            <?php endforeach;?>
         </div>
         <!--/.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
   </div>
   <!-- /.swiper-container -->
   <div class="position-relative px-5">
      <div class="row grid-view gy-6 gy-xl-0">
         <?php if (!empty($creatorList)) :?>
         <?php foreach ($creatorList as $key => $value): ?>
         <div class="col-md-6 col-xl-3 mt-5">
            <div class="card shadow-lg">
               <div class="wrapper rounded-top" style="height: 120px;background-image:url('<?= base_url() ?>assets/front/img/bannercreator.png');background-position: center;background-size: cover;"></div>
               <div class="card-body px-4 py-4">
                  <img class="rounded-circle w-13 mb-4" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" alt="" />
                  <h5 class="mb-1"><?= esc($value['creatorAlias']) ?></h5>
                  <div class="meta mb-2 fs-12"><?= str_replace(",", " | ", $value['creatorTag'])  ?></div>
               </div>
            </div>
         </div>
         <?php endforeach;?>
         <?php else : ?>
         <div class="text-center my-5">
            <h1 class="my-5 fs-100"><i class=""></i>Oops!</h1>
            <h3>No results found</h3>
            "<?= esc(request()->getGet('search')) ?>"
         </div>
         <?php endif;?>
      </div>
   </div>
   <?php if (!empty($creatorList)) :?>
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
   <?php endif; ?>
</div>
<?= $this->endsection() ?>