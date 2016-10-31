/**
 * Created by hautruong on 28/10/2016.
 */
var bookingHelper = (function ($) {
    var pub = {};
    pub.disableInputID = function (inputId) {
        jQuery('#' + inputId).attr('disabled', 'disabled');
    };
    pub.enableInputID = function (inputId) {
        jQuery('#' + inputId).removeAttr('disabled');
    };
    pub.disableInputClass = function (inputClass) {
        jQuery('.' + inputClass).attr('disabled', 'disabled');
    };
    pub.initICheck = function () {
        jQuery('input[type="radio"].icheck').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat-blue'
        });
        if (jQuery('input#booking_type_1_way').is(':checked')) {
           // pub.disableInputID('booking_to');
            pub.disableInputID('booking_check_out');
        }
    };
    pub.initChooseProvice = function (toolTipClass) {
        if (toolTipClass === undefined) {
            toolTipClass = "tooltip";
        }
        jQuery('.' + toolTipClass).tooltipster({
            trigger: 'custom',
            triggerOpen: 'click',
            triggerClose: 'click',
            contentAsHTML: true,
        });
    };
    pub.initChooseDateTime = function (dateFormat) {
        if (dateFormat === undefined) {
            dateFormat = 'd/m/Y';
        }
        jQuery.datetimepicker.setLocale('vi');
        jQuery('#booking_check_in').datetimepicker({
            format: dateFormat,
            minDate: 0,
            startDate: new Date(),
            onShow: function (ct) {
                this.setOptions({
                    maxDate: jQuery('#booking_check_out').val() ? jQuery('#booking_check_out').val() : false
                })
            },
            formatDate: dateFormat,
            timepicker: false,
        });
        jQuery('#booking_check_out').datetimepicker({
            format: dateFormat,
            onShow: function (ct) {
                this.setOptions({
                    minDate: jQuery('#booking_check_in').val() ? jQuery('#booking_check_in').val() : 0
                })
            },
            formatDate: dateFormat,
            timepicker: false
        });
    };
    pub.closeToolTip = function (inputId) {
        jQuery('#' + inputId).tooltipster('open');
    };
    pub.handlerEvent = function () {
        jQuery('input#booking_type_1_way').on('ifChecked', function () {
            pub.disableInputID('booking_to');
            pub.disableInputID('booking_check_out');
        });
        jQuery('input#booking_type_2_way').on('ifChecked', function () {
            pub.enableInputID('booking_to');
            pub.enableInputID('booking_check_out');
        });
    };
    return pub;
})(jQuery);
;(function ($) {

})(jQuery);
