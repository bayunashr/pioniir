<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Content</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="" method="post">
                    <div class="mb-4">
                        <label class="form-label" for="contentTitle">Title</label>
                        <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="contentTitle" name="contentTitle" placeholder="Title">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="contentPrice">Price</label>
                        <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="number" class="form-control" id="contentPrice" name="contentPrice" placeholder="Price">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="contentPreview">Preview (Thumbnail)</label>
                        <input type="file" accept="image/*" class="form-control" id="contentPreview" name="contentPreview">
                        <p class="mt-2">Resolution : 400 x 200 px</p>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="contentDownload">Downloadable File</label>
                        <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="contentTitle" name="contentTitle" placeholder="External Link">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="postValue">Description</label>
                        <!-- CKEditor Container -->
                        <textarea id="js-ckeditor" name="postValue">Tulis sesuatu, masukkan gambar, sisipkan tautan.....</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="postStatus">Status</label>
                        <select class="form-select" id="postStatus" name="postStatus">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                            <option value="archive">Archive</option>
                        </select>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">Submit</button>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
</main>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url('') ?>assets/dashboard/js/oneui.app.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/ckeditor/ckeditor.js"></script>
<!-- Page JS Code -->
<script>
    One.helpersOnLoad(['js-ckeditor']);
</script>
<?= $this->endsection() ?>