<?php
/**
 * Created by PhpStorm.
 * User: nhan
 * Date: 10/17/16
 * Time: 11:46 PM
 */
?>

<form id="bookingForm" action="/ticket/checking">
    <div class="sect1">
        <div class="count"><span class="col1">01.</span> <?php print t('Loại vé') ?></div>
        <div class="controlHolder">
            <span>&nbsp;</span>
            <div class="tmRadio">
                <div class="lf">
                    <input name="booking[type]" type="radio"
                           data-constraints="@RadioGroupChecked(name=&quot;Hotel&quot;, groups=[RadioGroup])" checked=""
                           id="regula-generated-720138" style="display: none;"><strong class="checked"></strong>
                    <span><?php print t('Một chiều') ?></span>
                    <div class="clear"></div>

                </div>
                <div class="rf">
                    <input name="booking[type]" type="radio"
                           data-constraints="@RadioGroupChecked(name=&quot;Hotel&quot;, groups=[RadioGroup])"
                           id="regula-generated-209086" style="display: none;"><strong class="unchecked"></strong>
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
                <input name="booking[from]" placeholder="" type="text" data-constraints="@NotEmpty @Required"
                       id="regula-generated-921694">
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
                <input name="booking[to]" placeholder="" type="text" data-constraints="@NotEmpty @Required"
                       id="regula-generated-921694">
            </div>
        </div>

    </div>
    <div class="sect4">
        <div class="count"><span class="col1">04.</span> <?php print t('Thời gian');  ?></div>

        <div class="controlHolder"><label class="tmDatepicker">
                <span><?php print t('Ngày đi'); ?></span>
                <input type="text" name="booking[check-in]" placeholder="10/05/2014" data-constraints="@NotEmpty @Required @Date"
                       id="dp1476105599685" class="hasDatepicker">
            </label></div>

        <div class="controlHolder"><label class="tmDatepicker">
                <span><?php print t('Ngày về'); ?></span>
                <input type="text" name="booking[check-out]" placeholder="20/05/2014"
                       data-constraints="@NotEmpty @Required @Date" id="dp1476105599686" class="hasDatepicker">
            </label></div>
        <div class="clear"></div>
    </div>

    <div class="sect3">

        <div class="count">
            <span class="col1">05.</span> <?php print t('Số lượng');  ?>
        </div>
        <div class="inn1">
            <span><?php print t('Người lớn <br> trên 12T') ?></span>
            <div class="controlHolder">
                <select name="booking[people_adult]" class="tmSelect auto" data-class="tmSelect tmSelect2"
                                               data-constraints="" style="display: none;">
                    <option>&nbsp;</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <ul class="tmSelect tmSelect2 auto trans-element">
                    <li><span>&nbsp;</span>
                        <ul style="display: none;" class="transformSelectDropdown">
                            <li data-settings="" class=""><span>1</span></li>
                            <li data-settings="" class=""><span>2</span></li>
                            <li data-settings="" class=""><span>3</span></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="inn1">
            <span><?php print t('Trẻ em <br> 2T - 11T') ?></span>
            <div class="controlHolder"><select name="booking[people_child_mid]" class="tmSelect auto" data-class="tmSelect tmSelect2"
                                               data-constraints="" style="display: none;">
                    <option>&nbsp;</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <ul class="tmSelect tmSelect2 auto trans-element">
                    <li><span>&nbsp;</span>
                        <ul style="display: none;" class="transformSelectDropdown">
                            <li data-settings="" class=""><span>1</span></li>
                            <li data-settings="" class=""><span>2</span></li>
                            <li data-settings="" class=""><span>3</span></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <div class="inn1">
            <span><?php print t('Trẻ em <br> dưới 2T') ?></span>
            <div class="controlHolder"><select name="booking[people_child]" class="tmSelect auto" data-class="tmSelect tmSelect2"
                                               data-constraints="" style="display: none;">
                    <option>&nbsp;</option>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                </select>
                <ul class="tmSelect tmSelect2 auto trans-element">
                    <li><span>&nbsp;</span>
                        <ul style="display: none;" class="transformSelectDropdown">
                            <li data-settings="" class=""><span>0</span></li>
                            <li data-settings="" class=""><span>1</span></li>
                            <li data-settings="" class=""><span>2</span></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <a href="/ticket/checking" class="subm" data-type="submit"><?php print t('Tìm vé rẻ') ?></a>
    <div class="clear"></div>
</form>
