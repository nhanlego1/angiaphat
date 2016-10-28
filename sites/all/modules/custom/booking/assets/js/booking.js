/**
 * Created by hautruong on 28/10/2016.
 */
var bookingHelper = (function ($) {
    var pub = {};
    pub.disableInput = function (inputId) {
        jQuery('#' + inputId).attr('disabled', 'disabled');
    };
    pub.enableInput = function (inputId) {
        jQuery('#' + inputId).removeAttr('disabled');
    };
    pub.initICheck = function () {
        jQuery('input[type="radio"].icheck').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat-blue'
        });
        
        jQuery('input#booking_type_1_way').iCheck('check', function () {
            pub.disableInput('booking_to');
            pub.disableInput('booking_check_out');
        });
    };
    pub.initChooseProvice = function () {
        jQuery('.tooltip').tooltipster({
            trigger: 'custom',
            triggerOpen: 'click',
            triggerClose: 'click',
            contentAsHTML: true,
        });
    };
    pub.initChooseDateTime = function () {
        var dateFormat = 'd/m/Y';
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
            pub.disableInput('booking_to');
            pub.disableInput('booking_check_out');
        });
        jQuery('input#booking_type_2_way').on('ifChecked', function () {
            pub.enableInput('booking_to');
            pub.enableInput('booking_check_out');
        });
    };
    return pub;
})(jQuery);
var bookingForm = {
    disableInput: function (inputId) {
        jQuery('#' + inputId).attr('disabled', 'disabled');
    },
    enableInput: function (inputId) {
        jQuery('#' + inputId).removeAttr('disabled');
    },
    initICheck: function () {
        jQuery('input[type="radio"].icheck').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat-blue'
        });
        jQuery('input#booking_type_1_way').on('ifChecked', function () {
            self.disableInput('booking_to');
            self.disableInput('booking_check_out');
        });
        jQuery('input#booking_type_2_way').on('ifChecked', function () {
            self.enableInput('booking_to');
            self.enableInput('booking_check_out');
        })
        jQuery('input#booking_type_1_way').iCheck('check', function () {
            self.disableInput('booking_to');
            self.disableInput('booking_check_out');
        });
    },
    initChooseProvice: function () {
        jQuery('.tooltip').tooltipster({
            trigger: 'custom',
            triggerOpen: 'click',
            triggerClose: 'click',
            contentAsHTML: true,
        });
    },
    initChooseDateTime: function () {
        var dateFormat = 'd/m/Y';
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
//          minDate: jQuery('#booking_check_in').val() ? "'"+jQuery('#booking_check_in').val()+"',formatDate:'d/m/Y'" : 0
                    minDate: jQuery('#booking_check_in').val() ? jQuery('#booking_check_in').val() : 0
                })
            },
            formatDate: dateFormat,
            timepicker: false
        });
    },
    closeToolTip: function (inputId) {
        jQuery('#' + inputId).tooltipster('open');
    },
};
;(function ($) {

})(jQuery);
