<?php
/**
 * Created by PhpStorm.
 * User: nhan
 * Date: 10/17/16
 * Time: 11:46 PM
 */
?>

<form id="bookingForm" action="/ticket/checking" method="post">
  <div class="sect1">
    <div class="count"><span class="col1">01.</span> <?php print t('Loại vé') ?>
    </div>
    <div class="controlHolder">
      <span>&nbsp;</span>
      <div class="tmRadio">
        <div class="lf">
          <input name="booking[type]" type="radio" value="1_way"
                 id="booking_type_1_way"
                 class="icheck" <?php print (agp_getValue($booking_data, 'type') == '1_way') ? 'checked="checked"' : '' ?>>
          <span><?php print t('Một chiều') ?></span>
          <div class="clear"></div>
        </div>
        <div class="rf">
          <input name="booking[type]" type="radio" value="2_way"
                 id="booking_type_2_way"
                 class="icheck" <?php print (agp_getValue($booking_data, 'type', '2_way') == '2_way') ? 'checked="checked"' : '' ?>>
          <span><?php print t('Khứ hồi') ?></span>
          <div class="clear"></div>

        </div>
      </div>
    </div>
  </div>
  <div class="sect2">
    <div class="count">
      <span class="col1">02.</span> <?php print t('Chiều đi') ?>
    </div>
    <div class="controlHolder">
      <span>&nbsp;</span>
      <div class="tmInput">
        <input name="booking[from]" placeholder="" type="text" class="tooltip"
               data-tooltip-content="#tooltip_content"
               id="booking_from"
               value="<?php print agp_getValue($booking_data, 'from') ?>"
               required>
      </div>
    </div>
  </div>
  <div class="sect2">

    <div class="count">
      <span class="col1">03.</span> <?php print t('Chiều về') ?>
    </div>
    <div class="controlHolder">
      <span>&nbsp;</span>
      <div class="tmInput">
        <input name="booking[to]" placeholder="" type="text" class="tooltip"
               data-tooltip-content="#tooltip_content" id="booking_to"
               value="<?php print agp_getValue($booking_data, 'to') ?>" required>
      </div>
    </div>

  </div>
  <div class="sect4">
    <div class="count"><span
        class="col1">04.</span> <?php print t('Thời gian'); ?></div>

    <div class="controlHolder"><label class="tmDatepicker">
        <span><?php print t('Ngày đi'); ?></span>
        <input type="text" name="booking[check-in]" placeholder="10/05/2014"
               id="booking_check_in" class="hasDatepicker"
               value="<?php print agp_getValue($booking_data, 'check-in') ?>" required>
      </label></div>

    <div class="controlHolder"><label class="tmDatepicker">
        <span><?php print t('Ngày về'); ?></span>
        <input type="text" name="booking[check-out]" placeholder="20/05/2014"
               id="booking_check_out" class="hasDatepicker"
               value="<?php print agp_getValue($booking_data, 'check-out') ?>" required>
      </label></div>
    <div class="clear"></div>
  </div>

  <div class="sect3">
    <div class="count">
      <span class="col1">05.</span> <?php print t('Số lượng'); ?>
    </div>
    <div class="inn1">
      <span><?php print t('Người lớn <br> trên 12T') ?></span>
      <div class="controlHolder">
        <select name="booking[people_adult]" class="tmSelect auto"
                data-class="tmSelect tmSelect2">
          <option></option>
          <?php $i = 1;
          $current = agp_getValue($booking_data, 'people_adult', 1);
          $max = agp_getValue($booking_data, 'max_people.adult', 30) ?>
          <?php while ($i <= $max): ?>

            <option <?php print 'value="' . $i . '"';
            print (($i == $current) ? 'selected' : ''); ?>><?php print $i;
              $i++; ?></option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>
    <div class="inn1">
      <span><?php print t('Trẻ em <br> 2T - 11T') ?></span>
      <div class="controlHolder"><select name="booking[people_child_mid]"
                                         class="tmSelect auto"
                                         data-class="tmSelect tmSelect2">
          <option></option>
          <?php $i = 1;
          $current = agp_getValue($booking_data, 'people_child_mid', 1);
          $max = agp_getValue($booking_data, 'max_people.child_medium', 30) ?>
          <?php while ($i <= $max): ?>
            <option <?php print 'value="' . $i . '"';
            print (($i == $current) ? 'selected' : ''); ?>><?php print $i;
              $i++; ?></option>
          <?php endwhile; ?>
        </select>
      </div>

    </div>
    <div class="inn1">
      <span><?php print t('Trẻ em <br> dưới 2T') ?></span>
      <div class="controlHolder"><select name="booking[people_child]"
                                         class="tmSelect auto"
                                         data-class="tmSelect tmSelect2">
          <option></option>
          <?php $i = 1;
          $current = agp_getValue($booking_data, 'people_child', 1);
          $max = agp_getValue($booking_data, 'max_people.child', 30) ?>
          <?php while ($i <= $max): ?>
            <option <?php print 'value="' . $i . '"';
            print (($i == $current) ? 'selected' : ''); ?>><?php print $i;
              $i++; ?></option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="tooltip_templates" style="display: none">
    <div class="province active" id="tooltip_content"
         style="">
      <a href="javascript:;" class="pull-right province-close"><?php print t('Close X')?></a>
      <div class="panel header_province">
        <div class="panel-heading">
          <div class="chondiadiem">Chọn địa điểm</div>
        </div>
        <div class="panel-body">
          <div class="list clearfix menu-province">
            <ul class="col">
              <li style="color:#f00" class="country">Miền Nam</li>
              <li><a data-city-code="SGN" data-city-index="0" href="#">Tp. Hồ Chí Minh<span>(SGN)</span></a></li>
              <li><a data-city-code="VCA" data-city-index="0" href="#">Cần Thơ<span>(VCA)</span></a></li>
              <li><a data-city-code="CAH" data-city-index="0" href="#">Cà Mau<span>(CAH)</span></a></li>
              <li><a data-city-code="VCS" data-city-index="0" href="#">Côn Đảo<span>(VCS)</span></a></li>
              <li><a data-city-code="PQC" data-city-index="0" href="#">Phú Quốc<span>(PQC)</span></a></li>
              <li class="last"><a data-city-code="VKG" data-city-index="0" href="#">Rạch Giá <span>(VKG)</span></a></li>
              <li style="color:#f00" class="country">Miền Trung</li>
              <li><a data-city-code="DAD" data-city-index="0" href="#">Đà Nẵng<span>(DAD)</span></a></li>
              <li><a data-city-code="HUI" data-city-index="0" href="#">Huế<span>(HUI)</span></a>
              </li>
              <li><a data-city-code="DLI" data-city-index="0" href="#">Đà Lạt<span>(DLI)</span></a></li>
              <li><a data-city-code="VCL" data-city-index="0" href="#">Chu Lai<span>(VCL)</span></a></li>
              <li><a data-city-code="CXR" data-city-index="0" href="#">Nha Trang<span>(CXR)</span></a></li>
              <li><a data-city-code="BMV" data-city-index="0" href="#">Buôn MaThuột<span>(BMV)</span></a></li>
              <li><a data-city-code="VDH" data-city-index="0" href="#">Đồng Hới<span>(VDH)</span></a></li>
              <li><a data-city-code="PXU" data-city-index="0" href="#">Pleiku<span>(PXU)</span></a></li>
              <li><a data-city-code="UIH" data-city-index="0" href="#">Quy Nhơn<span>(UIH)</span></a></li>
              <li><a data-city-code="THD" data-city-index="0" href="#">Thanh Hóa<span>(THD)</span></a></li>
              <li><a data-city-code="TBB" data-city-index="0" href="#">Tuy Hòa<span>(TBB)</span></a></li>
              <li><a data-city-code="VII" data-city-index="0" href="#">Tp Vinh<span>(VII)</span></a></li>
            </ul>
            <ul class="col">
              <li style="color:#f00" class="country">Miền Bắc</li>
              <li><a data-city-code="HAN" data-city-index="0" href="#">Hà Nội<span>(HAN)</span></a></li>
              <li><a data-city-code="HPH" data-city-index="0" href="#">Hải Phòng<span>(HPH)</span></a></li>
              <li class="last"><a data-city-code="DIN" data-city-index="0" href="#">Điện Biên <span>(DIN)</span></a></li>
              <li class="country">Thái Lan</li>
              <li><a data-city-code="BKK|XBK" data-city-index="71" href="#">Bangkok<span>(BKK)</span></a></li>
              <li class="last"><a data-city-code="HKT" data-city-index="72" href="#">Phuket <span>(HKT)</span></a></li>
              <li class="country">Singapore</li>
              <li class="last"><a data-city-code="SIN" data-city-index="69" href="#">Singapore <span>(SIN)</span></a></li>
              <li class="country">Trung Quốc</li>
              <li><a data-city-code="HAK" data-city-index="39" href="#">Haikou<span>(HAK)</span></a></li>
              <li><a data-city-code="HGH" data-city-index="40" href="#">Hangzhou<span>(HGH)</span></a></li>
              <li class="last"><a data-city-code="SWA" data-city-index="41" href="#">Shantou / Jieyang<span>(SWA)</span></a></li>
              <li class="country">Indonesia</li>
              <li><a data-city-code="DPS" data-city-index="44" href="#">Bali(Denpasar)<span>(DPS)</span></a></li>
              <li><a data-city-code="CGK" data-city-index="45" href="#">Jakarta<span>(CGK)</span></a></li>
              <li><a data-city-code="KNO" data-city-index="46" href="#">Medan-Kualanamu <span>(KNO)</span></a></li>
              <li><a data-city-code="SUB" data-city-index="47" href="#">Surabaya<span>(SUB)</span></a></li>
            </ul>
            <ul class="col">
              <li class="country">Úc</li>
              <li><a data-city-code="ADL" data-city-index="15" href="#">Adelaide<span>(ADL)</span></a></li>
              <li><a data-city-code="AYQ|AYQ" data-city-index="16" href="#">AyersRock (Uluru) <span>(AYQ)</span></a></li>
              <li><a data-city-code="BNK|BBY" data-city-index="17" href="#">Ballina Byron <span>(BNK)</span></a></li>
              <li><a data-city-code="BNE" data-city-index="18" href="#">Brisbane<span>(BNE)</span></a></li>
              <li><a data-city-code="CNS" data-city-index="19" href="#">Cairns<span>(CNS)</span></a></li>
              <li><a data-city-code="CBR" data-city-index="20" href="#">Canberra<span>(CBR)</span></a></li>
              <li><a data-city-code="DRW" data-city-index="21" href="#">Darwin<span>(DRW)</span></a></li>
              <li><a data-city-code="OOL" data-city-index="22" href="#">GoldCoast<span>(OOL)</span></a></li>
              <li><a data-city-code="HTI|HTI" data-city-index="23" href="#">HamiltonIsland <span>(HTI)</span></a></li>
              <li><a data-city-code="HIS" data-city-index="24" href="#">Hayman Island <span>(HIS)</span></a></li>
              <li><a data-city-code="HBA" data-city-index="25" href="#">Hobart<span>(HBA)</span></a></li>
              <li><a data-city-code="LST" data-city-index="26" href="#">Launceston<span>(LST)</span></a></li>
              <li><a data-city-code="MKY" data-city-index="27" href="#">Mackay<span>(MKY)</span></a></li>
              <li><a data-city-code="NTL" data-city-index="31" href="#">Newcastle–Port Stephens <span>(NTL)</span></a></li>
              <li><a data-city-code="PER" data-city-index="32" href="#">Perth<span>(PER)</span></a></li>
              <li><a data-city-code="MCY" data-city-index="33" href="#">SunshineCoast <span>(MCY)</span></a></li>
              <li><a data-city-code="SYD" data-city-index="34" href="#">Sydney<span>(SYD)</span></a></li>
              <li><a data-city-code="TSV" data-city-index="35" href="#">Townsville<span>(TSV)</span></a></li>
            </ul>
            <ul class="col">
              <li class="country">Fiji</li>
              <li class="last"><a data-city-code="NAN" data-city-index="42" href="#">Nadi <span>(NAN)</span></a></li>
              <li class="country">Hồng Kông</li>
              <li class="last"><a data-city-code="HKG" data-city-index="43" href="#">Hong Kong <span>(HKG)</span></a></li>
              <li class="country">Campuchia</li>
              <li><a data-city-code="PNH" data-city-index="37" href="#">PhnomPenh<span>(PNH)</span></a></li>
              <li class="last"><a data-city-code="REP" data-city-index="38" href="#">Siem Reap <span>(REP)</span></a></li>
              <li class="country">Nhật Bản</li>
              <li><a data-city-code="FUK" data-city-index="48" href="#">Fukuoka<span>(FUK)</span></a></li>
              <li><a data-city-code="KOJ" data-city-index="49" href="#">Kagoshima<span>(KOJ)</span></a></li>
              <li><a data-city-code="KMJ" data-city-index="50" href="#">Kumamoto<span>(KMJ)</span></a></li>
              <li><a data-city-code="MYJ" data-city-index="51" href="#">Matsuyama<span>(MYJ)</span></a></li>
              <li><a data-city-code="NGO" data-city-index="52" href="#">Nagoya(Chubu) <span>(NGO)</span></a></li>
              <li><a data-city-code="OIT" data-city-index="53" href="#">Oita<span>(OIT)</span></a></li>
              <li><a data-city-code="OKA" data-city-index="54" href="#">Okinawa(Naha) <span>(OKA)</span></a></li>
              <li><a data-city-code="KIX|OSA" data-city-index="55" href="#">Osaka<span>(KIX)</span></a></li>
              <li><a data-city-code="CTS" data-city-index="56" href="#">Sapporo(New Chitose Airport) <span>(CTS)</span></a></li>
              <li><a data-city-code="TAK" data-city-index="57" href="#">Takamatsu<span>(TAK)</span></a></li>
              <li class="last"><a data-city-code="NRT|TYO" data-city-index="58" href="#">Tokyo <span>(NRT)</span></a></li>
            </ul>
            <ul class="col">
              <li class="country">Malaysia</li>
              <li><a data-city-code="KUL" data-city-index="60" href="#">KualaLumpur <span>(KUL)</span></a></li>
              <li class="last"><a data-city-code="PEN" data-city-index="61" href="#">Penang <span>(PEN)</span></a></li>
              <li class="country">Myanmar</li>
              <li class="last"><a data-city-code="RGN" data-city-index="62" href="#">Yangon <span>(RGN)</span></a></li>
              <li class="country">New Zealand</li>
              <li><a data-city-code="AKL" data-city-index="63" href="#">Auckland<span>(AKL)</span></a></li>
              <li><a data-city-code="CHC" data-city-index="64" href="#">Christchurch<span>(CHC)</span></a></li>
              <li><a data-city-code="DUD" data-city-index="65" href="#">Dunedin<span>(DUD)</span></a></li>
              <li><a data-city-code="ZQN" data-city-index="66" href="#">Queenstown<span>(ZQN)</span></a></li>
              <li class="last"><a data-city-code="WLG" data-city-index="67" href="#">Wellington <span>(WLG)</span></a>
              </li>
              <li class="country">Philippine</li>
              <li><a data-city-code="MNL" data-city-index="68" href="#">Manila<span>(MNL)</span></a></li>
              <li class="country">Ma Cao</li>
              <li class="last"><a data-city-code="MFM" data-city-index="59" href="#">Ma Cao <span>(MFM)</span></a></li>
              <li class="country">Đài Loan</li>
              <li class="last"><a data-city-code="TPE" data-city-index="70" href="#">Taipei <span>(TPE)</span></a></li>
            </ul>
            <ul class="col">
              <li class="country">HOA KỲ</li>
              <li><a data-city-code="ATL" data-city-index="68" href="#">Atlanta Hartsfield <span>(ATL)</span></a></li>
              <li><a data-city-code="AUS" data-city-index="68" href="#">Austin<span>(AUS)</span></a></li>
              <li><a data-city-code="BOS" data-city-index="68" href="#">Boston,Logan <span>(BOS)</span></a></li>
              <li><a data-city-code="CHI" data-city-index="68" href="#">Chicago IL<span>(CHI)</span></a></li>
              <li><a data-city-code="DFW" data-city-index="68" href="#">Dallas Fort Worth <span>(DFW)</span></a></li>
              <li><a data-city-code="DEN" data-city-index="68" href="#">Denver<span>(DEN)</span></a></li>
              <li><a data-city-code="HNL" data-city-index="68" href="#">Honolulu<span>(HNL)</span></a></li>
              <li><a data-city-code="LAX" data-city-index="68" href="#">Los Angeles <span>(LAX)</span></a></li>
              <li><a data-city-code="MIA" data-city-index="68" href="#">Miami<span>(MIA)</span></a></li>
              <li><a data-city-code="MSP" data-city-index="68" href="#">Minneapolis/St.Paul<span>(MSP)</span></a></li>
              <li><a data-city-code="JFK" data-city-index="68" href="#">New York<span>(JFK)</span></a></li>
              <li><a data-city-code="PHL" data-city-index="68" href="#">Philadelphia<span>(PHL)</span></a></li>
              <li><a data-city-code="PDX" data-city-index="68" href="#">Portland<span>(PDX)</span></a></li>
              <li><a data-city-code="SFO" data-city-index="68" href="#">San Francisco <span>(SFO)</span></a></li>
              <li><a data-city-code="SEA" data-city-index="68" href="#">Seattle,Tacoma <span>(SEA)</span></a></li>
              <li><a data-city-code="STL" data-city-index="68" href="#">St Louis,Lambert <span>(STL)</span></a></li>
              <li><a data-city-code="WAS" data-city-index="68" href="#">Washington<span>(WAS)</span> </a></li>
            </ul>
            <ul class="col clast">
              <li class="country">CHÂU ÂU</li>
              <li><a data-city-code="AMS" data-city-index="68" href="#">Amsterdam<span>(AMS)</span></a></li>
              <li><a data-city-code="BCN" data-city-index="68" href="#">Barcelona<span>(BCN)</span></a></li>
              <li><a data-city-code="FRA" data-city-index="68" href="#">Frankfurt<span>(FRA)</span></a></li>
              <li><a data-city-code="GVA" data-city-index="68" href="#">Geneva<span>(GVA)</span></a></li>
              <li><a data-city-code="LON" data-city-index="68" href="#">London<span>(LON)</span></a></li>
              <li><a data-city-code="LYS" data-city-index="68" href="#">Lyon<span>(LYS)</span></a></li>
              <li><a data-city-code="MAD" data-city-index="68" href="#">Madrid<span>(MAD)</span></a></li>
              <li><a data-city-code="MRS" data-city-index="68" href="#">Marseille<span>(MRS)</span></a></li>
              <li><a data-city-code="MPL" data-city-index="68" href="#">Montpellier<span>(MPL)</span></a></li>
              <li><a data-city-code="MOW" data-city-index="68" href="#">Moscow<span>(MOW)</span></a></li>
              <li><a data-city-code="NCE" data-city-index="68" href="#">Nice<span>(NCE)</span></a></li>
              <li><a data-city-code="PAR" data-city-index="68" href="#">Paris<span>(PAR)</span></a></li>
              <li><a data-city-code="PRG" data-city-index="68" href="#">Prague<span>(PRG)</span></a></li>
              <li><a data-city-code="ROM" data-city-index="68" href="#">Rome<span>(ROM)</span></a></li>
              <li><a data-city-code="TLS" data-city-index="68" href="#">Toulouse<span>(TLS)</span></a></li>
              <li><a data-city-code="VIE" data-city-index="68" href="#">Vienne<span>(VIE)</span></a></li>
              <li><a data-city-code="ZRH" data-city-index="68" href="#">Zurich<span>(ZRH)</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <input type="hidden" value="search_ticket" name="booking_action">
  <button class="subm" id="btn-search-ticket"><?php print t('Tìm vé rẻ') ?></button>
  <div class="clear"></div>
</form>
<script>
  jQuery(document).ready(function () {
    var dateFormat = 'd/m/Y';
    bookingHelper.initChooseDateTime(dateFormat);
    bookingHelper.initChooseProvice();
    bookingHelper.initICheck();
    bookingHelper.handlerEvent();

    var currentInputId = false;
    jQuery('#booking_from').click(function () {
      jQuery('#booking_from').tooltipster('open');
      currentInputId = '#' + jQuery(this).attr('id');
    });
    jQuery('#booking_to').click(function () {
      jQuery('#booking_to').tooltipster('open');
      currentInputId = '#' + jQuery(this).attr('id');
    });

    jQuery('.province ul.col li').on('click', function () {
      var text = jQuery(this).find("a").text();
      console.log(text);
      jQuery(currentInputId).val(text);
      jQuery('.tooltip').tooltipster('close');
    });
    jQuery('.province-close').on('click', function () {
      jQuery('.tooltip').tooltipster('close');
    });

//    jQuery(window)
//      .on('click',
//        function (e) {
//          jQuery('.tooltipster-base')
//            .each(
//              function () {
//                if (!jQuery(this).is(e.target)
//                  && jQuery(this).has(
//                    e.target).length === 0
//                  && jQuery('.tooltipster-base')
//                    .has(
//                      e.target).length === 0) {
//                  jQuery('.tooltip').tooltipster('close');
//                }
//              });
//        });

//    jQuery('input[type="radio"].icheck').iCheck({
//      checkboxClass: 'icheckbox_flat',
//      radioClass: 'iradio_flat-blue'
//    });
//    jQuery('input#booking_type_1_way').on('ifChecked', function () {
//      jQuery('#booking_to').attr('disabled', 'disabled');
//      jQuery('#booking_check_out').attr('disabled', 'disabled');
//    });
//    jQuery('input#booking_type_2_way').on('ifChecked', function () {
//      jQuery('#booking_to').removeAttr('disabled');
//      jQuery('#booking_check_out').removeAttr('disabled');
//    })
//    jQuery('input#booking_type_1_way').iCheck('check', function(){
//      jQuery('#booking_to').attr('disabled', 'disabled');
//      jQuery('#booking_check_out').attr('disabled', 'disabled');
//    });
  })
</script>
