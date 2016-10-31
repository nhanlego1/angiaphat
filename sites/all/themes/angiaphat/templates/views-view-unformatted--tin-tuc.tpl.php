<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 24/10/2016
 * Time: 17:42
 */
?>
<div class="crs agp-views-news">
  <?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
  <?php endforeach; ?>

  <div class="clear"></div>
  <?php if (count($rows) > 0 && @is_null($view->total_rows)): ?>
    <a href="<?php print url('tin-tuc')?>" class="btn">Xem thêm</a>
  <?php endif; ?>
</div>