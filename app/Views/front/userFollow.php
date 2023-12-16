<?= $this->extend('front/templateUser') ?>

<?= $this->section('pages') ?>
<h4>Subscribed Creator</h4>
<div class="row">
    <div class="col-sm-6 col-12 mt-5">
        <a href="#" class="card shadow-lg lift">
            <div class="card-body px-4 pt-4 pb-3">
                <div class="row">
                    <div class="col-4 col-sm-3">
                        <img class="rounded-circle w-100" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" alt="" />
                    </div>
                    <div class="col-8 col-sm-9">
                        <p class="fs-20 fw-bolder text-dark mb-n1 mt-2">Creator_alias</p>
                        <p class="fs-12 meta mt-1">tanggal subscribe</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-12 mt-5">
        <a href="#" class="card shadow-lg lift">
            <div class="card-body px-4 pt-4 pb-3">
                <div class="row">
                    <div class="col-4 col-sm-3">
                        <img class="rounded-circle w-100" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" alt="" />
                    </div>
                    <div class="col-8 col-sm-9">
                        <p class="fs-20 fw-bolder text-dark mb-n1 mt-2">Creator_alias</p>
                        <p class="fs-12 meta mt-1">tanggal subscribe</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-12 mt-5">
        <a href="#" class="card shadow-lg lift">
            <div class="card-body px-4 pt-4 pb-3">
                <div class="row">
                    <div class="col-4 col-sm-3">
                        <img class="rounded-circle w-100" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" alt="" />
                    </div>
                    <div class="col-8 col-sm-9">
                        <p class="fs-20 fw-bolder text-dark mb-n1 mt-2">Creator_alias</p>
                        <p class="fs-12 meta mt-1">tanggal subscribe</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<nav class="d-flex justify-content-center mt-6" aria-label="pagination">
    <ul class="pagination mb-0">
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
<!-- /nav -->
<?= $this->endsection() ?>