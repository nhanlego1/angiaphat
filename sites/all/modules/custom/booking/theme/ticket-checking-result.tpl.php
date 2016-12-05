<?php
/**
 * Created by PhpStorm.
 * User: nhan
 * Date: 12/5/16
 * Time: 1:59 PM
 */
?>

<div class="ticket-resuls-wrapper">
    <div class="depart-info">
        <div class="loading-message-depart">
            <div class="info-fly">Kết quả lượt đi</div>
            <div class="loadingimg"><img src="<?php print base_path().drupal_get_path('module','booking') ?>/assets/images/ajax-loading.gif"/></div>
            <div class="waiting-info"><?php print t('Quý khách vui lòng đợi trong giây lát.'); ?></div>
        </div>
        <div class="fromway-ticket"></div>
    </div>
    <div class="return-info">
        <div class="loading-message-return">
            <div class="info-fly">Kết quả lượt về</div>
            <div class="loadingimg"><img src="<?php print base_path().drupal_get_path('module','booking') ?>/assets/images/ajax-loading.gif"/></div>
            <div class="waiting-info"><?php print t('Quý khách vui lòng đợi trong giây lát.'); ?></div>
        </div>
        <div class="returnway-ticket"></div>
    </div>

</div>
