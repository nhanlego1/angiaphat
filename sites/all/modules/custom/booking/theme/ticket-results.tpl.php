<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 01/11/2016
 * Time: 10:39
 */

?>

<?php if (isset($ticket_results) && !empty($ticket_results)): ?>

<form action="" method="post" id="booking_ticket_<?php print $ticket_results['type'] ?>" class="booking-ticket-<?php print $ticket_results['type'] ?>" name="booking_ticket_<?php print $ticket_results['type'] ?>">
    <div class="ticket-result">
        <div class="row">
            <?php if ($ticket_results['first_leg']): ?>
                <div class="ticket-result-first_leg">
                    <div class="heading">
                        <h4><?php print t('Điểm đi') ?>
                            : <?php print _get_code(@agp_getValue($booking_data, 'filter.FromPlaceName')) ?>
                            <img alt="airplane-icon"
                                 src="/./sites/all/modules/custom/booking/assets/images/airplane-icon.png">
                            <?php print _get_code(@agp_getValue($booking_data, 'filter.ToPlaceName')) ?>
                            -
                            Ngày <?php print @agp_getValue($booking_data, 'filter.DepartDate'); ?>
                        </h4>
                    </div>
                    <div>
                        <ul class="tbl-ticket-result">
                            <div class="title-header-warapper">
                                <ul class="title-header">
                                    <li><?php print t('Hãng') ?></li>
                                    <li><?php print t('Mã') ?></li>
                                    <li><?php print t('Giờ Bay') ?></li>
                                    <li><?php print t('Giá Vé') ?></li>
                                    <li><?php print t('Xem thêm') ?></li>
                                </ul>
                            </div>
                            <?php $from = _sort_price($ticket_results['first_leg']);
                            $count = 0;
                            foreach ($from as $ticket): ?>
                            <li data-sort="<?php print $ticket->Price ?>" class="detail-wrapper">

                                <div
                                    class="logo-airline <?php print BookingHelper::getClassByAirlineCode(agp_getValue($ticket, 'AirlineCode')) ?>">

                                </div>

                                <div
                                    class="flight-number"><?php print agp_getValue($ticket, 'FlightNumber') ?>
                                </div>
                                <div
                                    class="depart-time"><?php print BookingHelper::getTime(@agp_getValue($ticket, 'DepartTime'), agp_getValue($ticket, 'LandingTime')) ?>
                                </div>
                                <div
                                    class="price">
                                    <span><?php print BookingHelper::getPrice(@agp_getValue($ticket, 'Price'), 'N\A') ?></span>
                                </div>
                                <div class="detail">
                                    <a href="#">
                                        <span>Chi tiết </span>

                                    </a>
                                    <span class="choose-ticket">
                                            <input type="radio" class="ticket-selection" value='<?php print drupal_json_encode($ticket) ?>' name="ticket[]" />
                                        </span>
                                </div>

                                <ul>
                                    <?php foreach ($ticket->Details as $detail): ?>
                                        <li>
                                            <div class="start-from">
                                                <span> Khởi hành từ <?php print $detail->From ?></span>
                                                <span> lúc <?php print BookingHelper::getTime($detail->DepartTime); ?></span>
                                            </div>
                                            <div class="end-to">
                                                <span> Đến <?php print $detail->To ?></span>
                                                <span> lúc <?php print BookingHelper::getTime($detail->LandingTime); ?></span>
                                            </div>
                                            <div class="detail-fly">
                                                <span>Hãng: <?php print $detail->Airline ?></span>
                                                <span>Số hiệu: <?php print $detail->FlightNumber ?></span>
                                                <span> Thời gian bay: <?php print $detail->FlightDuration ?></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php //$count = array_count_values($ticket->TicketPriceDetails); dsm($count); ?>
                                    <?php $arr = array();
                                    $fee = 0; ?>
                                    <li>
                                        <div class="decription-label">Loại hành khách</div>
                                        <div class="price-each-label"> Đơn giá</div>
                                        <div class="number-label"> Số lượng</div>
                                        <div class="total-each-label"> Tổng cộng</div>
                                        <?php foreach ($ticket->TicketPriceDetails as $pricedetail): ?>

                                            <?php $arr[$pricedetail->Code] = $pricedetail->Code ?>

                                            <?php if ($pricedetail->Code == 'NET'): ?>


                                                <div
                                                    class="decription"><?php print $pricedetail->Description ?></div>
                                                <div class="price-each">
                                                    <?php print getPrice($pricedetail->Price, 'N\A') ?></div>
                                                <div class="number">
                                                    <?php print $pricedetail->Quantity ?></div>
                                                <div class="total-each">
                                                    <?php print getPrice($pricedetail->Total, 'N\A') ?></div>

                                            <?php else: ?>
                                                <?php $fee += $pricedetail->Total ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </li>
                                    <li class="tax">
                                        <span>Thuế và phí:</span> <?php print getPrice($fee, 'N\A', 'tax') ?>
                                    </li>
                                    <li class="total-amount">
                                        <span> Tổng cộng: </span><?php print getPrice($ticket->TotalPrice, 'N\A','tax') ?>
                                    </li>

                                    <div class="clearfix"></div>
                                </ul>
                            </li>
                            <?php $count ++; ?>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div style="clear: both"></div>
</form>
<?php endif ?>


