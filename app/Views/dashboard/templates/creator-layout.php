<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $title ?></title>

  <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
  <meta property="og:site_name" content="OneUI">
  <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="<?= base_url('') ?>assets/front/img/pioniir.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('') ?>assets/front/img/pioniir.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('') ?>assets/front/img/pioniir.png">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- OneUI framework -->
  <link rel="stylesheet" id="css-main" href="<?= base_url('') ?>assets/dashboard/css/oneui.min.css">
  <?= $this->renderSection('header-addons') ?>
  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="assets/dashboard/css/themes/amethyst.min.css"> -->
  <!-- END Stylesheets -->
</head>

<body>
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="<?= base_url() ?>">
          <span class="smini-visible">
            <i class="fa fa-circle-notch text-primary"></i>
          </span>
          <span class="smini-hide fs-5 tracking-wider row"><img class="col-sm-6 col-4" src="<?= base_url('') ?>assets/front/img/pioniir Text white.png" alt=""></span>
        </a>
        <!-- END Logo -->

        <div>
          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(1) == 'dashboard' && current_url(true)->getSegment(2) == '' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                <i class="nav-main-link-icon si si-speedometer"></i>
                <span class="nav-main-link-name">Dashboard</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'profile' && current_url(true)->getSegment(3) == 'creator' ? 'active' : '' ?>" href="<?= base_url('dashboard/profile/creator') ?>">
                <i class="nav-main-link-icon si si-pencil"></i>
                <span class="nav-main-link-name">Edit Page</span>
              </a>
            </li>
            <li class="nav-main-heading">Community</li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'post' ? 'active' : '' ?>" href="<?= base_url('dashboard/post') ?>">
                <i class="nav-main-link-icon si si-note"></i>
                <span class="nav-main-link-name">Post</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'content' ? 'active' : '' ?>" href="<?= base_url('dashboard/content') ?>">
                <i class="nav-main-link-icon si si-trophy"></i>
                <span class="nav-main-link-name">Content</span>
              </a>
            </li>
            <li class="nav-main-heading">Transaction</li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'donate' ? 'active' : '' ?>" href="#">
                <i class="nav-main-link-icon si si-present"></i>
                <span class="nav-main-link-name">Donate</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'subscribe' ? 'active' : '' ?>" href="#">
                <i class="nav-main-link-icon si si-disc"></i>
                <span class="nav-main-link-name">Subscribe</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'buy' ? 'active' : '' ?>" href="#">
                <i class="nav-main-link-icon si si-bag"></i>
                <span class="nav-main-link-name">Buy</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link <?= current_url(true)->getSegment(2) == 'milestone' ? 'active' : '' ?>" href="#">
                <i class="nav-main-link-icon si si-rocket"></i>
                <span class="nav-main-link-name">Milestone</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle" src="<?= base_url('') ?>assets/dashboard/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 21px;">
              <span class="d-none d-sm-inline-block ms-2">John</span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= base_url('') ?>assets/dashboard/media/avatars/avatar10.jpg" alt="">
                <p class="mt-2 mb-0 fw-medium">John Smith</p>
                <p class="mb-0 text-muted fs-sm fw-medium">Web Developer</p>
              </div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                  <span class="fs-sm fw-medium">Inbox</span>
                  <span class="badge rounded-pill bg-primary ms-2">3</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                  <span class="fs-sm fw-medium">Profile</span>
                  <span class="badge rounded-pill bg-primary ms-2">1</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span class="fs-sm fw-medium">Settings</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                  <span class="fs-sm fw-medium">Lock Account</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_signin.html">
                  <span class="fs-sm fw-medium">Log Out</span>
                </a>
              </div>
            </div>
          </div>
          <!-- END User Dropdown -->

          <!-- Notifications Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="text-primary">•</span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
              <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                <h5 class="dropdown-header text-uppercase">Notifications</h5>
              </div>
              <ul class="nav-items mb-0">
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">You have a new follower</div>
                      <span class="fw-medium text-muted">15 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">1 new sale, keep it up</div>
                      <span class="fw-medium text-muted">22 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-times-circle text-danger"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">Update failed, restart server</div>
                      <span class="fw-medium text-muted">26 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">2 new sales, keep it up</div>
                      <span class="fw-medium text-muted">33 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-user-plus text-success"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">You have a new subscriber</div>
                      <span class="fw-medium text-muted">41 min ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="text-dark d-flex py-2" href="javascript:void(0)">
                    <div class="flex-shrink-0 me-2 ms-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 pe-2">
                      <div class="fw-semibold">You have a new follower</div>
                      <span class="fw-medium text-muted">42 min ago</span>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="p-2 border-top text-center">
                <a class="d-inline-block fw-medium" href="javascript:void(0)">
                  <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                </a>
              </div>
            </div>
          </div>
          <!-- END Notifications Dropdown -->


        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <?= $this->renderSection('content') ?>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
      <div class="content py-3">
        <div class="row fs-sm">
          <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
          </div>
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
            <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">OneUI 5.7</a> &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- JS Script -->
  <?= $this->renderSection('footer-addons') ?>
  <!-- END JS Script -->

</body>

</html>