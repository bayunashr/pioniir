<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('') ?>assets/dashboard/js/plugins/select2/css/select2.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="btabs-static-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-static-home" role="tab" aria-controls="btabs-static-home" aria-selected="true">Profile Page</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="btabs-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-static-profile" role="tab" aria-controls="btabs-static-profile" aria-selected="false">Subscription</button>
                </li>
            </ul>
            <div class="block-content tab-content">
                <div class="tab-pane active" id="btabs-static-home" role="tabpanel" aria-labelledby="btabs-static-home-tab" tabindex="0">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-5">
                                <div class="mb-4">
                                    <label class="form-label" for="profilePicture">Profile Picture</label>
                                    <div class="avatar mb-3">
                                        <img class="img-avatar img-avatar-thumb" src="<?= base_url('') ?>assets/dashboard/media/avatars/avatar10.jpg" alt="">
                                    </div>
                                    <input type="file" accept="image/*" class="form-control" id="profilePicture" name="profilePicture">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="banner">Banner</label>
                                    <div class="banner mb-3">
                                        <img class="w-100" src="<?= base_url() ?>assets/front/img/BannerCreator.png" alt="">
                                        <p class="mt-2">Banner resolution : 900 x 225 px</p>
                                    </div>
                                    <input type="file" accept="image/*" class="form-control" id="banner" name="banner">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="socmed">Social Media</label>
                                    <div class="input-group mb-2">
                                        <input type="text" readonly class="form-control form-control-alt" value="facebook.com/lorem">
                                        <a href="#" class="btn btn-info"><i class="si si-pencil"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="si si-trash"></i></a>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" readonly class="form-control form-control-alt" value="instagram.com/lorem">
                                        <a href="#" class="btn btn-info"><i class="si si-pencil"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="si si-trash"></i></a>
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <button type="button" class="btn btn-outline-secondary btn-sm push" data-bs-toggle="modal" data-bs-target="#modal-block-vcenter"><i class="nav-main-link-icon fa fa-plus"></i> Add links</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-12 col-sm-5">
                                <div class="mb-4">
                                    <label class="form-label" for="alias">Alias</label>
                                    <input type="text" class="form-control" id="alias" name="alias" placeholder="Creator Alias">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Creator Description......"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="creatorTag">Creator Tag</label>
                                    <select class="js-select2 form-select" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="artist">Artist</option>
                                        <option value="musician">Musician</option>
                                        <option value="video maker">Video Maker</option>
                                        <option value="podcaster">Podcaster</option>
                                        <option value="streamer">Streamer</option>
                                        <option value="youtuber">Youtuber</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane mb-4" id="btabs-static-profile" role="tabpanel" aria-labelledby="btabs-static-profile-tab" tabindex="0">
                    <h4 class="fw-normal">Edit Subscription Price</h4>
                    <form action="" method="post" class="row">
                        <div class="col-sm-6 col-12">
                            <label class="form-label" for="alias">Price</label>
                            <input type="number" class="form-control" id="alias" name="alias" placeholder="Subs price">
                            <button type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal">Submit</button>
                        </div>
                        <div class="col-sm-6 col-12"></div>
                    </form>
                    <h4 class="fw-normal mt-4">Data subscription</h4>
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">No</th>
                                <th>Name</th>
                                <th class=" style=" width: 30%;">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center fs-sm">1</td>
                                <td class="fw-semibold fs-sm">David Fuller</td>
                                <td class="fs-sm">
                                    client1<span class="text-muted">@example.com</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center fs-sm">2</td>
                                <td class="fw-semibold fs-sm">Justin Hunt</td>
                                <td class="fs-sm">
                                    client2<span class="text-muted">@example.com</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center fs-sm">3</td>
                                <td class="fw-semibold fs-sm">Scott Young</td>
                                <td class="fs-sm">
                                    client3<span class="text-muted">@example.com</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center fs-sm">4</td>
                                <td class="fw-semibold fs-sm">Jose Parker</td>
                                <td class="fs-sm">
                                    client4<span class="text-muted">@example.com</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center fs-sm">5</td>
                                <td class="fw-semibold fs-sm">Amanda Powell</td>
                                <td class="fs-sm">
                                    client5<span class="text-muted">@example.com</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Block Tabs Default Style -->
    </div>
    <!-- END Page Content -->
</main>

<div class="modal" id="modal-block-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add Social Media links</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            <label class="form-label" for="socmed">Social URL</label>
                            <input type="text" class="form-control" id="socmed" name="socmed" placeholder="Social Media link">
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url('') ?>assets/dashboard/js/oneui.app.min.js"></script>

<!-- jQuery (required for DataTables plugin) -->
<script src="<?= base_url('') ?>assets/dashboard/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/select2/js/select2.full.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url('') ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
<!-- Page JS Helpers (Select2) -->
<script>
    One.helpersOnLoad(['jq-select2', ]);
</script>
<?= $this->endsection() ?>