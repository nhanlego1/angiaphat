<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 25/10/2016
 * Time: 13:38
 */
?>
<div class="crs agp-views-service">
  <?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
  <?php endforeach; ?>

  <div class="clear"></div>
  <?php if (count($rows) > 0 && @is_null($view->total_rows)): ?>
    <a href="<?php print url('dich-vu')?>" class="btn">See all deals</a>
  <?php endif; ?>
</div>
