<?= $this->extend('dashboard/templates/admin-layout') ?>

<?= $this->section('content') ?>
  <main id="main-container">
          <!-- Page Content -->
          <div class="content">
            <!-- Overview -->
            <div class="row items-push">
              <div class="col-sm-6 col-xxl-3">
                <!-- Pending Orders -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">132</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Pengguna</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-user fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua pengguna</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Pending Orders -->
              </div>
              <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">37</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Total Kreator</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-user-ninja fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua kreator</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END New Customers -->
              </div>
              <div class="col-sm-4 col-xxl-3">
                <!-- Messages -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">45</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Donasi Diterima</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-gift fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua donatur</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Messages -->
              </div>
              <div class="col-sm-4 col-xxl-3">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">55</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Subscribe Ditekan</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-money-check-dollar fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua subscriber</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
              <div class="col-sm-4 col-xxl-3">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">5</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Konten Dibeli</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-box fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua buyer</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
              <div class="col-sm-3 col-xxl-3">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">31</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Konten Baru</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-dice-six fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua konten</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
              <div class="col-sm-3 col-xxl-3">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">42</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Postingan Baru</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-newspaper fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua postingan</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
              <div class="col-sm-3 col-xxl-3">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">166</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Komentar Baru</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-comment-dots fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua komentar</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
              <div class="col-sm-3 col-xxl-3">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">511</dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Love Baru</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-thumbs-up fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      <span>Lihat semua love</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
            </div>
            <!-- END Overview -->
          </div>
          <!-- END Page Content -->
  </main>
<?= $this->endsection() ?>