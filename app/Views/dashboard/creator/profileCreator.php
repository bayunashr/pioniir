<?= $this->extend('dashboard/templates/creator-layout') ?>

<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <h1>Edit Page Information</h1>
    </div>
    <!-- END Page Content -->
</main>
<?= $this->endsection() ?>

<?= $this->section('footer-addons') ?>
<script src="<?= base_url('') ?>assets/dashboard/js/oneui.app.min.js"></script>

<!-- Page JS Code -->
<script src="<?= base_url('') ?>assets/dashboard/js/pages/be_pages_dashboard.min.js"></script>
<?= $this->endsection() ?>