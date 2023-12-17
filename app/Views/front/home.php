<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container pt-12 pt-md-16 text-center">
   <div class="row">
      <div class="col-lg-8 col-xxl-7 mx-auto text-center" data-group="page-title" data-delay="600">
         <h2 class="fs-16 text-uppercase ls-xl text-dark mb-4">Hello! This is Pioniir</h2>
         <h1 class="display-1 fs-58 mb-7">Welcome To <br> <span class="typer text-aqua" data-delay="100" data-words="Hub of Creativity,Visionary Oasis,Discovery Harbor">
            </span><span class="cursor text-aqua" data-owner="typer"></span> 
         </h1>
      </div>
      <!--/column -->
   </div>
   <!-- /.row -->
</div>
<!-- /.container -->
<figure class="position-relative mt-n10 mt-md-n12 mt-sm-n15"><img src="<?= base_url() ?>assets/front/img/doodlebackground.webp" alt="" /></figure>
<!-- /section -->
<section class="wrapper bg-light">
   <div class="container pt-11 pt-md-10 pb-1">
      <div class="row gy-10 gy-md-13 gy-lg-0 align-items-center mb-16">
         <div class="col-md-8 col-lg-5 d-flex position-relative mx-auto" data-group="header">
            <div class="img-mask"><img src="<?= base_url() ?>assets/front/img/ilus2.png" alt="" /></div>
         </div>
         <!--/column -->
         <div class="col-lg-6 offset-lg-1 col-xxl-5 text-center text-lg-start" data-group="page-title" data-delay="600">
            <h1 class="display-1 mb-5">Who are we?</h1>
            <p class="lead fs-20 lh-sm mb-7 px-md-10 px-lg-0">Pioniir merupakan platform fan-based funding yang didedikasikan untuk memberdayakan kreator dari berbagai bidang untuk
               menghubungkan, berkolaborasi, dan menerima dukungan finansial dari komunitas mereka.</p>
         </div>
         <!--/column -->
      </div>
   </div>
   <!-- /.container -->
</section>

<section class="wrapper pattern-wrapper bg-image py-15 px-3 px-sm-10" data-image-src="<?= base_url() ?>assets/front/img/pattern.webp">
   <div class="container">
      <div class="mb-10">
         <p class="fw-bolder h1 text-white text-center">How it Works?</p>
      </div>
      <div class="row">
         <div class="col-sm-4 col-md-4 col-12 mt-6">
            <div class="card bg-transparent text-white">
               <img class="rounded-circle w-100 mx-auto" src="<?= base_url() ?>assets/front/img/works1.webp" alt="" />
               <div class="card-body p-4 mt-4 bg-dark bg-opacity-50 rounded">
                  <p class="card-title text-white fw-bolder">1. Unggah Karya di Pioniir</p>
                  <p class="card-text fs-13">Unggah karya terbaikmu untuk dipersembahkan kepada supporter-supporter yang setia menemanimu.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-4 col-md-4 col-12 mt-6">
            <div class="card bg-transparent text-white">
               <img class="rounded-circle w-100 mx-auto" src="<?= base_url() ?>assets/front/img/works2.webp" alt="" />
               <div class="card-body p-4 mt-4 bg-dark bg-opacity-50 rounded">
                  <p class="card-title text-white fw-bolder">2. Raih Dukungan</p>
                  <p class="card-text fs-13">Bagikan link karya atau link pioniir mu di sosial media dan dapatkan dukungan dari supportermu.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-4 col-md-4 col-12 mt-6">
            <div class="card bg-transparent text-white">
               <img class="rounded-circle w-100 mx-auto" src="<?= base_url() ?>assets/front/img/works3.webp" alt="" />
               <div class="card-body p-4 mt-4 bg-dark bg-opacity-50 rounded">
                  <p class="card-title text-white fw-bolder">3. Tarik Dana</p>
                  <p class="card-text fs-13">Tarik dana donasi yang di dapat kan dari supporter-supportermu.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="container py-16 px-sm-1 px-4">
   <h3 class="display-3 mb-11 px-lg-8 px-xl-11 text-center">Pertanyaan umum <span class="text-gradient gradient-6">(FAQ)</span> Pioniir.</h3>
   <div class="row">
      <div class="col-lg-6 mb-0">
         <div id="accordion-1" class="accordion-wrapper">
            <div class="card accordion-item shadow-lg">
               <div class="card-header" id="accordion-heading-1-1">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-1" aria-expanded="false" aria-controls="accordion-collapse-1-1">Apa yang membedakan Pioniir dari platform lain?</button>
               </div>
               <!-- /.card-header -->
               <div id="accordion-collapse-1-1" class="collapse" aria-labelledby="accordion-heading-1-1" data-bs-target="#accordion-1">
                  <div class="card-body">
                     <p>Pioniir menawarkan kombinasi fitur langganan dan donasi, memberikan fleksibilitas kepada kreator
                        untuk mendapatkan pendapatan dari berbagai sumber, serta menyediakan ruang bagi penggemar untuk
                        berinteraksi lebih dekat dengan kreator kesayangan mereka.</p>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.collapse -->
            </div>
            <!-- /.card -->
            <div class="card accordion-item shadow-lg">
               <div class="card-header" id="accordion-heading-1-2">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-2" aria-expanded="false" aria-controls="accordion-collapse-1-2">Bagaimana cara penggemar berlangganan dan memberikan donasi?</button>
               </div>
               <!-- /.card-header -->
               <div id="accordion-collapse-1-2" class="collapse" aria-labelledby="accordion-heading-1-2" data-bs-target="#accordion-1">
                  <div class="card-body">
                     <p>Penggemar dapat berlangganan dan memberikan donasi kepada kreator melalui profil kreator mereka di Pioniir.
                        Cukup pilih opsi yang diinginkan dan ikuti petunjuknya.</p>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.collapse -->
            </div>
            <!-- /.card -->
            <div class="card accordion-item shadow-lg">
               <div class="card-header" id="accordion-heading-1-3">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-3" aria-expanded="false" aria-controls="accordion-collapse-1-3">Bagaimana saya dapat menarik dana yang saya peroleh?</button>
               </div>
               <!-- /.card-header -->
               <div id="accordion-collapse-1-3" class="collapse" aria-labelledby="accordion-heading-1-3" data-bs-target="#accordion-1">
                  <div class="card-body">
                     <p>Anda dapat menarik dana yang Anda peroleh sebagai kreator melalui opsi penarikan dana di dashboard Pioniir Anda.</p>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.collapse -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.accordion-wrapper -->
      </div>
      <!--/column -->
      <div class="col-lg-6">
         <div id="accordion-2" class="accordion-wrapper">
            <div class="card accordion-item shadow-lg">
               <div class="card-header" id="accordion-heading-2-1">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-1" aria-expanded="false" aria-controls="accordion-collapse-2-1">Apakah Pioniir mengenakan biaya untuk mendaftar sebagai kreator?</button>
               </div>
               <!-- /.card-header -->
               <div id="accordion-collapse-2-1" class="collapse" aria-labelledby="accordion-heading-2-1" data-bs-target="#accordion-2">
                  <div class="card-body">
                     <p>Tidak, mendaftar sebagai kreator di Pioniir tidak dikenakan biaya.</p>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.collapse -->
            </div>
            <!-- /.card -->
            <div class="card accordion-item shadow-lg">
               <div class="card-header" id="accordion-heading-2-2">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2">Metode pembayaran apa yang dipakai oleh Pioniir?</button>
               </div>
               <!-- /.card-header -->
               <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-bs-target="#accordion-2">
                  <div class="card-body">
                     <p>Transaksi seperti donate atau subscribe menggunakan QRIS sebagai metode pembayaran</p>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.collapse -->
            </div>
            <!-- /.card -->
            <div class="card accordion-item shadow-lg">
               <div class="card-header" id="accordion-heading-2-3">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-3" aria-expanded="false" aria-controls="accordion-collapse-2-3">Apakah ada potongan biaya?</button>
               </div>
               <!-- /.card-header -->
               <div id="accordion-collapse-2-3" class="collapse" aria-labelledby="accordion-heading-2-3" data-bs-target="#accordion-2">
                  <div class="card-body">
                     <p>Pioniir mengenakan biaya layanan sebesar 3% dari setiap dukungan yang diterima oleh kreator.</p>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.collapse -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.accordion-wrapper -->
      </div>
      <!--/column -->
   </div>
</div>

<section class="wrapper gradient-6">
   <div class="container py-10 py-md-14 text-center">
      <div class="row">
         <div class="col-md-9 col-lg-7 col-xl-7 mx-auto text-center">
            <img src="<?= base_url() ?>assets/front/img/pioniir.png" class=" svg-inject icon-svg icon-svg-md mb-4" alt="" />
            <h2 class="display-4 mb-3 text-white">Join Our Community</h2>
            <p class="lead fs-lg mb-6 px-xl-10 px-xxl-15 text-white">Jadilah bagian dari revolusi kreativitas! Bergabunglah dengan Pioniir sekarang dan wujudkan ide-ide unik Anda bersama komunitas kreatif kami.</p>
            <?php if (session()->has('loginUser') && session()->has('userName') && session()->has('userFullName') && session()->has('userEmail')) : ?>
               <a href="<?=base_url('explore')?>" class="btn btn-navy rounded">Explore</a>
            <?php else : ?>
               <a href="<?=base_url('login')?>" class="btn btn-navy rounded">Join Us</a>
            <?php endif ?>
         </div>
         <!-- /column -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</section>
<!-- /section -->
<?= $this->endsection() ?>