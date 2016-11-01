<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 01/11/2016
 * Time: 10:39
 */
?>
<?php foreach ($ticket_results as $results):?>
  <div class="row">
    <div class="grid_12">
      <?php if (!isset($results) || empty($results)): ?>
        <p> No result </p>
      <?php else: ?>
        <table class="tbl-ticket-result">
          <thead>
          <tr>
            <th><?php print t('Hãng') ?></th>
            <th><?php print t('Mã') ?></th>
            <th><?php print t('Giờ Bay') ?></th>
            <th><?php print t('Giá Vé') ?></th>
            <th><?php print t('Mua Vé') ?></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($results as $ticket): ?>
            <tr>
              <td><?php print agp_getValue($ticket, 'Airline')?></td>
              <td><?php print agp_getValue($ticket, 'FlightNumber')?></td>
              <td><?php print agp_getValue($ticket, 'DepartTime').'-'.agp_getValue($ticket, 'LandingTime')?></td>
              <td><?php print agp_getValue($ticket, 'Price', 'N\A')?></td>
              <td><input name="booking[FlightNumber]" type="radio" value="<?php print agp_getValue($ticket, 'FlightNumber')?>"
                         id="bookingFlightNumber"
                         class="icheck"></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach;?>
