<?php
/**
 * Created by PhpStorm.
 * User: nhan
 * Date: 10/17/16
 * Time: 11:46 PM
 */


?>

<form id="bookingForm" action="/ticket/checking" method="post">
    <div class="sect3">
        <div class="inn1">

            <div class="controlHolder">
                <select name="ticketType" class="tmSelect auto ticket-type"
                        data-class="tmSelect tmSelect2">

                   <option <?php isset($_POST['ticketType']) && $_POST['ticketType']==0 ? print 'selected': '' ?> value="0"><?php print t('Quốc nội') ?></option>
                    <option <?php isset($_POST['ticketType']) && $_POST['ticketType']==1 ? print 'selected': '' ?> value="1"><?php print t('Quốc tế') ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="sect1">
        <div class="controlHolder">

            <div class="tmRadio">
                <div class="lf">
                    <input name="RoundTrip" type="radio"  value="false"
                           id="booking_type_1_way"
                           class="icheck" <?php print (isset($_POST['RoundTrip']) && $_POST['RoundTrip'] == 'false') ? 'checked="checked"' : '' ?>>
                    <span><?php print t('Một chiều') ?></span>
                    <div class="clear"></div>
                </div>
                <div class="rf">
                    <input name="RoundTrip" type="radio"  value="true"
                           id="booking_type_2_way"
                           class="icheck" <?php print (isset($_POST['RoundTrip']) && $_POST['RoundTrip'] == 'true') ? 'checked="checked"' : '' ?>>
                    <span><?php print t('Khứ hồi') ?></span>
                    <div class="clear"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="sect2">
        <div class="controlHolder">

            <div class="tmInput">
                <select name="FromPlace" class="frombookingFliter" required>
                    <option value="">Điểm đi</option>
                    <?php isset($_POST['FromPlace'])? print '<option selected value="'.$_POST['FromPlace'].'">'._get_code($_POST['FromPlace']).'</option>': '' ?>
                    <optgroup label="Miền Nam">
                        <option value="SGN">Tp. Hồ Chí Minh(SGN)</option>
                        <option value="VCA">Cần Thơ(VCA)</option>
                        <option value="CAH">Cà Mau(CAH)</option>
                        <option value="VCS">Côn Đảo(VCS)</option>
                        <option value="PQC">Phú Quốc(PQC)</option>
                        <option value="VKG">Rạch Giá(VKG)</option>
                    </optgroup>
                    <optgroup label="Miền Bắc">
                        <option value="HAN">Hà Nội(HAN)</option>
                        <option value="HPH">Hải Phòng(HPH)</option>
                        <option value="DIN">Điện Biên(DIN)</option>
                    </optgroup>
                    <optgroup label="Miền Trung">
                        <option value="DAD">Đà Nẵng(DAD)</option>
                        <option value="HUI">Huế(HUI)</option>
                        <option value="DLI">Đà Lạt(DLI)</option>
                        <option value="VCL">Chu Lai(VCL)</option>
                        <option value="CXR">Nha Trang(CXR)</option>
                        <option value="BMV">Buôn MaThuột(BMV)</option>
                        <option value="VDH">Đồng Hới(VDH)</option>
                        <option value="PXU">Pleiku(PXU)</option>
                        <option value="UIH">Quy Nhơn(UIH)</option>
                        <option value="THD">Thanh Hóa(THD)</option>
                        <option value="TBB">Tuy Hòa(TBB)</option>
                        <option value="VII">Tp Vinh(VII)</option>

                    </optgroup>
                    <optgroup label="Thái Lan">
                        <option value="BKK">Bangkok(BKK)</option>
                        <option value="HKT">Phuket(HKT)</option>
                    </optgroup>
                    <optgroup label="Singapore">
                        <option value="SIN">Singapore(SIN)</option>
                    </optgroup>
                    <optgroup label="Indonesia">
                        <option value="DPS">Bali(Denpasar)(DPS)</option>
                        <option value="CGK">Jakarta(CGK)</option>
                        <option value="KNO">Medan-Kualanamu (KNO)</option>
                        <option value="SUB">Surabaya(SUB)</option>
                    </optgroup>
                    <optgroup label="Fiji">
                        <option value="NAN">Nadi(NAN)</option>
                    </optgroup>
                    <optgroup label="Hồng Kông">
                        <option value="HKG">Hong Kong(HKG)</option>
                    </optgroup>
                    <optgroup label="Campuchia">
                        <option value="PNH">PhnomPenh(PNH)</option>
                        <option value="REP">Siem Reap(REP)</option>
                    </optgroup>
                    <optgroup label="Malaysia">
                        <option value="KUL">KualaLumpur(KUL)</option>
                        <option value="PEN">Penang(PEN)</option>
                    </optgroup>
                    <optgroup label="Myanmar">
                        <option value="RGN">Yangon(RGN)</option>
                    </optgroup>
                    <optgroup label="Philippine">
                        <option value="MNL">Manila(MNL)</option>
                    </optgroup>
                    <optgroup label="Ma Cao">
                        <option value="MFM">Ma Cao(MFM)</option>
                    </optgroup>
                    <optgroup label="Đài Loan">
                        <option value="TPE">Taipei(TPE)</option>
                    </optgroup>
                    <optgroup label="Úc">
                        <option value="ADL">Adelaide(ADL)</option>
                        <option value="AYQ">yersRock (Uluru)(AYQ)</option>
                        <option value="BNK">Ballina Byron(BNK)</option>
                        <option value="BNE">Brisbane(BNE)</option>
                        <option value="CNS">Cairns(CNS)</option>
                        <option value="CBR">Canberra(CBR)</option>
                        <option value="DRW">Darwin(DRW)</option>
                        <option value="OOL">GoldCoast(OOL)</option>
                        <option value="HTI">HamiltonIsland(HTI)</option>
                        <option value="HIS">Hayman Island(HIS)</option>
                        <option value="HBA">Hobart(HBA)</option>
                        <option value="LST">Launceston(LST)</option>
                        <option value="MKY">Mackay(MKY)</option>
                        <option value="NTL">Newcastle–Port Stephens (NTL)</option>
                        <option value="PER">Perth(PER)</option>
                        <option value="MCY">SunshineCoast(MCY)</option>
                        <option value="SYD">Sydney(SYD)</option>
                        <option value="TSV">Townsville(TSV)</option>
                    </optgroup>
                    <optgroup label="Nhật Bản">
                        <option value="FUK">Fukuoka(FUK)</option>
                        <option value="KOJ">Kagoshima(KOJ)</option>
                        <option value="KMJ">Kumamoto(KMJ)</option>
                        <option value="MYJ">Matsuyama(MYJ)</option>
                        <option value="NGO">Nagoya(Chubu)(NGO)</option>
                        <option value="OIT">Oita(OIT)</option>
                        <option value="OKA">Okinawa(Naha)(OKA)</option>
                        <option value="KIX">Osaka(KIX)</option>
                        <option value="CTS">Sapporo(New Chitose Airport)(CTS)</option>
                        <option value="TAK">Takamatsu(TAK)</option>
                        <option value="NRT">Tokyo(NRT)</option>
                    </optgroup>
                    <optgroup label="New Zealand">
                        <option value="AKL">Auckland(AKL)</option>
                        <option value="CHC">Christchurch(CHC)</option>
                        <option value="DUD">Dunedin(DUD)</option>
                        <option value="ZQN">Queenstown(ZQN)</option>
                        <option value="WLG">Wellington(WLG)</option>
                    </optgroup>
                    <optgroup label="HOA KỲ">
                        <option value="ATL">Atlanta Hartsfield(ATL)</option>
                        <option value="AUS">Austin(AUS)</option>
                        <option value="BOS">Boston,Logan(BOS)</option>
                        <option value="CHI">Chicago IL(CHI)</option>
                        <option value="DFW">Dallas Fort Worth(DFW)</option>
                        <option value="DEN">Denver(DEN)</option>
                        <option value="HNL">Honolulu(HNL)</option>
                        <option value="LAX">Los Angeles(LAX)</option>
                        <option value="MIA">Miami(MIA)</option>
                        <option value="MSP">Minneapolis/St.Paul(MSP)</option>
                        <option value="JFK">New York(JFK)</option>
                        <option value="PHL">Philadelphia(PHL)</option>
                        <option value="PDX">Portland(PDX)</option>
                        <option value="SFO">San Francisco(SFO)</option>
                        <option value="SEA">Seattle,Tacoma(SEA)</option>
                        <option value="STL">St Louis,Lambert(STL)</option>
                        <option value="WAS">Washington(WAS)</option>
                    </optgroup>
                    <optgroup label="CHÂU ÂU">
                        <option value="AMS">Amsterdam(AMS)</option>
                        <option value="BCN">Barcelona(BCN)</option>
                        <option value="FRA">Frankfurt(FRA)</option>
                        <option value="GVA">Geneva(GVA)</option>
                        <option value="LON">London(LON)</option>
                        <option value="LYS">Lyon(LYS)</option>
                        <option value="MAD">Madrid(MAD)</option>
                        <option value="MRS">Marseille(MRS)</option>
                        <option value="MPL">Montpellier(MPL)</option>
                        <option value="MOW">Moscow(MOW)</option>
                        <option value="NCE">Nice(NCE)</option>
                        <option value="PAR">Paris(PAR)</option>
                        <option value="PRG">Prague(PRG)</option>
                        <option value="ROM">Rome(ROM)</option>
                        <option value="TLS">Toulouse(TLS)</option>
                        <option value="VIE">Vienne(VIE)</option>
                        <option value="ZRH">Zurich(ZRH)</option>
                    </optgroup>
                </select>

                <input name="FromPlaceName" placeholder="Chiều đi" type="hidden" class="tooltip"
                       data-tooltip-content="#tooltip_content"
                       id="bookingFilterFrom"
                       value="<?php isset($_POST['FromPlace']) ? print $_POST['FromPlace']: '' ?>">

            </div>
        </div>
        <div class="controlHolder">

            <div class="tmInput toplace">
                <select name="ToPlace" class="tobookingFliter" required>
                    <option value="">Điểm đến</option>
                    <?php isset($_POST['ToPlace']) ? print '<option selected value="'.$_POST['ToPlace'].'">'._get_code($_POST['ToPlace']).'</option>': '' ?>
                    <optgroup label="Miền Nam">
                        <option value="SGN">Tp. Hồ Chí Minh(SGN)</option>
                        <option value="VCA">Cần Thơ(VCA)</option>
                        <option value="CAH">Cà Mau(CAH)</option>
                        <option value="VCS">Côn Đảo(VCS)</option>
                        <option value="PQC">Phú Quốc(PQC)</option>
                        <option value="VKG">Rạch Giá(VKG)</option>
                    </optgroup>
                    <optgroup label="Miền Bắc">
                        <option value="HAN">Hà Nội(HAN)</option>
                        <option value="HPH">Hải Phòng(HPH)</option>
                        <option value="DIN">Điện Biên(DIN)</option>
                    </optgroup>
                    <optgroup label="Miền Trung">
                        <option value="DAD">Đà Nẵng(DAD)</option>
                        <option value="HUI">Huế(HUI)</option>
                        <option value="DLI">Đà Lạt(DLI)</option>
                        <option value="VCL">Chu Lai(VCL)</option>
                        <option value="CXR">Nha Trang(CXR)</option>
                        <option value="BMV">Buôn MaThuột(BMV)</option>
                        <option value="VDH">Đồng Hới(VDH)</option>
                        <option value="PXU">Pleiku(PXU)</option>
                        <option value="UIH">Quy Nhơn(UIH)</option>
                        <option value="THD">Thanh Hóa(THD)</option>
                        <option value="TBB">Tuy Hòa(TBB)</option>
                        <option value="VII">Tp Vinh(VII)</option>

                    </optgroup>
                    <optgroup label="Thái Lan">
                        <option value="BKK">Bangkok(BKK)</option>
                        <option value="HKT">Phuket(HKT)</option>
                    </optgroup>
                    <optgroup label="Singapore">
                        <option value="SIN">Singapore(SIN)</option>
                    </optgroup>
                    <optgroup label="Indonesia">
                        <option value="DPS">Bali(Denpasar)(DPS)</option>
                        <option value="CGK">Jakarta(CGK)</option>
                        <option value="KNO">Medan-Kualanamu (KNO)</option>
                        <option value="SUB">Surabaya(SUB)</option>
                    </optgroup>
                    <optgroup label="Fiji">
                        <option value="NAN">Nadi(NAN)</option>
                    </optgroup>
                    <optgroup label="Hồng Kông">
                        <option value="HKG">Hong Kong(HKG)</option>
                    </optgroup>
                    <optgroup label="Campuchia">
                        <option value="PNH">PhnomPenh(PNH)</option>
                        <option value="REP">Siem Reap(REP)</option>
                    </optgroup>
                    <optgroup label="Malaysia">
                        <option value="KUL">KualaLumpur(KUL)</option>
                        <option value="PEN">Penang(PEN)</option>
                    </optgroup>
                    <optgroup label="Myanmar">
                        <option value="RGN">Yangon(RGN)</option>
                    </optgroup>
                    <optgroup label="Philippine">
                        <option value="MNL">Manila(MNL)</option>
                    </optgroup>
                    <optgroup label="Ma Cao">
                        <option value="MFM">Ma Cao(MFM)</option>
                    </optgroup>
                    <optgroup label="Đài Loan">
                        <option value="TPE">Taipei(TPE)</option>
                    </optgroup>
                    <optgroup label="Úc">
                        <option value="ADL">Adelaide(ADL)</option>
                        <option value="AYQ">yersRock (Uluru)(AYQ)</option>
                        <option value="BNK">Ballina Byron(BNK)</option>
                        <option value="BNE">Brisbane(BNE)</option>
                        <option value="CNS">Cairns(CNS)</option>
                        <option value="CBR">Canberra(CBR)</option>
                        <option value="DRW">Darwin(DRW)</option>
                        <option value="OOL">GoldCoast(OOL)</option>
                        <option value="HTI">HamiltonIsland(HTI)</option>
                        <option value="HIS">Hayman Island(HIS)</option>
                        <option value="HBA">Hobart(HBA)</option>
                        <option value="LST">Launceston(LST)</option>
                        <option value="MKY">Mackay(MKY)</option>
                        <option value="NTL">Newcastle–Port Stephens (NTL)</option>
                        <option value="PER">Perth(PER)</option>
                        <option value="MCY">SunshineCoast(MCY)</option>
                        <option value="SYD">Sydney(SYD)</option>
                        <option value="TSV">Townsville(TSV)</option>
                    </optgroup>
                    <optgroup label="Nhật Bản">
                        <option value="FUK">Fukuoka(FUK)</option>
                        <option value="KOJ">Kagoshima(KOJ)</option>
                        <option value="KMJ">Kumamoto(KMJ)</option>
                        <option value="MYJ">Matsuyama(MYJ)</option>
                        <option value="NGO">Nagoya(Chubu)(NGO)</option>
                        <option value="OIT">Oita(OIT)</option>
                        <option value="OKA">Okinawa(Naha)(OKA)</option>
                        <option value="KIX">Osaka(KIX)</option>
                        <option value="CTS">Sapporo(New Chitose Airport)(CTS)</option>
                        <option value="TAK">Takamatsu(TAK)</option>
                        <option value="NRT">Tokyo(NRT)</option>
                    </optgroup>
                    <optgroup label="New Zealand">
                        <option value="AKL">Auckland(AKL)</option>
                        <option value="CHC">Christchurch(CHC)</option>
                        <option value="DUD">Dunedin(DUD)</option>
                        <option value="ZQN">Queenstown(ZQN)</option>
                        <option value="WLG">Wellington(WLG)</option>
                    </optgroup>
                    <optgroup label="HOA KỲ">
                        <option value="ATL">Atlanta Hartsfield(ATL)</option>
                        <option value="AUS">Austin(AUS)</option>
                        <option value="BOS">Boston,Logan(BOS)</option>
                        <option value="CHI">Chicago IL(CHI)</option>
                        <option value="DFW">Dallas Fort Worth(DFW)</option>
                        <option value="DEN">Denver(DEN)</option>
                        <option value="HNL">Honolulu(HNL)</option>
                        <option value="LAX">Los Angeles(LAX)</option>
                        <option value="MIA">Miami(MIA)</option>
                        <option value="MSP">Minneapolis/St.Paul(MSP)</option>
                        <option value="JFK">New York(JFK)</option>
                        <option value="PHL">Philadelphia(PHL)</option>
                        <option value="PDX">Portland(PDX)</option>
                        <option value="SFO">San Francisco(SFO)</option>
                        <option value="SEA">Seattle,Tacoma(SEA)</option>
                        <option value="STL">St Louis,Lambert(STL)</option>
                        <option value="WAS">Washington(WAS)</option>
                    </optgroup>
                    <optgroup label="CHÂU ÂU">
                        <option value="AMS">Amsterdam(AMS)</option>
                        <option value="BCN">Barcelona(BCN)</option>
                        <option value="FRA">Frankfurt(FRA)</option>
                        <option value="GVA">Geneva(GVA)</option>
                        <option value="LON">London(LON)</option>
                        <option value="LYS">Lyon(LYS)</option>
                        <option value="MAD">Madrid(MAD)</option>
                        <option value="MRS">Marseille(MRS)</option>
                        <option value="MPL">Montpellier(MPL)</option>
                        <option value="MOW">Moscow(MOW)</option>
                        <option value="NCE">Nice(NCE)</option>
                        <option value="PAR">Paris(PAR)</option>
                        <option value="PRG">Prague(PRG)</option>
                        <option value="ROM">Rome(ROM)</option>
                        <option value="TLS">Toulouse(TLS)</option>
                        <option value="VIE">Vienne(VIE)</option>
                        <option value="ZRH">Zurich(ZRH)</option>
                    </optgroup>
                </select>
                <input name="ToPlaceName" placeholder="Chiều đến" type="hidden" class="tooltip"
                       data-tooltip-content="#tooltip_content" id="bookingFilterTo"
                       value="<?php isset($_POST['ToPlace']) ? print $_POST['ToPlace']: '' ?>" >

            </div>
        </div>
    </div>

    <div class="sect4">
        <div class="controlHolder"><label class="tmDatepicker">
                <input type="text" name="DepartDate" placeholder="Ngày đi"
                       id="booking_check_in" class="hasDatepicker"
                       value="<?php isset($_POST['DepartDate']) ? print $_POST['DepartDate']: '' ?>" required>
            </label></div>

        <div class="controlHolder"><label class="tmDatepicker">
                <input type="text" name="ReturnDate" placeholder="Ngày về"
                       id="booking_check_out" class="hasDatepicker"
                       value="<?php isset($_POST['ReturnDate']) ? print $_POST['ReturnDate']: '' ?>" required>
            </label></div>
        <div class="clear"></div>
    </div>

    <div class="sect3">
        <div class="inn1">

            <div class="controlHolder">
                <select name="Adult" class="tmSelect auto"
                        data-class="tmSelect tmSelect2">

                    <?php $i = 1;
                    $current = isset($_POST['Adult']) ? $_POST['Adult']: 1;
                    $max = agp_getValue($booking_data, 'max_people.adult', 30) ?>
                    <?php while ($i <= $max): ?>

                        <option <?php print 'value="' . $i . '"';
                        print (($i == $current) ? 'selected' : ''); ?>><?php print $i;
                            $i++; ?> Người lớn
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="inn1">
            <!--      <span>--><?php //print t('Trẻ em 2T - 11T') ?><!--</span>-->
            <div class="controlHolder"><select name="Child"
                                               class="tmSelect auto"
                                               data-class="tmSelect tmSelect2">
                    <option>Trẻ em</option>
                    <?php $i = 1;
                    $current = isset($_POST['Child']) ? $_POST['Child']: 1;
                    $max = agp_getValue($booking_data, 'max_people.child_medium', 30) ?>
                    <?php while ($i <= $max): ?>
                        <option <?php print 'value="' . $i . '"';
                        print (($i == $current) ? 'selected' : ''); ?>><?php print $i;
                            $i++; ?> Trẻ em
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

        </div>
        <div class="inn1">
            <div class="controlHolder"><select name="Infant"
                                               class="tmSelect auto"
                                               data-class="tmSelect tmSelect2">
                    <option>Em bé</option>
                    <?php $i = 1;
                    $current = isset($_POST['Infant']) ? $_POST['Infant']: 1;
                    $max = agp_getValue($booking_data, 'max_people.child', 30) ?>
                    <?php while ($i <= $max): ?>
                        <option <?php print 'value="' . $i . '"';
                        print (($i == $current) ? 'selected' : ''); ?>><?php print $i;
                            $i++; ?> Em bé
                        </option>
                    <?php endwhile; ?>
                </select>
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
        jQuery(".frombookingFliter").on('change',function(){
           var val = jQuery(this).val();
            jQuery("#bookingFilterFrom").val(val);
        });
        jQuery(".tobookingFliter").on('change',function(){
            var val = jQuery(this).val();
            jQuery("#bookingFilterTo").val(val);
        });

    })
</script>