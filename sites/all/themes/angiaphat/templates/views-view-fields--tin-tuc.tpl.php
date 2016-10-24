<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 24/10/2016
 * Time: 17:43
 */
?>
<img src="<?php print (isset($row->field_field_image) && !is_null($row->field_field_image)) ? @file_create_url($row->field_field_image[0]['raw']['uri']) : 'N/A' ?>" alt="" class="img_inner fleft">
<div class="extra_wrapper">
  <div class="text1">
    <a href="<?php print url('node/' . $row->nid) ?>"><?php print (isset($row->node_title)) ? $row->node_title : 'N/A' ?></a>
  </div>
  <?php print (isset($row->field_body) && !is_null($row->field_body)) ? $row->field_body[0]['raw']['summary'] : '' ?>
</div>
<div class="clear cl1"></div>
