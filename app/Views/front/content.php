<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4 mb-10">
    <div class="bg-white px-1 px-sm-5 py-8 rounded">
        <div class="px-3 px-md-8 px-sm-15">
            <a href="#" class="fw-bolder hover fs-16"><i class="uil uil-angle-left-b"></i> Kembali</a>
        </div>
        <h1 class="display-5 text-center mt-10 mb-2">Content Title</h1>
        <ul class="text-center post-meta mb-5">
            <li class="post-date fs-13"><i class="uil uil-calendar-alt"></i><span> 5 Jul 2022</span></li>
            <li class="post-comments fs-13"><i class="uil uil-comment"></i> 3<span> Comments</span></li>
            <li class="post-likes fs-13"><i class="uil uil-heart-alt"></i> 3<span> Love</span></li>
        </ul>
        <div class="content-value mt-10 px-3 px-md-8 px-sm-15">
            <figure class="mb-10"><img src="<?= base_url() ?>assets/front/img/content.png" alt="" /></figure>
            <h2 class="h1 mb-4">Cras mattis consectetur purus fermentum</h2>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget porta ac consectetur vestibulum.</p>
            <p>Donec sed odio dui consectetur adipiscing elit. Etiam adipiscing tincidunt elit, eu convallis felis suscipit ut. Phasellus rhoncus tincidunt auctor. Nullam eu sagittis mauris. Donec non dolor ac elit aliquam tincidunt at at sapien. Aenean tortor libero, condimentum ac laoreet vitae, varius tempor nisi. Duis non arcu vel lectus urna mollis ornare vel eu leo.</p>
            <a href="#" class="btn btn-sm btn-yellow rounded-pill"><i class="uil uil-external-link-alt"></i> &nbsp; External Content</a>
            <div class="d-flex justify-content-between mb-5 mt-5">
                <div class="dropdown share-dropdown btn-group">
                    <button class="btn btn-sm btn-outline-primary rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-share-alt"></i> Share
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://twitter.com/intent/tweet?url=<?= current_url(true) ?>" target="_blank" rel="noopener noreferrer"><i class="uil uil-twitter"></i>Twitter</a>
                        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url(true) ?>" target="_blank" rel="noopener noreferrer"><i class="uil uil-facebook-f"></i>Facebook</a>
                        <a class="dropdown-item" href="https://t.me/share/url?url=<?= current_url(true) ?>" target="_blank" rel="noopener noreferrer"><i class="uil uil-telegram-alt"></i>Telegram</a>
                        <a class="dropdown-item" href="https://api.whatsapp.com/send?text=Check out this link: <?= current_url(true) ?>" target="_blank" rel="noopener noreferrer"><i class="uil uil-whatsapp"></i>Whatsapp</a>
                        <button class="dropdown-item" onclick="copyToClipboard()"><i class="uil uil-link-alt"></i>Copy Link</button>
                    </div>
                </div>
                <a href="#" class="btn btn-sm btn-outline-red rounded-pill btn-icon btn-icon-start"><i class="uil uil-heart"></i> Loves</a>
            </div>
            <hr class="mt-n1 mb-n1">
            <div class="comment-header d-md-flex align-items-center mt-10 mb-5">
                <div class="d-flex align-items-center">
                    <figure class="user-avatar"><img class="rounded-circle" alt="" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" /></figure>
                    <div>
                        <h6 class="comment-author mb-n1"><a href="#" class="link-dark">Fullname</a></h6>
                        <p class="post-meta">@Username</p>
                        <!-- /.post-meta -->
                    </div>
                    <!-- /div -->
                </div>
            </div>
            <form action="" method="post">
                <div class="form-floating mb-4">
                    <textarea id="comment" class="form-control" placeholder="Tulis Komentar" style="height: 200px" required></textarea>
                    <label for="comment">Tulis Komentar</label>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
            <div id="comments" class="mt-10">
                <h3 class="mb-6">5 Comments</h3>
                <ol id="singlecomments" class="commentlist">
                    <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <figure class="user-avatar"><img class="rounded-circle" alt="" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" /></figure>
                                <div>
                                    <h6 class="comment-author"><a href="#" class="link-dark">Connor Gibson</a></h6>
                                    <ul class="post-meta">
                                        <li><i class="uil uil-calendar-alt"></i>14 Jan 2022</li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /div -->
                            </div>
                        </div>
                        <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis integer posuere erat ante.</p>
                    </li>
                    <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <figure class="user-avatar"><img class="rounded-circle" alt="" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" /></figure>
                                <div>
                                    <h6 class="comment-author"><a href="#" class="link-dark">Lou Bloxham</a></h6>
                                    <ul class="post-meta">
                                        <li><i class="uil uil-calendar-alt"></i>3 May 2022</li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /div -->
                            </div>
                        </div>
                        <p>Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<script>
    function copyToClipboard() {
        var copyText = document.createElement("textarea");
        copyText.value = "<?= current_url(true) ?>";
        document.body.appendChild(copyText);
        copyText.select();
        document.execCommand("copy");
        document.body.removeChild(copyText);
        alert("Link has been copied to the clipboard!");
    }
</script>
<?= $this->endsection() ?>