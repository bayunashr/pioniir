<?php $pager->setSurroundCount(2) ?>

<nav class="d-flex mt-8 justify-content-center" aria-label="pagination">
   <ul class="pagination">
      <li>
         <a class="page-link <?= $pager->hasPreviousPage() ? '' : 'disabled' ?>" href="<?= $pager->hasPreviousPage() ? $pager->getPreviousPage() : '' ?>" aria-label="<?= lang('Pager.previous') ?>">
            <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
         </a>
      </li>

      <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
         <a class="page-link" href="<?= $link['uri'] ?>">
            <?= $link['title'] ?>
         </a>
      </li>
      <?php endforeach ?>

      <li>
         <a class="page-link <?= $pager->hasNextPage() ? '' : 'disabled' ?>" href="<?= $pager->hasNextPage() ? $pager->getNextPage() : '#' ?>" aria-label="<?= lang('Pager.next') ?>">
            <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
         </a>
      </li>
   </ul>
</nav>