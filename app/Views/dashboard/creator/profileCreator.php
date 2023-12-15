<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/cropperjs/cropper.min.css">

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
               <div class="row">
                  <div class="col-12 col-sm-5">
                     <div class="mb-4">
                        <label class="form-label" for="profilePicture">Profile Picture</label>
                        <div class="avatar mb-3">
                           <img class="img-avatar img-avatar-thumb" style="width:140px;height:140px;" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $user['userAvatar']?>" alt="">
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm push" data-bs-toggle="modal" data-bs-target="#modal-profile-image"><i class="si si-cloud-upload"></i> New Profile Picture</button>
                     </div>
                     <div class="mb-4">
                        <label class="form-label" for="banner">Banner</label>
                        <div class="banner mb-3">
                           <img class="w-100" id="bannerView" src="<?= base_url() ?>assets/uploads/banner/<?= $creator['creatorBanner']?>" alt="">
                           <p class="mt-2">Banner resolution : 900 x 225 px</p>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm push" id="newBanner"><i class="si si-cloud-upload"></i> New Banner</button>
                        <input type="file" accept="image/*" class="form-control" id="inputBanner" style="display:none;" name="banner">
                     </div>
                     <div class="mb-4">
                        <label class="form-label" for="socmed">Social Media</label>
                        <?php foreach ($social as $data) : ?>
                        <div class="input-group mb-2">
                           <div class="p-2 bg-primary-lighter"><i style="width: 16px;" class="<?= ($data['socialMedia'] == 'website') ? 'fa fa-globe' : 'fab fa-' . $data['socialMedia'] ?>"></i></div>
                           <input type="text" readonly class="form-control form-control-alt" value="<?= $data['socialLink'] ?>">
                           <button id="editSocial" class="btn btn-info" data-platform="<?= $data['socialMedia'] ?>" data-value="<?= $data['socialLink'] ?>" data-id="<?= $data['socialId'] ?>"><i class="si si-pencil"></i></button>
                           <btn id="tombol" social-id="<?= $data['socialId'] ?>" class="btn btn-danger"><i class="si si-trash"></i></btn>
                        </div>
                        <?php endforeach ?>
                        <div class="mb-4 mt-3">
                           <button type="button" class="btn btn-outline-secondary btn-sm push" data-bs-toggle="modal" data-bs-target="#modal-block-vcenter"><i class="nav-main-link-icon fa fa-plus"></i> Add links</button>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-1"></div>
                  <div class="col-12 col-sm-5">
                     <form action="<?= base_url('dashboard/profile/creator')?>" method="post">
                        <div class="mb-4">
                           <label class="form-label" for="alias">Alias</label>
                           <input type="text" class="form-control" id="alias" name="alias" placeholder="Creator Alias" value="<?= $creator['creatorAlias'] ?>" required>
                           <input type="hidden" class="form-control" id="alias" name="old_alias" placeholder="Creator Alias" value="<?= $creator['creatorAlias'] ?>" required>
                        </div>
                        <div class="mb-4">
                           <label class="form-label" for="description">Description</label>
                           <textarea class="form-control" id="description" name="description" rows="4" placeholder="Creator Description......"><?= $creator['creatorDescription'] ?></textarea>
                        </div>
                        <div class="mb-4">
                           <label class="form-label" for="creatorTag">Creator Tag</label>
                           <select class="js-select2 form-select" id="example-select2-multiple" name="creatorTag[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                              <?php foreach ($option as $value) : ?>
                              <?php
                                    $databaseValues = explode(',', $creator['creatorTag']);
                                    $lowercaseDatabaseValues = array_map('strtolower', $databaseValues);
                                    $selected = (in_array(strtolower($value), $lowercaseDatabaseValues)) ? 'selected' : '';
                                    ?>
                              <option value="<?= strtolower($value) ?>" <?= $selected ?>><?= $value ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" data-bs-dismiss="modal">Save Change</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="tab-pane mb-4" id="btabs-static-profile" role="tabpanel" aria-labelledby="btabs-static-profile-tab" tabindex="0">
               <h4 class="fw-normal">Edit Subscription Price</h4>
               <form action="<?= base_url('dashboard/profile/creator')?>" method="post" class="row">
                  <div class="col-sm-6 col-12">
                     <label class="form-label" for="creatorSubPrice">Price</label>
                     <input type="number" class="form-control" id="creatorSubPrice" name="creatorSubPrice" placeholder="Subs price" value="<?= $creator['creatorSubPrice']?>">
                     <button type="submit" class="btn btn-primary mt-3" data-bs-dismiss="modal">Submit</button>
                  </div>
                  <div class="col-sm-6 col-12"></div>
               </form>
               <h4 class="fw-normal mt-4">Data subscription</h4>
               <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                  <thead>
                     <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th class="d-none" style="width: 15%;">ID</th>
                        <th>Name</th>
                        <th style=" width: 30%;">Email</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;?>
                     <?php foreach ($subs as $key => $value): ?>
                     <tr>
                        <td class="text-center fs-sm"><?= $no++ ?></td>
                        <td class="d-none fw-semibold fs-sm"><?= $value['subId'] ?></td>
                        <td class="fw-semibold fs-sm"><?= $value['name_user'] ?></td>
                        <td class="fs-sm"><?= $value['email_user'] ?></span>
                        </td>
                     </tr>
                     <?php endforeach; ?>
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
            <form action="<?= base_url('dashboard/profile/creator/social/add') ?>" method="post">
               <div class="block-content fs-sm">
                  <div class="mb-4">
                     <label class="form-label" for="socmed">Type</label>
                     <select class="form-control" name="socialMedia" id="socialMedia">
                        <option value="facebook">Facebook</option>
                        <option value="twitter">Twitter</option>
                        <option value="instagram">Instagram</option>
                        <option value="tiktok">Tiktok</option>
                        <option value="youtube">Youtube</option>
                        <option value="twitch">Twitch</option>
                        <option value="discord">Discord</option>
                        <option value="website">Website</option>
                     </select>
                  </div>
                  <div class="input-group mb-4">
                     <span class="input-group-text" id="linkDefault">https://facebook.com/</span>
                     <input type="text" class="form-control" id="socmed" name="socialLink" placeholder="Username" required>
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

<div class="modal" id="modal-edit-social" tabindex="-1" role="dialog" aria-labelledby="modal-edit-social" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="block block-rounded block-transparent mb-0">
            <div class="block-header block-header-default">
               <h3 class="block-title">Edit Social Media links</h3>
               <div class="block-options">
                  <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa fa-fw fa-times"></i>
                  </button>
               </div>
            </div>
            <form action="<?= base_url('dashboard/profile/creator/social/edit') ?>" method="post">
               <div class="block-content fs-sm">
                  <div class="mb-4">
                     <label class="form-label" for="socmed">Type</label>
                     <select class="form-control" name="socialMedia" id="socialMediaEdit" disabled>
                        <option value="facebook">Facebook</option>
                        <option value="twitter">Twitter</option>
                        <option value="instagram">Instagram</option>
                        <option value="tiktok">Tiktok</option>
                        <option value="youtube">Youtube</option>
                        <option value="twitch">Twitch</option>
                        <option value="discord">Discord</option>
                        <option value="website">Website</option>
                     </select>
                  </div>
                  <div class="input-group mb-4">
                     <span class="input-group-text" id="linkDefaultEdit">https://facebook.com/</span>
                     <input type="text" class="form-control" id="socmedEdit" name="socialLink" placeholder="Username" required>
                     <input type="hidden" name="socialId" id="socialIdEdit" value="">
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

<div class="modal" id="modal-profile-image" tabindex="-1" role="dialog" aria-labelledby="modal-profile-image" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
         <div class="block block-rounded block-transparent mb-0">
            <div class="block-header block-header-default">
               <h3 class="block-title">Upload Avatar</h3>
               <div class="block-options">
                  <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa fa-fw fa-times"></i>
                  </button>
               </div>
            </div>
            <form action="<?= base_url('dashboard/profile/creator/profile-picture') ?>" method="post" enctype="multipart/form-data">
               <div class="block-content fs-sm text-center my-3">
                  <div class="avatar mb-3">
                     <img class="img-avatar img-avatar-thumb" style="width:140px;height:140px;" id="userAvatarimage" src="<?= base_url() ?>assets/uploads/photo_profile/<?= $user['userAvatar']?>" alt="">
                  </div>
                  <a class="btn btn-outline-danger btn-sm" id="newProfile"><i class="si si-cloud-upload"></i> Upload Picture</a>
                  <input type="file" accept="image/png,image/jpg,image/jpeg" class="form-control d-none" id="userAvatar" name="userAvatar">
                  <button type="submit" class="btn btn-sm btn-primary form-control my-3" data-bs-dismiss="modal">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal" id="modal-crop-banner" tabindex="-1" role="dialog" aria-labelledby="modal-crop-banner" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="block block-rounded block-transparent mb-0">
            <div class="block-header block-header-default">
               <h3 class="block-title">Crop Banner</h3>
               <div class="block-options">
                  <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa fa-fw fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="block-content fs-sm">
               <div class="mb-4">
                  <img id="gambar" src="" class="w-100 h-auto" width="900" height="225">
                  <button class="btn btn-sm btn-primary my-3 form-control" id="potong">Crop & Save Banner</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>

<!-- jQuery (required for DataTables plugin) -->
<script src="<?= base_url() ?>assets/dashboard/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_tables_datatables.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/pages/be_comp_dialogs.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/cropperjs/cropper.min.js"></script>
<!-- Page JS Helpers (Select2) -->
<script>
One.helpersOnLoad(['jq-select2', ]);

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

var urlMap = {
   'facebook': 'https://facebook.com/',
   'twitter': 'https://twitter.com/',
   'instagram': 'https://instagram.com/',
   'tiktok': 'https://tiktok.com/',
   'youtube': 'https://youtube.com/',
   'twitch': 'https://twitch.tv/',
   'discord': 'https://discord.com/',
   'website': {
      'url': 'https://',
      'placeholder': 'Website Url'
   }
};

// Form Social Media
$(document).on('change', '#socialMedia', function(event) {
   var selectedValue = this.value;
   var linkElement = document.getElementById('linkDefault');
   var inputElement = document.getElementById('socmed');
   var url = '';
   var place = 'Username';

   if (selectedValue in urlMap) {
      if (selectedValue === 'website') {
         url = urlMap[selectedValue].url;
         place = urlMap[selectedValue].placeholder;
      } else {
         url = urlMap[selectedValue];
      }
   }

   linkElement.innerText = url;
   inputElement.placeholder = place;
});

$(document).on('click', '#editSocial', function() {
   const modal = new bootstrap.Modal(document.getElementById('modal-edit-social'));
   const id = this.getAttribute('data-id');
   const platform = this.getAttribute('data-platform');
   const link = this.getAttribute('data-value');
   var socialMediaEdit = document.getElementById('socialMediaEdit');
   var linkElement = document.getElementById('linkDefaultEdit');
   var inputElement = document.getElementById('socmedEdit');
   var url = '';
   var place = 'Username';

   if (platform in urlMap) {
      if (platform === 'website') {
         url = urlMap[platform].url;
         place = urlMap[platform].placeholder;
      } else {
         url = urlMap[platform];
      }
   }

   document.getElementById('socialIdEdit').value = id;
   linkElement.innerText = url;
   inputElement.placeholder = place;
   inputElement.value = link;
   socialMediaEdit.value = platform;
   modal.show();
});

// Delete Social Media
$(document).on('click', '#tombol', function() {
   const id = this.getAttribute('social-id');
   Swal.fire({
      title: "Apakah ingin menghapus data ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Iya!",
      cancelButtonText: "Ga Dulu!",
   }).then((result) => {
      if (result.isConfirmed) {
         window.location.href = `<?= base_url('dashboard/profile/creator/social/delete/') ?>${id}`;
      }
   });
});


// Photo Profile
$(document).on('click', '#newProfile', function(event) {
   $("#userAvatar").click();
})

$(document).on("change", "#userAvatar", function(event) {
   var selectedFile = event.target.files[0];
   var reader = new FileReader();

   reader.onload = function(e) {
      $("#userAvatarimage").attr("src", e.target.result);
   };
   reader.readAsDataURL(selectedFile);
});

// Crop Banner
const inputGambar = document.getElementById('inputBanner');
const gambar = document.getElementById('gambar');
const potongButton = document.getElementById('potong');
const allowedFormats = ['image/jpeg', 'image/jpg', 'image/png'];

$(document).on('click', '#newBanner', function(event) {
   $("#inputBanner").click();
})

inputGambar.addEventListener('change', function(e) {
   const file = e.target.files[0];
   const reader = new FileReader();

   reader.onload = function(event) {
      const fileType = file.type;
      gambar.src = '';
      if (allowedFormats.includes(fileType)) {
         destroyCropper();
         gambar.src = event.target.result;
         initCropper();
         const myModal = new bootstrap.Modal(document.getElementById('modal-crop-banner'));
         myModal.show();
      } else {
         Swal.fire({
            title: "Oops...",
            text: 'Hanya file dengan format JPG, JPEG, atau PNG yang diperbolehkan.',
            icon: "error"
         });
         inputGambar.value = '';
      }
   };

   if (file) {
      reader.readAsDataURL(file);
   }
});

function initCropper() {
   const cropper = new Cropper(gambar, {
      aspectRatio: 4 / 1,
      viewMode: 1,
   });

   potongButton.addEventListener('click', function() {
      const canvas = cropper.getCroppedCanvas({
         width: 900,
         height: 225,
      });

      const dataURL = canvas.toDataURL('image/png');

      fetch(`<?= base_url('dashboard/profile/creator/change-banner')?>`, {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json'
            },
            body: JSON.stringify({
               creatorBanner: dataURL
            })
         })
         .then(response => {
            if (response.ok) {
               return response.json();
            }
            throw new Error('Terjadi kesalahan saat menyimpan gambar ke database.');
         })
         .then(data => {
            location.reload();
         })
         .catch(error => {
            location.reload();
         });
   });
}

function destroyCropper() {
   const cropperElement = document.getElementById('gambar');
   const data = cropperElement?.cropper?.destroy();
}
</script>
<?= $this->endsection() ?>