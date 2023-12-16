<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<!-- /.container -->
<div class="container">
   <div class="row flex-column-reverse flex-lg-row mt-8 mt-lg-6">
      <div class="col-lg-9 order-lg-2 ">
         <img class="rounded w-100 d-none d-md-block" src="<?= base_url() ?>assets/uploads/banner/<?= $creatorData[0]['creatorBanner'] ?>" alt="">
         <div class="mt-4 d-flex justify-content-between">
            <div class="d-none d-md-block">
               <a href="<?= base_url('creator/' . $creatorData[0]['creatorAlias']) ?>" style="margin-right: 3px;" class="btn btn-sm <?= current_url(true)->getSegment(1) == 'creator' ? 'btn-navy' : 'btn-outline-navy' ?> rounded">Home</a>
               <a href="<?= base_url('post/' . $creatorData[0]['creatorAlias']) ?>" style="margin-right: 3px;" class="btn btn-sm <?= current_url(true)->getSegment(1) == 'post' ? 'btn-navy' : 'btn-outline-navy' ?> rounded">Post</a>
               <a href="<?= base_url('content/' . $creatorData[0]['creatorAlias']) ?>" class="btn btn-sm <?= current_url(true)->getSegment(1) == 'content' ? 'btn-navy' : 'btn-outline-navy' ?> rounded">Content</a>
            </div>
            <?php if(count($ceksubs) >= 1):?>
            <div class="btn btn-sm btn-outline-secondary rounded d-none d-md-block"><i class="uil uil-user-check"></i> &nbsp; Disubscribe (<?= hitungSelisihHari($ceksubs[0]['subTimestamp']) ?> Days Left)</div>
            <?php elseif((!empty($creator)) && $creatorData[0]['creatorId'] == $creator[0]['creatorId']):?>

            <?php else: ?>
            <div class="btn btn-sm btn-green rounded d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modal-subs"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</div>
            <?php endif ?>
         </div>
         <div class="bg-white rounded p-5 mt-4">
            <?= $this->renderSection('pages') ?>
         </div>
      </div>
      <!-- /column -->
      <aside class="col-lg-3">
         <div class="wrapper rounded-top d-block d-sm-none" style="height: 120px;background-image:url('<?= base_url() ?>assets/uploads/banner/<?= $creatorData[0]['creatorBanner'] ?>');background-position: center;background-size: cover;"></div>
         <div class="bg-white rounded-bottom p-5 text-center">
            <img class="rounded-circle w-15" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $creatorData[0]['userAvatar'] ?>" alt="" />
            <h4 class="fw-bolder mt-3"><?= $creatorData[0]['creatorAlias'] ?></h4>
            <h4 class="mt-n1 fs-15"><i class="uil uil-users-alt"></i> <?= $subs ?> Subscriber</h4>
            <div class="meta mb-2 fs-12"><?= str_replace(",", " | ", $creatorData[0]['creatorTag'])  ?></div>
            <?php if(count($ceksubs) >= 1):?>
            <div class="btn w-100 btn-outline-secondary btn-sm rounded-pill mb-3 d-block d-sm-none"><i class="uil uil-user-check"></i> &nbsp; Disubscribe (<?= hitungSelisihHari($ceksubs[0]['subTimestamp']) ?> Days Left)</div>
            <?php else: ?>
            <div class="btn w-100 btn-green btn-sm rounded-pill mb-3 d-block d-sm-none" data-bs-toggle="modal" data-bs-target="#modal-subs"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</div>
            <?php endif ?>
            <p><?= esc($creatorData[0]['creatorDescription']) ?></p>
            <nav class="nav social justify-content-center">
               <?php foreach ($sosmed as $key => $value) : ?>
               <a
                  href="https://<?= ($value['socialMedia'] == 'facebook') ? 'facebook.com/' : (($value['socialMedia'] == 'twitter') ? 'twitter.com/' : (($value['socialMedia'] == 'instagram') ? 'instagram.com/' : (($value['socialMedia'] == 'tiktok') ? 'tiktok.com/' : (($value['socialMedia'] == 'youtube') ? 'youtube.com/' : (($value['socialMedia'] == 'twitch') ? 'twitch.tv/' : (($value['socialMedia'] == 'discord') ? 'discord.com/' : '')))))); ?><?= $value['socialLink'] ?>"><img
                     src="<?= base_url() ?>assets/front/img/icons/social/<?= $value['socialMedia'] ?>.svg" alt="<?= $value['socialMedia'] ?>"></a>
               <?php endforeach ;?>
            </nav>
         </div>
         <div class="bg-white rounded mt-5 py-3 px-5">
            <!-- If tidak ada milestone -->
            <?php if(empty($milestone)) : ?>
            <h4 class="fw-bolder mt-3"><i class="uil uil-comment-alt-heart"></i> Support</h4>
            <p>Bergabung dalam kreativitas! Dukung <?= esc($creatorData[0]['creatorAlias']) ?> untuk konten inspiratif.</p>
            <!-- Else -->
            <?php else:?>
            <h4 class="fw-bolder mt-3"><i class="uil uil-rocket"></i> Milestone</h4>
            <ul class="progress-list mt-3">
               <li>
                  <p><?= $milestone['milestoneName'] ?></p>
                  <div class="progressbar line yellow" data-value="<?= format_persen_miles_creator($milestone['milestoneBalance'], $milestone['milestoneTarget']) ?>"></div>
                  <p class="fs-12 mt-1"><span class="fw-bold"><?= format_rupiah($milestone['milestoneBalance']) ?></span> terkumpul dari <?= format_rupiah($milestone['milestoneTarget']) ?></p>
               </li>
            </ul>
            <?php endif;?>
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
            <form method="post" id="formDonasi" class="text-start mb-3">
               <div class="mb-3">
                  <input type="hidden" class="form-control form-control-sm" id="userId" name="userId" value="<?= $user['userId'] ?>">
                  <input type="hidden" class="form-control form-control-sm" id="creaatorId" name="creatorId" value="<?= $creatorData[0]['creatorId'] ?>">
                  <input type="text" class="form-control form-control-sm" placeholder="Name" id="donateName" name="donateName" required>
               </div>
               <div class="mb-3">
                  <input type="number" class="form-control form-control-sm" placeholder="Jumlah" id="donateAmount" name="donateAmount" required>
               </div>
               <div class="mb-3">
                  <textarea id="donateDescription" class="form-control form-control-sm" placeholder="Deskripsi" style="height: 150px" name="donateDescription"></textarea>
               </div>
               <button type="submit" class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2">Donate</button>
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
            <img class="rounded-circle w-15 mb-4" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $creatorData[0]['userAvatar'] ?>" alt="" />
            <p class="fs-18 text-navy"><?= esc($creatorData[0]['creatorAlias']) ?></p>
            <p class="fs-20 text-navy mt-n4"><span class="fw-bolder"><?= format_rupiah($creatorData[0]['creatorSubPrice']) ?></span>/Bln</p>
            <p class="meta">Subscribe akan memberikan akses konten eksklusif selama 30 hari</p>
            <?php if (!(session()->has('loginUser') && session()->has('userName') && session()->has('userFullName') && session()->has('userEmail'))) : ?>
            <a href="<?= base_url('login') ?>" class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</a>
            <?php else: ?>
            <input type="hidden" name="creatorId" id="creatorId" value="<?= $creatorData[0]['creatorId'] ?>">
            <input type="hidden" name="userId" id="userId" value="<?= $user['userId'] ?>">
            <button class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2" id="tombolSubs"><i class="uil uil-user-plus"></i> &nbsp; Subscribe</button>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal-buy" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
         <div class="modal-body px-sm-10 px-6 py-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img style="width: 80%;" src="<?= base_url() ?>assets/front/img/ilus2.png" alt="" />
            <p class="fs-18 text-navy" id="contentTitle"></p>
            <p class="fs-20 text-navy mt-n4"><span class="fw-bolder" id="contentPrice"></span></p>
            <p class="d-none" id="contentId">asd</p>
            <p class="meta">Beli dan nikmati konten dari creator yang anda suka!</p>
            <?php if (!(session()->has('loginUser') && session()->has('userName') && session()->has('userFullName') && session()->has('userEmail'))) : ?>
            <a href="<?= base_url('login') ?>" class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2">Beli</a>
            <?php else: ?>
            <button class="btn btn-sm btn-green rounded-pill btn-login w-100 mb-2" id="tombolBuy" data-user="<?= $user['userId'] ?>">Beli</button>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>

<?= $this->endsection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url() ?>assets/dashboard/js/lib/jquery.min.js"></script>
<script>
// Donate
document.getElementById('formDonasi').addEventListener('submit', function(event) {
   event.preventDefault();
   this.querySelector('[type="submit"]').disabled = true;

   const formData = new FormData(this);

   fetch('/donate', {
         method: 'POST',
         body: formData
      })
      .then(response => {
         if (!response.ok) {
            throw new Error('Network response was not ok');
         }
         return response.json();
      })
      .then(data => {
         const reloadPage = () => location.reload();

         if (data && data.snapToken) {
            const snapConfig = {
               onSuccess: reloadPage,
               onPending: reloadPage,
               onError: reloadPage,
               onClose: reloadPage
            };

            window.snap.pay(data.snapToken, snapConfig);
         } else {
            console.error('Tidak ada token Snap yang diterima dari server');
         }
      })
      .catch(error => {
         console.error('Error:', error);
      })
      .finally(() => {
         this.querySelector('[type="submit"]').disabled = false;
      });
});


$(document).on('click', '#tombolSubs', function(event) {
   $(this).prop('disabled', true);

   const idCreator = document.getElementById('creatorId').value;
   const idUser = document.getElementById('userId').value;

   fetch('/subscribe', {
         method: 'POST',
         body: JSON.stringify({
            creatorId: idCreator,
            userId: idUser
         })
      })
      .then(response => {
         if (!response.ok) {
            throw new Error('Network response was not ok');
         }
         return response.json();
      })
      .then(data => {
         const reloadPage = () => location.reload();

         if (data && data.snapToken) {
            const snapConfig = {
               onSuccess: reloadPage,
               onPending: reloadPage,
               onError: reloadPage,
               onClose: reloadPage
            };

            window.snap.pay(data.snapToken, snapConfig);
         } else {
            console.error('Tidak ada token Snap yang diterima dari server');
         }
      })
      .catch(error => {
         console.error('Error:', error);
      })
      .finally(() => {
         $(this).prop('disabled', false);
      });

   event.preventDefault();
});

// Tombol get data content
var id = 0;

$(document).on('click', '#tombolDetailBuy', function() {
   const name = this.getAttribute('data-name');
   const harga = this.getAttribute('data-harga');
   id = this.getAttribute('data-id');
   const formatRupiah = (value) => {
      const formattedValue = new Intl.NumberFormat('id-ID', {
         style: 'currency',
         currency: 'IDR'
      }).format(value);
      return formattedValue.split(',')[0];
   };

   document.getElementById('contentTitle').innerHTML = name;
   document.getElementById('contentPrice').innerHTML = formatRupiah(harga);
});

// Tombol Buy Content
$(document).on('click', '#tombolBuy', function() {
   $(this).prop('disabled', true);
   const idUser = this.getAttribute('data-user');

   fetch('/buy/content/' + id, {
         method: 'POST',
         body: JSON.stringify({
            userId: idUser
         })
      })
      .then(response => {
         if (!response.ok) {
            throw new Error('Network response was not ok');
         }
         return response.json();
      })
      .then(data => {
         const reloadPage = () => location.reload();

         if (data && data.snapToken) {
            const snapConfig = {
               onSuccess: reloadPage,
               onPending: reloadPage,
               onError: reloadPage,
               onClose: reloadPage
            };

            window.snap.pay(data.snapToken, snapConfig);
         } else {
            console.error('Tidak ada token Snap yang diterima dari server');
         }
      })
      .catch(error => {
         console.error('Error:', error);
      })
      .finally(() => {
         $(this).prop('disabled', false);
      });
});
</script>
<?= $this->endsection() ?>