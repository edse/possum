<div class="pagination pagination-right" style="float: right;">
  <ul>
    <li><a href="<?php echo url_for('@asset') ?>?page=<?php echo $pager->getPreviousPage() ?>">Prev</a></li>

<?php foreach ($pager->getLinks() as $page): ?>
  <?php if ($page == $pager->getPage()): ?>
    <li class="active"><a href="#"><?php echo $page ?></a></li>
  <?php else: ?>
    <li><a href="<?php echo url_for('@asset') ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
  <?php endif; ?>
<?php endforeach; ?>

    <li><a href="<?php echo url_for('@asset') ?>?page=<?php echo $pager->getNextPage() ?>">Next</a></li>
  </ul>
</div>
