<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
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
<figure data-cues="slideInDown" class="position-absoute" style="bottom: 0; left: 0; z-index: 2;"><img src="<?= base_url('') ?>assets/front/img/doodlebackground.png" alt="" /></figure>
<!-- /section -->
<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
        <div class="row gy-10 gy-md-13 gy-lg-0 align-items-center mb-16">
            <div class="col-md-8 col-lg-5 d-flex position-relative mx-auto" data-cues="slideInDown" data-group="header">
                <div class="img-mask"><img src="<?= base_url('') ?>assets/front/img/ilus2.png" alt="" /></div>
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
<?= $this->endsection() ?>