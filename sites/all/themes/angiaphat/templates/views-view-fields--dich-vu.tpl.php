<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 24/10/2016
 * Time: 17:43
 */
?>
<img src="<?php print @image_style_url('medium', agp_getValue($row, 'field_field_image.0.raw.uri')) ?>"
  alt="<?php print @agp_getValue($row, 'node_title') ?>" title="<?php print @agp_getValue($row, 'node_title') ?>" class="img_inner fleft">
<div class="extra_wrapper">
  <div class="text1">
    <a
      href="<?php print url('node/' . $row->nid) ?>"><?php print @agp_getValue($row, 'node_title') ?></a>
  </div>
  <?php print @agp_getValue($row, 'field_body.0.raw.summary') ?>
</div>
<div class="clear cl1"></div>
