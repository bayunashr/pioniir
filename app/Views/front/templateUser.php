<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
   <div class="row">
      <div class="col-3 d-none d-sm-none d-md-none d-lg-block">
         <div class="bg-white rounded p-5">
            <ul style="list-style-type: none;padding:0;">
               <li class="<?= current_url(true)->getSegment(2) == 'profile' ? 'bg-navy' : '' ?> mb-2 px-4 py-2 rounded"><a href="<?= base_url('user/profile') ?>" class="<?= current_url(true)->getSegment(2) == 'profile' ? 'link-white more' : 'link-navy hover' ?> fw-bolder"><i
                        class="uil uil-user"></i> My Account</a></li>
               <li class="<?= current_url(true)->getSegment(2) == 'tip' ? 'bg-navy' : '' ?> mb-2 px-4 py-2 rounded"><a href="<?= base_url('user/tip') ?>" class="<?= current_url(true)->getSegment(2) == 'tip' ? 'link-white more' : 'link-navy hover' ?>  fw-bolder"><i class="uil uil-heart"></i> Support
                     Given</a></li>
               <li class="<?= current_url(true)->getSegment(2) == 'follow' ? 'bg-navy' : '' ?> mb-2 px-4 py-2 rounded"><a href="<?= base_url('user/follow') ?>" class="<?= current_url(true)->getSegment(2) == 'follow' ? 'link-white more' : 'link-navy hover' ?>  fw-bolder"><i
                        class="uil uil-user-plus"></i> Subscribed</a></li>
            </ul>
            <hr class="my-1">
            <?php if (!empty($creator)) : ?>
            <a href="<?= base_url('dashboard') ?>" class="btn btn-sm btn-primary w-100 mt-3">Open Dashboard Creator</a>
            <?php else : ?>
            <a href="<?= base_url('register/creator') ?>" class="btn btn-sm btn-primary w-100 mt-3">Become a Creator</a>
            <?php endif ?>
            <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-red w-100 mt-3">Logout</a>
         </div>
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12 mb-5">
         <div class="bg-white rounded p-sm-10 p-5">
            <?= $this->renderSection('pages') ?>
         </div>
      </div>
   </div>
</div>
<?= $this->endsection() ?>