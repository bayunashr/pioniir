<?= $this->extend('front/templateUser') ?>

<?= $this->section('pages') ?>
<h4>My Account</h4>
<form action="<?= base_url('user/profile') ?>" method="post" class="mb-10" enctype="multipart/form-data">
   <div class="mb-4">
      <label class="form-label meta" for="profilePicture">Profile Picture</label>
      <div class="mb-3">
         <img class="rounded-circle w-16" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $user['userAvatar'] ?>" alt="" id="photo_profile" />
      </div>
      <input type="file" class="d-none" name="userAvatar" id="inputAvatar">
      <button type="button" class="btn btn-outline-danger btn-sm push" id="buttonNewAvatar"><i class="si si-cloud-upload"></i> New Profile Picture</button>
   </div>
   <div class="form-floating mb-4">
      <input id="username" name="userName" type="text" class="form-control" placeholder="User Name" value="<?= $user['userName'] ?>" required>
      <input id="username" name="old_userName" type="hidden" value="<?= $user['userName'] ?>">
      <label for="username">User Name</label>
   </div>
   <div class="form-floating mb-4">
      <input id="userfullname" name="userFullName" type="text" class="form-control" placeholder="Full Name" value="<?= $user['userFullName'] ?>" required>
      <label for="userfullname">Full Name</label>
   </div>
   <div class="form-floating mb-4">
      <input id="email" name="userEmail" type="email" class="form-control" placeholder="Email" value="<?= $user['userEmail'] ?>" required>
      <input id="email" name="old_userEmail" type="hidden" value="<?= $user['userEmail'] ?>">
      <label for="email">Email</label>
   </div>
   <button type="submit" class="btn btn-green btn-sm rounded btn-login w-100 mb-2">Submit</button>
</form>
<hr class="my-1">
<h4 class="mt-5">Reset Password</h4>
<form action="<?= base_url('user/profile') ?>" method="post" class="mt-5">
   <div class="form-floating password-field mb-4">
      <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
      <span class="password-toggle"><i class="uil uil-eye"></i></span>
      <label for="password">Password</label>
   </div>
   <div class="form-floating password-field mb-4">
      <input type="password" class="form-control" placeholder="Confirm Password" id="passwordConfirm" name="passwordConfirm" required>
      <span class="password-toggle"><i class="uil uil-eye"></i></span>
      <label for="passwordConfirm">Confirm Password</label>
   </div>
   <button type="submit" class="btn btn-green btn-sm rounded btn-login w-100 mb-2">Reset Password</button>
</form>
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
<?php if(session()->getFlashdata('error') || session()->getFlashdata('validation')) : ?>
var pesan = <?= session()->getFlashdata('error') ? json_encode(session()->getFlashdata('error')) : json_encode(current(session()->getFlashdata('validation')))?>;
Swal.fire({
   icon: "error",
   title: "Oops...",
   text: pesan,
});
<?php endif; ?>

$(document).on('click', '#buttonNewAvatar', function(event) {
   $("#inputAvatar").click();
})

$(document).on("change", "#inputAvatar", function(event) {
   var selectedFile = event.target.files[0];
   var reader = new FileReader();

   reader.onload = function(e) {
      $("#photo_profile").attr("src", e.target.result);
   };
   reader.readAsDataURL(selectedFile);
});
</script>
<?= $this->endsection() ?>