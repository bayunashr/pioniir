<?= $this->extend('front/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4 mb-10">
   <div class="bg-white px-1 px-sm-5 py-8 rounded">
      <div class="px-3 px-md-8 px-sm-15">
         <a href="<?= base_url('post/'.$post['creatorAlias']) ?>" class="fw-bolder hover fs-16"><i class="uil uil-angle-left-b"></i> Kembali</a>
      </div>
      <h1 class="display-5 text-center mt-10 mb-2"><?= $post['postTitle'] ?></h1>
      <ul class="text-center post-meta mb-5">
         <li class="post-date fs-13"><i class="uil uil-calendar-alt"></i><span> <?= date('d F Y', strtotime($post['createdAt'])); ?></span></li>
         <li class="post-comments fs-13"><i class="uil uil-comment"></i> <?= count($comment) ?><span> Comments</span></li>
         <li class="post-likes fs-13"><i class="uil uil-heart-alt"></i> <span id="totalLike"><?= $post['postLike'] ?></span><span> Love</span></li>
      </ul>
      <div class="content-value mt-10 px-3 px-md-8 px-sm-15">
         <div>
            <?= $post['postValue'] ?>
         </div>
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
            <?php if (session()->has('loginUser') && session()->has('userName') && session()->has('userFullName') && session()->has('userEmail')) : ?>
            <?php if($cekLove == null):?>
            <button class="btn btn-sm btn-outline-red rounded-pill btn-icon btn-icon-start love-button" data-post-id="<?= $post['postId'] ?>" data-love-status="love"><i class="uil uil-heart"></i> Loves</button>
            <?php else: ?>
            <button class="btn btn-sm btn-red rounded-pill btn-icon btn-icon-start love-button" data-post-id="<?= $post['postId'] ?>" data-love-status="unlove"><i class="uil uil-heart"></i> Loves</button>
            <?php endif?>
            <?php endif?>
         </div>
         <hr class="mt-n1 mb-n1">
         <?php if (session()->has('loginUser') && session()->has('userName') && session()->has('userFullName') && session()->has('userEmail')) : ?>
         <div class="comment-header d-md-flex align-items-center mt-10 mb-5">
            <div class="d-flex align-items-center">
               <figure class="user-avatar"><img class="rounded-circle" alt="" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" /></figure>
               <div>
                  <h6 class="comment-author mb-n1"><a href="#" class="link-dark"><?= esc($user['userFullName']) ?></a></h6>
                  <p class="post-meta">@<?= esc($user['userName']) ?></p>
                  <!-- /.post-meta -->
               </div>
               <!-- /div -->
            </div>
         </div>
         <form action="<?= base_url('add/comment/post') ?>" method="post">
            <div class="form-floating mb-4">
               <textarea id="comment" name="commentValue" class="form-control" placeholder="Tulis Komentar" style="height: 200px" required></textarea>
               <label for="comment">Tulis Komentar</label>
               <input type="hidden" name="postId" value="<?= $post['postId'] ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
         </form>
         <?php endif?>
         <div id="comments" class="mt-10">
            <h3 class="mb-6"><?= count($comment) ?> Comments</h3>
            <ol id="singlecomments" class="commentlist">
               <?php foreach ($comment as $key => $value) : ?>
               <li class="comment">
                  <div class="comment-header d-md-flex align-items-center">
                     <div class="d-flex align-items-center">
                        <figure class="user-avatar"><img class="rounded-circle" alt="" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" /></figure>
                        <div>
                           <h6 class="comment-author"><a class="link-dark"><?= $value['userFullName'] ?></a></h6>
                           <ul class="post-meta">
                              <li><i class="uil uil-calendar-alt"></i><?= date('d F Y', strtotime($value['createdAt'])); ?></li>
                           </ul>
                           <!-- /.post-meta -->
                        </div>
                        <!-- /div -->
                     </div>
                  </div>
                  <p><?= $value['commentValue'] ?></p>
               </li>
               <?php endforeach?>
            </ol>
         </div>
      </div>
   </div>
</div>
<?= $this->endsection() ?>
<?= $this->section('js') ?>
<script src="<?= base_url() ?>assets/dashboard/js/lib/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
// Sweet Alert
<?php if (session()->getFlashdata('success')) : ?>
var pesan = <?= json_encode(session()->getFlashdata('success')) ?>;
Swal.fire({
   title: "Good job!",
   text: pesan,
   icon: "success"
});
<?php endif; ?>
<?php if(session()->getFlashdata('error')) : ?>
var pesan = <?= session()->getFlashdata('error')?>;
Swal.fire({
   icon: "error",
   title: "Oops...",
   text: pesan,
});
<?php endif; ?>

function copyToClipboard() {
   var copyText = document.createElement("textarea");
   copyText.value = "<?= current_url(true) ?>";
   document.body.appendChild(copyText);
   copyText.select();
   document.execCommand("copy");
   document.body.removeChild(copyText);
   alert("Link has been copied to the clipboard!");
}

// Love Button
$(document).on('click', '.love-button', function() {
   var postId = this.getAttribute('data-post-id');
   var loveStatus = this.getAttribute('data-love-status');
   var totalLike = document.getElementById('totalLike').innerText;
   var currentLikes = parseInt(totalLike);

   if (loveStatus === 'love') {
      $.ajax({
         type: 'POST',
         url: '<?= base_url() ?>lovepost',
         data: {
            post_id: postId
         },
         success: function(response) {
            if (response.success) {
               $('.love-button[data-post-id="' + postId + '"]').removeClass('btn-outline-red').addClass('btn-red');
               $('.love-button[data-post-id="' + postId + '"]').attr('data-love-status', 'unlove');
               var updatedLikes = currentLikes + 1;
               document.getElementById('totalLike').innerText = updatedLikes;
            }
         },
         error: function(xhr, status, error) {
            console.error(error);
         }
      });
   } else if (loveStatus === 'unlove') {
      $.ajax({
         type: 'POST',
         url: '<?= base_url() ?>unlovepost',
         data: {
            post_id: postId
         },
         success: function(response) {
            if (response.success) {
               $('.love-button[data-post-id="' + postId + '"]').removeClass('btn-red').addClass('btn-outline-red');
               $('.love-button[data-post-id="' + postId + '"]').attr('data-love-status', 'love');
               var updatedLikes = currentLikes - 1;
               document.getElementById('totalLike').innerText = updatedLikes;
            }
         },
         error: function(xhr, status, error) {
            console.error(error);
         }
      });
   }
});
</script>
<?= $this->endsection() ?>