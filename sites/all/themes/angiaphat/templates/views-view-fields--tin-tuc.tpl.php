<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 24/10/2016
 * Time: 17:43
 */
?>
<!--<img src="/sites/all/themes/angiaphat/images/page3_img1.jpg" alt="" class="img_inner fleft">-->
<img src="<?php print (isset($row->field_field_image) && !is_null($row->field_field_image)) ? @file_create_url($row->field_field_image[0]['raw']['uri']) : 'N/A' ?>" alt="" class="img_inner fleft">
<div class="extra_wrapper">
  <div class="text1"><a href="#">Vestibulum sed ante</a></div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio.
</div>
<div class="clear cl1"></div>
