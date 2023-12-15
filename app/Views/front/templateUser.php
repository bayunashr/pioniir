<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-3">
            <div class="bg-white rounded p-5">
                <ul style="list-style-type: none;padding:0;">
                    <li class="bg-navy mb-2 px-4 py-2 rounded"><a href="#" class="link-white fw-bolder more"><i class="uil uil-user"></i> My Account</a></li>
                    <li class="mb-2 px-4 py-2 rounded"><a href="#" class="link-navy fw-bolder hover"><i class="uil uil-heart"></i> Support Given</a></li>
                    <li class="mb-2 px-4 py-2 rounded"><a href="#" class="link-navy fw-bolder hover"><i class="uil uil-user-plus"></i> Followed Creator</a></li>
                </ul>
                <hr class="my-1">
                <!-- If not creator -->
                <a href="<?= base_url('register/creator') ?>" class="btn btn-sm btn-primary w-100 mt-3">Become a Creator</a>
                <!-- Else -->
                <a href="<?= base_url('dashboard') ?>" class="btn btn-sm btn-primary w-100 mt-3">Open Dashboard Creator</a>
            </div>
        </div>
        <div class="col-9">
            <div class="bg-white rounded p-10">
                <?= $this->renderSection('pages') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>