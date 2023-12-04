<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>Pioniir - Creator Homebase</title>
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/front/img/pioniir.png">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/front/css/plugins.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/front/css/style.css">
</head>

<body>
    <div class="content-wrapper">
        <!-- /header -->
        <section class="wrapper gradient-6">
            <div class="container pt-15 pb-21 pt-md-16 pb-md-21 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="display-1 mb-3 text-white"><a href="<?= base_url() ?>"><img class="w-20" src="<?= base_url('') ?>assets/front/img/pioniirDark.png" alt=""></a></h1>
                        <!-- /nav -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
        <section class="wrapper bg-light">
            <div class="container pb-14 pb-md-16">
                <div class="row">
                    <div class="col mt-n19">
                        <div class="card shadow-lg">
                            <div class="row gx-0 text-center px-sm-10">
                                <div class="col-lg-6 image-wrapper bg-image bg-full rounded-top rounded-lg-start d-none d-md-block" data-image-src="<?= base_url('') ?>assets/front/img/ilus3.png"></div>
                                <!--/column -->
                                <div class="col-lg-6">
                                    <div class="px-5 py-8 p-sm-10 p-md-11 p-lg-13">
                                        <h2 class="mb-3 text-start">Become a Creator</h2>
                                        <p class="lead mb-6 text-start">Gabung, Jadilah Creator!</p>
                                        <form class="text-start mb-3">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" placeholder="Creator Alias (A.K.A)" id="alias">
                                                <label for="alias">Creator Alias (A.K.A)</label>
                                            </div>
                                            <div class="form-select-wrapper mb-4">
                                                <select class="form-select">
                                                    <option hidden selected>Creator Tag</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                <p class="fs-13 mt-2 px-2 text-aqua fw-bold">Tenang! Tag bisa kamu ubah atau tambah nanti</p>
                                            </div>
                                            <div class="form-floating mb-4">
                                                <textarea id="textareaExample" class="form-control" placeholder="Textarea" style="height: 150px" required></textarea>
                                                <label for="textareaExample">Creator Description</label>
                                            </div>
                                            <a class="btn btn-navy rounded-pill btn-login w-100 mb-2">Gabung Sekarang!</a>
                                        </form>
                                    </div>
                                    <!--/div -->
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
    </div>
    <!-- /.content-wrapper -->
    <script src="<?= base_url('') ?>assets/front/js/plugins.js"></script>
    <script src="<?= base_url('') ?>assets/front/js/theme.js"></script>
</body>

</html>