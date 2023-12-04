<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Post</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="<?= base_url('dashboard/post/add') ?>" method="post">
                    <div class="mb-4">
                        <label class="form-label" for="postTitle">Post Title</label>
                        <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Title">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="postValue">Post Content</label>
                        <!-- CKEditor Container -->
                        <textarea id="js-ckeditor" name="postValue">Tulis sesuatu, masukkan gambar, sisipkan tautan.....</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="postStatus">Status</label>
                        <select class="form-select" id="postStatus" name="postStatus" >
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
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
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url('') ?>assets/dashboard/js/oneui.app.min.js"></script>
<script src="<?= base_url('') ?>assets/dashboard/js/plugins/ckeditor/ckeditor.js"></script>
<!-- Page JS Code -->
<script>
    One.helpersOnLoad(['js-ckeditor']);
</script>
<?= $this->endsection() ?>