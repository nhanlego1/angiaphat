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
    <?php print $fields['field_images']->content ?>
    <div class="box_bot">
      <div class="maxheight" style="height: 70px;">
        <div class="box_inner">
          <div class="text1">
            <a
              href="<?php print url('node/' . $row->nid) ?>"><?php print (isset($row->node_title)) ? $row->node_title : 'N/A' ?></a>
            <div
              class="col1 txf"><?php print $fields['field_price']->content ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
