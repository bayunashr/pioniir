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
         <?php if (empty($dataDonate)) : ?>
         <tr>
            <td colspan="5" class="text-center">Data Kosong</td>
         </tr>
         <?php else : ?>
         <?php $no = 1 + (10 * ($currentPage - 1)); ?>
         <?php foreach ($dataDonate as $key => $value) : ?>
         <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $value['creatorAlias'] ?></td>
            <td><?= $value['donateDescription'] ?></td>
            <td><?= format_rupiah($value['donateAmount']) ?></td>
            <td><?= date('d F Y', strtotime($value['donateTimestamp'])); ?></td>
         </tr>
         <?php endforeach ?>
         <?php endif?>
      </tbody>
   </table>
</div>

<?= (empty($dataDonate)) ? null : $pager->links('default', 'paginate_custom') ?>
<?= $this->endsection() ?>