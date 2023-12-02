<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('header-addons') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Milestone</h3>
            </div>
            <div class="block-content block-content-full">
                <form action="" method="post">
                    <div class="mb-4">
                        <label class="form-label" for="milestoneName">Milestone Name</label>
                        <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="text" class="form-control" id="milestoneName" name="milestoneName" placeholder="Name">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="milestoneTarget">Target</label>
                        <input style="border-width: 0 0 1px 0; box-shadow:none; border-radius:0;" type="number" class="form-control" id="milestoneTarget" name="milestoneTarget" placeholder="Milestone Target">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="milestonetStatus">Status</label>
                        <select class="form-select" id="milestonetStatus" name="milestonetStatus">
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