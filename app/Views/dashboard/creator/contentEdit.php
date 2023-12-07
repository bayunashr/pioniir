<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/cropperjs/cropper.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
   <!-- Page Content -->
   <div class="content">
      <div class="block block-rounded">
         <div class="block-header block-header-default">
            <h3 class="block-title">Edit Content</h3>
         </div>
         <div class="block-content block-content-full">
            <form action="<?= base_url('dashboard/content/edit/'.$content['contentId'])?>" method="post">
               <div class="mb-4">
                  <label class="form-label" for="contentTitle">Title</label>
                  <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="contentTitle" name="contentTitle" placeholder="Title" required value="<?= $content['contentTitle'] ?>">
               </div>
               <div class="mb-4">
                  <label class="form-label" for="contentPrice">Price</label>
                  <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="number" class="form-control" id="contentPrice" name="contentPrice" placeholder="Price" required value="<?= $content['contentPrice'] ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label" for="contentPreview">Preview (Thumbnail)</label>
                  <div class="banner mb-3">
                     <img style="width:400px; height:200px;" id="bannerView" src="<?= base_url('assets/uploads/thumbnail/'.$content['contentPreview']) ?>" alt="">
                     <p class="mt-2">Resolution : 400 x 200 px</p>
                  </div>
                  <button type="button" class="btn btn-outline-secondary btn-sm push" id="newThumbnail"><i class="si si-cloud-upload"></i> Upload Thumbnail</button>
                  <input style="display:none;" type="file" accept="image/*" class="form-control" id="contentPreview" name="contentImage">
                  <input type="hidden" name="contentPreview" id="imageContent" value="<?= $content['contentPreview']?>" required>
                  <input type="hidden" name="contentPreviewNew" id="imageContentNew" value="">
               </div>
               <div class="mb-4">
                  <label class="form-label" for="contentDownload">Downloadable File</label>
                  <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="contentDownload" name="contentDownload" placeholder="External Link (example:https://drive.google.com/)" required value="<?= $content['contentDownload'] ?>">
               </div>
               <div class=" mb-4">
                  <label class="form-label" for="postValue">Description</label>
                  <!-- CKEditor Container -->
                  <textarea id="js-ckeditor" name="postValue"><?= $content['contentValue'] ?></textarea>
               </div>
               <div class="mb-4">
                  <label class="form-label" for="postStatus">Status</label>
                  <select class="form-select" id="postStatus" name="postStatus">
                     <?php if($content['contentStatus'] === "publish" || $content['contentStatus'] === "archive") : ?>
                     <option <?= ($content['contentStatus'] === 'archive') ? 'selected' : '' ?> value="archive">Archive</option>
                     <?php elseif($content['contentStatus'] === "draft") :?>
                     <option <?= ($content['contentStatus'] === 'draft') ? 'selected' : '' ?> value="draft">Draft</option>
                     <?php endif; ?>
                     <option <?= ($content['contentStatus'] === 'publish') ? 'selected' : '' ?> value="publish">Publish</option>
                  </select>
               </div>
               <button type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">Submit</button>
            </form>
         </div>
      </div>
      <!-- END Dynamic Table with Export Buttons -->
   </div>
   <!-- END Page Content -->
</main>

<div class="modal" id="modal-crop-thumbnail" tabindex="-1" role="dialog" aria-labelledby="modal-crop-thumbnail" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="block block-rounded block-transparent mb-0">
            <div class="block-header block-header-default">
               <h3 class="block-title">Crop Thumbnail</h3>
               <div class="block-options">
                  <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa fa-fw fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="block-content fs-sm">
               <div class="mb-4">
                  <img id="gambar" src="" class="w-100 h-auto" width="400" height="200">
                  <button class="btn btn-sm btn-primary my-3 form-control" id="potong">Crop Thumbnail</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url() ?>assets/dashboard/js/lib/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/oneui.app.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/cropperjs/cropper.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Page JS Code -->
<script>
One.helpersOnLoad(['js-ckeditor']);

// Crop Banner
const contentPreview = document.getElementById('contentPreview');
const gambar = document.getElementById('gambar');
const potongButton = document.getElementById('potong');
const allowedFormats = ['image/jpeg', 'image/jpg', 'image/png'];
const myModal = new bootstrap.Modal(document.getElementById('modal-crop-thumbnail'));

$(document).on('click', '#newThumbnail', function(event) {
   $("#contentPreview").click();
})

contentPreview.addEventListener('change', function(e) {
   const file = e.target.files[0];
   const reader = new FileReader();

   reader.onload = function(event) {
      const fileType = file.type;
      gambar.src = '';
      if (allowedFormats.includes(fileType)) {
         destroyCropper();
         gambar.src = event.target.result;
         initCropper();
         myModal.show();
      } else {
         Swal.fire({
            title: "Oops...",
            text: 'Hanya file dengan format JPG, JPEG, atau PNG yang diperbolehkan.',
            icon: "error"
         });
         contentPreview.value = '';
      }
   };

   if (file) {
      reader.readAsDataURL(file);
   }
});

function initCropper() {
   const cropper = new Cropper(gambar, {
      aspectRatio: 2 / 1,
      viewMode: 1,
   });

   potongButton.addEventListener('click', function() {
      const canvas = cropper.getCroppedCanvas({
         width: 400,
         height: 200,
      });

      const dataURL = canvas.toDataURL('image/png');

      myModal.hide();
      $("#bannerView").attr("src", dataURL);
      document.getElementById('imageContentNew').value = dataURL;
   });
}

function destroyCropper() {
   const cropperElement = document.getElementById('gambar');
   const data = cropperElement?.cropper?.destroy();
}
</script>
<?= $this->endsection() ?>