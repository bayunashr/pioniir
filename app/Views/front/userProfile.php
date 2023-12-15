<?= $this->extend('front/templateUser') ?>

<?= $this->section('pages') ?>
<h4>My Account</h4>
<form action="" method="post" class="mb-10">
    <div class="mb-4">
        <label class="form-label meta" for="profilePicture">Profile Picture</label>
        <div class="mb-3">
            <img class="rounded-circle w-13" src="<?= base_url() ?>assets/uploads/photo_profile/1.jpg" alt="" />
        </div>
        <button type="button" class="btn btn-outline-danger btn-sm push" data-bs-toggle="modal" data-bs-target="#modal-profile-image"><i class="si si-cloud-upload"></i> New Profile Picture</button>
    </div>
    <div class="form-floating mb-4">
        <input id="username" name="userName" type="text" class="form-control" placeholder="User Name">
        <label for="username">User Name</label>
    </div>
    <div class="form-floating mb-4">
        <input id="userfullname" name="userFullName" type="text" class="form-control" placeholder="Full Name">
        <label for="userfullname">Full Name</label>
    </div>
    <div class="form-floating mb-4">
        <input id="email" name="userEmail" type="email" class="form-control" placeholder="Email">
        <label for="email">Email</label>
    </div>
    <button type="submit" class="btn btn-green btn-sm rounded btn-login w-100 mb-2">Submit</button>
</form>
<hr class="my-1">
<h4 class="mt-5">Reset Password</h4>
<form action="" method="post" class="mt-5">
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