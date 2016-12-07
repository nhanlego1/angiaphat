<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 01/11/2016
 * Time: 10:39
 */

?>

<?php if (isset($ticket_results) && !empty($ticket_results)): ?>

    <?php if ($ticket_results['first_leg']): ?>

        <?php $from = _sort_price($ticket_results['first_leg']);
        $count = 0;
        foreach ($from as $ticket): ?>
            <li data-sort="<?php print $ticket->Price ?>" class="detail-wrapper jetstar-wrapper">

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
                                            <input type="radio" class="ticket-selection"
                                                   value='<?php print drupal_json_encode($ticket) ?>' name="ticket[]"/>
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
                        <span> Tổng cộng: </span><?php print getPrice($ticket->TotalPrice, 'N\A', 'tax') ?>
                    </li>

                    <div class="clearfix"></div>
                </ul>
            </li>
            <?php $count++; ?>
        <?php endforeach; ?>

    <?php endif; ?>

<?php endif ?>


