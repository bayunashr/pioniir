<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>Pioniir - Creator Homebase</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/front/img/pioniir.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/plugins.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/colors/aqua.css">
</head>
<body>
    <div class="content-wrapper">
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-12 pb-12 pb-md-14">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 mx-auto px-10 px-sm-0 mb-5">
                    <figure class=""><img class="img-fluid" src="<?= base_url() ?>assets/front/img/404.webp" alt=""></figure>
                </div>
                <!-- /column -->
                <div class="col-sm-12 col-md-12 col-lg-6 mx-auto my-auto text-center">
                    <img class="img-fluid w-50 mb-10 mx-auto d-none d-lg-block d-md-none d-sm-none" src="<?= base_url() ?>assets/front/img/pioniirdark.png" alt="">
                    <h1 class="mb-3">Oops! Page Not Found.</h1>
                    <p class="lead mb-5 px-md-7 px-lg-5 px-xl-7">The page you are looking for is not available or has been moved. Try a different page or go to homepage with the button below.</p>
                    <a href="<?= base_url() ?>" class="btn btn-primary rounded-pill">Go to Homepage</a>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    </div>

    <!-- <p> -->
        <?//php if (ENVIRONMENT !== 'production') : ?>
            <?// nl2br(esc($message)) ?>
        <?//php else : ?>
            <?//= lang('Errors.sorryCannotFind') ?>
        <?//php endif; ?>
    <!-- </p> -->
    
    <script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/front/js/theme.js"></script>
</body>
</html>
