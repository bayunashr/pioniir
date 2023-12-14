<?= $this->extend('front/templateProfile') ?>

<?= $this->section('pages') ?>
<h4>Content</h4>
<div class="row">
    <div class="col-sm-4 col-12 mt-5">
        <div class="card shadow-lg lift">
            <a href="#">
                <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;"></div>
            </a>
            <a href="#" class="card-body px-4 py-4">
                <h5 class="mb-1">Content Title</h5>
                <div class="meta mb-2 fs-12">10 Januari 2023</div>
            </a>
            <div class="d-flex justify-content-between px-4">
                <p class="fs-20"><a href="#" class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart.svg" alt=""> 3</a></p>
                <p class="fs-20"><span class="badge bg-green">Free</span></p>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-12 mt-5">
        <div class="card shadow-lg lift">
            <div class="wrapper rounded-top" style="height: 150px;background-image:url('<?= base_url() ?>assets/front/img/content.png');background-position: center;background-size: cover;">
                <div data-bs-toggle="modal" data-bs-target="#modal-buy" class="rounded-top blur-img d-flex align-items-center justify-content-center text-center text-white fw-bold fs-20 px-sm-1 px-4" style="height: 150px;cursor:pointer;">
                    <span>Beli atau subscribe untuk akses konten ini <i class="uil uil-padlock"></i></span>
                </div>
            </div>
            <div class="card-body px-4 py-4">
                <h5 class="mb-1">Content Title</h5>
                <div class="meta mb-2 fs-12">10 Januari 2023</div>
            </div>
            <div class="d-flex justify-content-between px-4">
                <p class="fs-20"><a href="#" class="link-navy"><img src="<?= base_url() ?>assets/front/img/icons/social/heart-solid.svg" alt=""> 3</a></p>
                <p class="fs-20"><span class="badge bg-secondary">200.000</span></p>
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
<?= $this->endsection() ?>