<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<!-- /.container -->
<div class="container">
   <div class="row flex-column-reverse flex-lg-row mt-8 mt-lg-6">
      <div class="col-lg-9 order-lg-2 ">
         <img class="rounded w-100 d-none d-md-block" src="<?= base_url() ?>assets/uploads/banner/<?= $creator[0]['creatorBanner'] ?>" alt="">
         <div class="mt-4 d-flex justify-content-between">
            <div class="d-none d-md-block">
               <a href="<?= base_url('creator/' . $creator[0]['creatorAlias']) ?>" style="margin-right: 3px;" class="btn btn-sm <?= current_url(true)->getSegment(1) == 'creator' ? 'btn-navy' : 'btn-outline-navy' ?> rounded">Home</a>
               <a href="<?= base_url('post/' . $creator[0]['creatorAlias']) ?>" style="margin-right: 3px;" class="btn btn-sm <?= current_url(true)->getSegment(1) == 'post' ? 'btn-navy' : 'btn-outline-navy' ?> rounded">Post</a>
               <a href="<?= base_url('content/' . $creator[0]['creatorAlias']) ?>" class="btn btn-sm <?= current_url(true)->getSegment(1) == 'content' ? 'btn-navy' : 'btn-outline-navy' ?> rounded">Content</a>
            </div>
            <div class="btn btn-sm btn-green rounded d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modal-subs"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</div>
         </div>
         <div class="bg-white rounded p-5 mt-4">
            <?= $this->renderSection('pages') ?>
         </div>
      </div>
      <!-- /column -->
      <aside class="col-lg-3">
         <div class="wrapper rounded-top d-block d-sm-none" style="height: 120px;background-image:url('<?= base_url() ?>assets/uploads/banner/<?= $creator[0]['creatorBanner'] ?>');background-position: center;background-size: cover;"></div>
         <div class="bg-white rounded-bottom p-5 text-center">
            <img class="rounded-circle w-15" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $creator[0]['userAvatar'] ?>" alt="" />
            <h4 class="fw-bolder mt-3"><?= $creator[0]['creatorAlias'] ?></h4>
            <h4 class="mt-n1 fs-15"><i class="uil uil-users-alt"></i> <?= $subs ?> Subscriber</h4>
            <div class="meta mb-2 fs-12"><?= str_replace(",", " | ", $creator[0]['creatorTag'])  ?></div>
            <div class="btn w-100 btn-green btn-sm rounded-pill mb-3 d-block d-sm-none" data-bs-toggle="modal" data-bs-target="#modal-subs"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</div>
            <p><?= esc($creator[0]['creatorDescription']) ?></p>
            <nav class="nav social justify-content-center">
               <?php foreach ($sosmed as $key => $value) : ?>
               <a href="https://<?= $value['socialLink'] ?>"><img src="<?= base_url() ?>assets/front/img/icons/social/<?= $value['socialMedia'] ?>.svg" alt="<?= $value['socialMedia'] ?>"></a>
               <?php endforeach ;?>
            </nav>
         </div>
         <div class="bg-white rounded mt-5 py-3 px-5">
            <!-- If tidak ada milestone -->
            <h4 class="fw-bolder mt-3"><i class="uil uil-comment-alt-heart"></i> Support</h4>
            <p>Bergabung dalam kreativitas! Dukung <?= esc($creator[0]['creatorAlias']) ?> untuk konten inspiratif.</p>
            <!-- Else -->
            <h4 class="fw-bolder mt-3"><i class="uil uil-rocket"></i> Milestone</h4>
            <ul class="progress-list mt-3">
               <li>
                  <p><?= $milestone['milestoneName'] ?></p>
                  <div class="progressbar line yellow" data-value="<?= format_persen_miles_creator($milestone['milestoneBalance'], $milestone['milestoneTarget']) ?>"></div>
                  <p class="fs-12 mt-1"><span class="fw-bold"><?= format_rupiah($milestone['milestoneBalance']) ?></span> terkumpul dari <?= format_rupiah($milestone['milestoneTarget']) ?></p>
               </li>
            </ul>
            <!-- End if -->
            <div class="btn w-100 btn-green btn-sm rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#modal-donate">Donate</div>
         </div>
      </aside>
      <!-- /column .sidebar -->
   </div>
</div>

<div class="modal fade" id="modal-donate" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
         <div class="modal-body px-sm-10 px-6 py-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img style="width: 80%;" src="<?= base_url() ?>assets/front/img/ilus1.png" alt="" />
            <form action="" method="post" class="text-start mb-3">
               <div class="mb-3">
                  <input type="text" class="form-control form-control-sm" placeholder="Name" id="name" name="donateName">
               </div>
               <div class="mb-3">
                  <input type="number" class="form-control form-control-sm" placeholder="Jumlah" id="jumlah" name="donateAmount" required>
               </div>
               <div class="mb-3">
                  <textarea id="deskripsi" class="form-control form-control-sm" placeholder="Deskripsi" style="height: 150px" name="donateDescription"></textarea>
               </div>
               <a class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2">Donate</a>
            </form>
         </div>
         <!--/.modal-content -->
      </div>
      <!--/.modal-body -->
   </div>
   <!--/.modal-dialog -->
</div>
<!--/.modal -->

<div class="modal fade" id="modal-subs" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
         <div class="modal-body px-sm-10 px-6 py-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img class="rounded-circle w-15 mb-4" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $creator[0]['userAvatar'] ?>" alt="" />
            <p class="fs-18 text-navy"><?= esc($creator[0]['creatorAlias']) ?></p>
            <p class="fs-20 text-navy mt-n4"><span class="fw-bolder"><?= format_rupiah($creator[0]['creatorSubPrice']) ?></span>/Bln</p>
            <p class="meta">Subscribe akan memberikan akses konten eksklusif selama 30 hari</p>
            <a href="#" class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</a>
         </div>
         <!--/.modal-content -->
      </div>
      <!--/.modal-body -->
   </div>
   <!--/.modal-dialog -->
</div>
<!--/.modal -->

<div class="modal fade" id="modal-buy" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
         <div class="modal-body px-sm-10 px-6 py-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img style="width: 80%;" src="<?= base_url() ?>assets/front/img/ilus2.png" alt="" />
            <p class="fs-18 text-navy">Content Title</p>
            <p class="fs-20 text-navy mt-n4"><span class="fw-bolder">Rp. 200.000</span></p>
            <p class="meta">Beli dan nikmati konten dari creator yang anda suka!</p>
            <a href="#" class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2">Beli</a>
         </div>
         <!--/.modal-content -->
      </div>
      <!--/.modal-body -->
   </div>
   <!--/.modal-dialog -->
</div>
<!--/.modal -->

<?= $this->endsection() ?>

<?= $this->section('js') ?>
<?= $this->endsection() ?>