<?= $this->extend('front/templateUser') ?>

<?= $this->section('pages') ?>
<h4>Support Given</h4>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Creator</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Halo Bang</td>
                <td>Rp. 100.000</td>
                <td>23/09/2023</td>
            </tr>
        </tbody>
    </table>
</div>

<nav class="d-flex justify-content-center" aria-label="pagination">
    <ul class="pagination mb-0">
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
            </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
            </a>
        </li>
    </ul>
    <!-- /.pagination -->
</nav>
<!-- /nav -->
<?= $this->endsection() ?>