<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 01/11/2016
 * Time: 10:39
 */
?>
<h2>Kết quả</h2>

<?php if (isset($ticket_results) && !empty($ticket_results)): ?>


    <div class="ticket-result">
        <div class="row">
            <?php if ($ticket_results['first_leg']): ?>
                <div class="ticket-result-first_leg">
                    <div class="heading">
                        <h4><?php print t('Chiều đi') ?>
                            : <?php print @agp_getValue($booking_data, 'filter.FromPlaceName') ?>
                            <img alt="airplane-icon"
                                 src="/./sites/all/modules/custom/booking/assets/images/airplane-icon.png">
                            <?php print @agp_getValue($booking_data, 'filter.ToPlaceName') ?>
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

                            foreach ($from as $ticket): ?>
                                <li class="detail-wrapper">

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
                                        <a href="#"><span>Chi tiết +</span></a>
                                    </div>

                                    <ul>
                                        <li>
                                            <div class="start-from">
                                                <span> Khởi hành từ <?php print @agp_getValue($booking_data, 'filter.FromPlaceName') ?></span>
                                                <span> lúc <?php print BookingHelper::getTime(@agp_getValue($ticket, 'DepartTime')); ?></span>
                                            </div>
                                            <div class="end-to">
                                                <span> Đến <?php print @agp_getValue($booking_data, 'filter.ToPlaceName') ?></span>
                                                <span> lúc <?php print BookingHelper::getTime(@agp_getValue($ticket, 'LandingTime')); ?></span>
                                            </div>
                                            <div class="detail-fly">
                                                <span>Hãng: <?php print $ticket->Details[0]->Airline ?></span>
                                                <span>Số hiệu: <?php print $ticket->Details[0]->FlightNumber ?></span>
                                                <span> Thời gian bay: <?php print $ticket->Details[0]->FlightDuration ?></span>
                                            </div>
                                        </li>
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
                                            <span>Thuế và phí:</span> <?php print getPrice($fee, 'N\A') ?>
                                        </li>
                                        <li class="total-amount">
                                            <span> Tổng cộng: </span><?php print getPrice($ticket->TotalPrice, 'N\A') ?>
                                        </li>

                                        <div class="clearfix"></div>
                                    </ul>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <p> Không tìm thấy kết quả. </p>
            <?php endif; ?>

            <?php if ($ticket_results['return_leg']): ?>
                <div class="ticket-result-return_leg">
                    <div class="heading">
                        <h4><?php print t('Chiều về') ?>
                            : <?php print @agp_getValue($booking_data, 'filter.ToPlaceName') ?>
                            <img alt="airplane-icon"
                                 src="/./sites/all/modules/custom/booking/assets/images/airplane-icon.png">
                            <?php print @agp_getValue($booking_data, 'filter.FromPlaceName') ?>
                            -
                            Ngày <?php print @agp_getValue($booking_data, 'filter.ReturnDate'); ?>
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

                            <?php $to = _sort_price($ticket_results['return_leg']);
                            foreach ($to as $ticketr): ?>
                                <li class="detail-wrapper">
                                    <div
                                        class="logo-airline <?php print BookingHelper::getClassByAirlineCode(agp_getValue($ticketr, 'AirlineCode')) ?>"></div>

                                    <div
                                        class="flight-number"><?php print agp_getValue($ticketr, 'FlightNumber') ?></div>
                                    <div
                                        class="depart-time"><?php print BookingHelper::getTime(@agp_getValue($ticketr, 'DepartTime'), agp_getValue($ticketr, 'LandingTime')) ?></div>
                                    <div class="price">
                                        <span><?php print BookingHelper::getPrice(@agp_getValue($ticketr, 'Price'), 'N\A') ?></span>
                                    </div>
                                    <div class="detail">
                                        <a href="#"><span>Chi tiết +</span></a>
                                    </div>


                                    <ul>
                                        <li>
                                            <div class="start-from">
                                                <span> Khởi hành từ <?php print @agp_getValue($booking_data, 'filter.FromPlaceName') ?></span>
                                                <span> lúc <?php print BookingHelper::getTime(@agp_getValue($ticketr, 'DepartTime')); ?></span>
                                            </div>
                                            <div class="end-to">
                                                <span> Đến <?php print @agp_getValue($booking_data, 'filter.ToPlaceName') ?></span>
                                                <span> lúc <?php print BookingHelper::getTime(@agp_getValue($ticketr, 'LandingTime')); ?></span>
                                            </div>
                                            <div class="detail-fly">
                                                <span>Hãng: <?php print $ticketr->Details[0]->Airline ?></span>
                                                <span>Số hiệu: <?php print $ticketr->Details[0]->FlightNumber ?></span>
                                                <span> Thời gian bay: <?php print $ticketr->Details[0]->FlightDuration ?></span>
                                            </div>
                                        </li>
                                        <?php //$count = array_count_values($ticket->TicketPriceDetails); dsm($count); ?>
                                        <?php $arr = array();
                                        $fee = 0; ?>
                                        <li>
                                            <div class="decription-label">Loại hành khách</div>
                                            <div class="price-each-label"> Đơn giá</div>
                                            <div class="number-label"> Số lượng</div>
                                            <div class="total-each-label"> Tổng cộng</div>
                                            <?php foreach ($ticketr->TicketPriceDetails as $pricedetail):  ?>

                                                <?php $arr[$pricedetail->Code] = $pricedetail->Code ?>

                                                <?php if ($pricedetail->Code == 'NET'): ?>

                                                    <div
                                                        class="decription"><?php print $pricedetail->Description ?></div>
                                                    <div
                                                        class="price-each"><?php print getPrice($pricedetail->Price, 'N\A') ?></div>
                                                    <div class="number"><?php print $pricedetail->Quantity ?></div>
                                                    <div
                                                        class="total-each"><?php print getPrice($pricedetail->Total, 'N\A') ?></div>

                                                <?php else: ?>
                                                    <?php $fee += $pricedetail->Total ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </li>
                                        <li class="tax">
                                            <span>Thuế và phí:</span> <?php print getPrice($fee, 'N\A') ?>
                                        </li>
                                        <li class="total-amount">
                                            <span> Tổng cộng: </span><?php print getPrice($ticketr->TotalPrice, 'N\A') ?>
                                        </li>

                                        <div class="clearfix"></div>
                                    </ul>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <p> Không tìm thấy kết quả. </p>
            <?php endif; ?>
        </div>
    </div>
    <div style="clear: both"></div>
<?php endif ?>

