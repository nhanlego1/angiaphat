<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 25/10/2016
 * Time: 16:55
 */
?>
<div id="node-<?php print $node->nid; ?>"
     class="product-detail <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="row">
        <div class="grid_6">
            <?php print  render($content['field_images']); ?>
        </div>
        <div class="grid_6">
            <?php print  render($content['field_price']); ?>
            <?php print  render($content['field_category']); ?>
        </div>
    </div>
    <div class="row content">
        <?php print render($content['body']); ?>
    </div>
    <div class="row">
        <div class="grid_6">
            <?php print render($content['links']); ?>
            <?php print render($content['comments']); ?>
        </div>
    </div>
</div>