<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container pt-10 pt-md-10 text-center">
   <div class="input-group input-group-sm mb-4">
      <input id="textInputExample" type="text" class="form-control" placeholder="Search" aria-describedby="button-addon2">
      <button class="btn btn-navy" type="button" id="button-addon2">Search</button>
   </div>
   <div class="swiper-container mb-4" data-margin="10" data-nav="false" data-dots="false" data-items-xl="8" data-items-md="7" data-items-xs="3">
      <div class="swiper">
         <div class="swiper-wrapper p-2">
            <div class="swiper-slide w-auto"><a class="text-white fw-bold btn btn-sm btn-navy" href="#">All</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Animation</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Art</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Blogging</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Comics & Cartoon</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Commissions</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Cosplay</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Dance & Theatre</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Design</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Drawing & Painting</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Education</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Food & Drinks</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Fundraising</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Gaming</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Health & Fitness</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Lifestyle</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Music</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Podcast</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Science & Tech</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Streaming</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Video & Film</a></div>
            <div class="swiper-slide w-auto"><a class="text-navy btn btn-sm btn-light" href="#">Writing</a></div>
         </div>
         <!--/.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
   </div>
   <!-- /.swiper-container -->
   <div class="position-relative px-5">
      <div class="row grid-view gy-6 gy-xl-0">
         <div class="col-md-6 col-xl-3 mt-5">
            <div class="card shadow-lg">
               <div class="wrapper rounded-top" style="height: 120px;background-image:url('<?= base_url() ?>assets/front/img/bannercreator.png');background-position: center;background-size: cover;"></div>
               <div class="card-body px-4 py-4">
                  <img class="rounded-circle w-13 mb-4" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                  <h5 class="mb-1">Coriss Ambady</h5>
                  <div class="meta mb-2 fs-12">Tag 1 | Tag 2 | Tag 3 | Tag 4 | Tag 5</div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3 mt-5">
            <div class="card shadow-lg">
               <div class="wrapper rounded-top" style="height: 120px;background-image:url('<?= base_url() ?>assets/front/img/bannercreator.png');background-position: center;background-size: cover;"></div>
               <div class="card-body px-4 py-4">
                  <img class="rounded-circle w-13 mb-4" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                  <h5 class="mb-1">Coriss Ambady</h5>
                  <div class="meta mb-2 fs-12">Tag 1 | Tag 2 | Tag 3 | Tag 4 | Tag 5</div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3 mt-5">
            <div class="card shadow-lg">
               <div class="wrapper rounded-top" style="height: 120px;background-image:url('<?= base_url() ?>assets/front/img/bannercreator.png');background-position: center;background-size: cover;"></div>
               <div class="card-body px-4 py-4">
                  <img class="rounded-circle w-13 mb-4" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                  <h5 class="mb-1">Coriss Ambady</h5>
                  <div class="meta mb-2 fs-12">Tag 1 | Tag 2 | Tag 3 | Tag 4 | Tag 5</div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3 mt-5">
            <div class="card shadow-lg">
               <div class="wrapper rounded-top" style="height: 120px;background-image:url('<?= base_url() ?>assets/front/img/bannercreator.png');background-position: center;background-size: cover;"></div>
               <div class="card-body px-4 py-4">
                  <img class="rounded-circle w-13 mb-4" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                  <h5 class="mb-1">Coriss Ambady</h5>
                  <div class="meta mb-2 fs-12">Tag 1 | Tag 2 | Tag 3 | Tag 4 | Tag 5</div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3 mt-5">
            <div class="card shadow-lg">
               <div class="wrapper rounded-top" style="height: 120px;background-image:url('<?= base_url() ?>assets/front/img/bannercreator.png');background-position: center;background-size: cover;"></div>
               <div class="card-body px-4 py-4">
                  <img class="rounded-circle w-13 mb-4" src="<?= base_url() ?>assets/dashboard/media/avatars/avatar10.jpg" alt="" />
                  <h5 class="mb-1">Coriss Ambady</h5>
                  <div class="meta mb-2 fs-12">Tag 1 | Tag 2 | Tag 3 | Tag 4 | Tag 5</div>
               </div>
            </div>
         </div>
      </div>
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
</div>
<?= $this->endsection() ?>