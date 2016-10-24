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
<!--    <img src="/sites/all/themes/angiaphat/images/page2_img3.jpg" alt="">-->
    <img src="<?php print (isset($row->field_field_images) && !is_null($row->field_field_images)) ? @file_create_url($row->field_field_images[0]['raw']['uri']) : 'N/A' ?>" alt="">
    <div class="box_bot">
      <div class="maxheight" style="height: 70px;">
        <div class="box_inner">
          <div class="text1">
            <a
              href="<?php print url('node/' . $row->nid) ?>"><?php print (isset($row->node_title)) ? $row->node_title : 'N/A' ?></a>
            <div
              class="col1 txf"><?php print (isset($row->field_field_price) && !is_null($row->field_field_price)) ? $row->field_field_price[0]['rendered']['#markup'] : 'N/A' ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
