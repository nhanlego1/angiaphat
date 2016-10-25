<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 24/10/2016
 * Time: 15:10
 */
?>
<div class="grid_4">
  <div class="box">
    <img
      src="<?php @file_create_url(agp_getValue($row, 'field_field_images.0.raw.uri')) ?>"
      alt="">
    <div class="box_bot">
      <div class="maxheight" style="height: 70px;">
        <div class="box_inner">
          <div class="text1">
            <a
              href="<?php print url('node/' . $row->nid) ?>"><?php print (isset($row->node_title)) ? $row->node_title : 'N/A' ?></a>
            <div
              class="col1 txf"><?php print @agp_getValue($row, 'field_field_price.0.rendered.#markup', 'N/A') ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
