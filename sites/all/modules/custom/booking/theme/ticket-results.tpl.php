<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 01/11/2016
 * Time: 10:39
 */
?>
<?php if (isset($ticket_results) && !empty($ticket_results)): ?>
  <div class="ticket-result">
    <?php foreach ($ticket_results as $key => $results): ?>
      <div class="row">
        <div class="grid_12 ticket-result-<?php print $key ?>">
          <?php if (!isset($results) || empty($results)): ?>
            <p> No result </p>
          <?php else: ?>
            <div class="heading">
              <h4><?php print ('first_leg' == $key) ? t('Chiều đi') : 'Chiều về'?>: <?php print ('first_leg' == $key) ? @agp_getValue($booking_data, 'filter.FromPlace'): @agp_getValue($booking_data, 'filter.ToPlace')?> <img alt="airplane-icon" src="/./sites/all/modules/custom/booking/assets/images/airplane-icon.png">
                <?php print ('first_leg' == $key)?@agp_getValue($booking_data, 'filter.ToPlace'):@agp_getValue($booking_data, 'filter.FromPlace')?> - Ngày <?php print ('first_leg' == $key)?@agp_getValue($booking_data, 'filter.DepartDate'):@agp_getValue($booking_data, 'filter.ReturnDate')?></h4>
            </div>
            <div>
              <table class="tbl-ticket-result">
                <thead>
                <tr>
                  <th><?php print t('Hãng') ?></th>
                  <th><?php print t('Mã') ?></th>
                  <th><?php print t('Giờ Bay') ?></th>
                  <th><?php print t('Giá Vé') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($results as $ticket): ?>
                  <tr>
                    <td>
                      <div
                        class="logo-airline <?php print BookingHelper::getClassByAirlineCode(agp_getValue($ticket, 'AirlineCode')) ?>"></div>
                    </td>
                    <td
                      class="flight-number"><?php print agp_getValue($ticket, 'FlightNumber') ?></td>
                    <td
                      class="depart-time"><?php print BookingHelper::getTime(@agp_getValue($ticket, 'DepartTime'),agp_getValue($ticket, 'LandingTime')) ?></td>
                    <td
                      class="price"><span><?php print BookingHelper::getPrice(@agp_getValue($ticket, 'Price'), 'N\A') ?></span></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div style="clear: both"></div>
<?php endif ?>

