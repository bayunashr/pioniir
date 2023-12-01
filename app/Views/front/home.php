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
        <header class="wrapper bg-gray">
            <nav class="navbar navbar-expand-lg fancy navbar-light navbar-bg-light caret-none">
                <div class="container">
                    <div class="navbar-collapse-wrapper bg-white d-flex flex-row flex-nowrap w-100 justify-content-between align-items-center py-3">
                        <div class="navbar-brand w-100">
                            <a href="">
                                <img class="w-16" src="<?= base_url('') ?>assets/front/img/Pioniir Text.png" alt="" />
                            </a>
                        </div>
                        <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                            <div class="offcanvas-header d-lg-none">
                                <a href=""><img class="w-16" src="<?= base_url('') ?>assets/front/img/Pioniir Text white.png" alt="" /></a>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100"></div>
                            <!-- /.offcanvas-body -->
                        </div>
                        <!-- /.navbar-collapse -->
                        <div class="navbar-other w-100 d-flex ms-auto">
                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-search"><i class="uil uil-search"></i></a></li>
                                <li class="nav-item">
                                    <a onMouseOver="this.style.background='#333F52'; this.style.color='white'" onmouseout="this.style.background='white'; this.style.color='black'" href="<?=base_url('login')?>" class=" btn btn-sm btn-outline-navy rounded-pill">Get Started</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                        </div>
                        <!-- /.navbar-other -->
                    </div>
                    <!-- /.navbar-collapse-wrapper -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
            <div class="offcanvas offcanvas-top bg-light" id="offcanvas-search" data-bs-scroll="true">
                <div class="container d-flex flex-row py-6">
                    <form class="search-form w-100">
                        <input id="search-form" type="text" class="form-control" placeholder="Cari Kreator">
                    </form>
                    <!-- /.search-form -->
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.offcanvas -->
        </header>
        <!-- /header -->
        <section class="wrapper bg-gray">
            <div class="container pt-12 pt-md-16 text-center">
                <div class="row">
                    <div class="col-lg-8 col-xxl-7 mx-auto text-center" data-cues="slideInDown" data-group="page-title" data-delay="600">
                        <h2 class="fs-16 text-uppercase ls-xl text-dark mb-4">Hello! This is Pioniir</h2>
                        <h1 class="display-1 fs-58 mb-7">Welcome To <br> <span class="typer text-aqua" data-delay="100" data-words="Hub of Creativity,Visionary Oasis,Discovery Harbor">
                            </span><span class="cursor text-aqua" data-owner="typer"></span> </h1>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pioniir.com/alias" aria-label="Pioniir.com/alias" aria-describedby="button-addon2">
                            <a href="" class="btn btn-navy" type="button" id="button-addon2">Join</a>
                        </div>
                    </div>
                    <!--/column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
            <figure data-cues="slideInDown" class="position-absoute" style="bottom: 0; left: 0; z-index: 2;"><img src="<?= base_url('') ?>assets/front/img/Doodle Background.png" alt="" /></figure>
            <!-- /section -->
            <section class="wrapper bg-light">
                <div class="container py-14 py-md-16">
                    <div class="row gy-10 gy-md-13 gy-lg-0 align-items-center mb-16">
                        <div class="col-md-8 col-lg-5 d-flex position-relative mx-auto" data-cues="slideInDown" data-group="header">
                            <div class="img-mask"><img src="<?= base_url('') ?>assets/front/img/ilus 2.png" alt="" /></div>
                        </div>
                        <!--/column -->
                        <div class="col-lg-6 offset-lg-1 col-xxl-5 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
                            <h1 class="display-1 mb-5">Who are we?</h1>
                            <p class="lead fs-20 lh-sm mb-7 px-md-10 px-lg-0">Pioniir merupakan platform fan-based funding yang didedikasikan untuk memberdayakan kreator dari berbagai bidang untuk
                                menghubungkan, berkolaborasi, dan menerima dukungan finansial dari komunitas mereka.</p>
                        </div>
                        <!--/column -->
                    </div>
                    <!-- /.row -->
                    <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
                        <div class="col-lg-4 mt-lg-2">
                            <h2 class="display-4 mb-3">Our Top Creator</h2>
                            <p class="lead fs-lg mb-6 pe-xxl-5">Explore berbagai konten kreatif dari kreator kami. Mulai dari Podcaster, 3D Artist, Video Maker, Musisi, dll</p>
                        </div>
                        <!-- /column -->
                        <div class="col-lg-8">
                            <div class="swiper-container blog grid-view mb-6" data-margin="30" data-dots="true" data-items-md="2" data-items-xs="1">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <article>
                                                <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="#"> <img src="<?= base_url('') ?>assets/front/img/photos/b4.jpg" alt="" /></a>
                                                    <figcaption>
                                                        <h5 class="from-top mb-0">See More</h5>
                                                    </figcaption>
                                                </figure>
                                                <div class="post-header">
                                                    <div class="post-category text-line text-navy">
                                                        <a href="#" class="hover text-navy" rel="category">#Podcaster</a>
                                                        <a href="#" class="hover text-navy" rel="category">#VideoMaker</a>
                                                    </div>
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h1 mt-1 mb-3">Bambang</h2>
                                                    <h2 class="post-title h6 mt-1 mb-3">Ligula tristique quis risus</h2>
                                                </div>
                                            </article>
                                            <!-- /article -->
                                        </div>
                                        <!--/.swiper-slide -->
                                        <div class="swiper-slide">
                                            <article>
                                                <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="#"> <img src="<?= base_url('') ?>assets/front/img/photos/b5.jpg" alt="" /></a>
                                                    <figcaption>
                                                        <h5 class="from-top mb-0">See More</h5>
                                                    </figcaption>
                                                </figure>
                                                <div class="post-header">
                                                    <div class="post-category text-line text-navy">
                                                        <a href="#" class="hover text-navy" rel="category">#3dArtist</a>
                                                        <a href="#" class="hover text-navy" rel="category">#Streamer</a>
                                                    </div>
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h1 mt-1 mb-3">Michael</h2>
                                                    <h2 class="post-title h6 mt-1 mb-3">Nullam id dolor elit id nibh</h2>
                                                </div>
                                            </article>
                                            <!-- /article -->
                                        </div>
                                        <!--/.swiper-slide -->
                                        <div class="swiper-slide">
                                            <article>
                                                <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="#"> <img src="<?= base_url('') ?>assets/front/img/photos/b6.jpg" alt="" /></a>
                                                    <figcaption>
                                                        <h5 class="from-top mb-0">See More</h5>
                                                    </figcaption>
                                                </figure>
                                                <div class="post-header">
                                                    <div class="post-category text-line text-navy">
                                                        <a href="#" class="hover text-navy" rel="category">#Musician</a>
                                                    </div>
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h1 mt-1 mb-3">Crows</h2>
                                                    <h2 class="post-title h6 mt-1 mb-3">Ultricies fusce porta elit</h2>
                                                </div>
                                            </article>
                                            <!-- /article -->
                                        </div>
                                        <!--/.swiper-slide -->
                                        <div class="swiper-slide">
                                            <article>
                                                <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="#"> <img src="<?= base_url('') ?>assets/front/img/photos/b7.jpg" alt="" /></a>
                                                    <figcaption>
                                                        <h5 class="from-top mb-0">See More</h5>
                                                    </figcaption>
                                                </figure>
                                                <div class="post-header">
                                                    <div class="post-category text-line text-navy">
                                                        <a href="#" class="hover text-navy" rel="category">#Cosplayer</a>
                                                    </div>
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h1 mt-1 mb-3">Laz</h2>
                                                    <h2 class="post-title h6 mt-1 mb-3">Morbi leo risus porta eget</h2>
                                                </div>
                                            </article>
                                            <!-- /article -->
                                        </div>
                                        <!--/.swiper-slide -->
                                    </div>
                                    <!--/.swiper-wrapper -->
                                </div>
                                <!-- /.swiper -->
                            </div>
                            <!-- /.swiper-container -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section>
            <!-- /section -->
        </section>    
    </div>
    <!-- /.content-wrapper -->
    <footer class="bg-dark text-inverse">
        <div class="container py-13 py-md-15">
            <div class="row gy-6 gy-lg-0">
                <div class="col-lg-4">
                    <div class="widget">
                        <img class="mb-4" src="<?= base_url('') ?>assets/front/img/logo-light.png" srcset="<?= base_url('') ?>assets/front/img/logo-light@2x.png 2x" alt="" />
                        <p class="mb-4">© 2023 Sandbox. All rights reserved.</p>
                        <nav class="nav social social-white">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-2 offset-lg-2">
                    <div class="widget">
                        <h4 class="widget-title mb-3 text-white">Need Help?</h4>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Get Started</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title mb-3 text-white">Learn More</h4>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Features</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title mb-3 text-white">Get in Touch</h4>
                        <address>Moonshine St. 14/05 Light City, London, United Kingdom</address>
                        <a href="mailto:first.last@email.com">info@email.com</a><br /> 00 (123) 456 78 90
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </footer>
    <script src="<?= base_url('') ?>assets/front/js/plugins.js"></script>
    <script src="<?= base_url('') ?>assets/front/js/theme.js"></script>
</body>

</html>