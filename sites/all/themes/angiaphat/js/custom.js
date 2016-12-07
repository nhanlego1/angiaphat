(function ($) {

    /**
     * Provide the summary information for the block settings vertical tabs.
     */
    Drupal.behaviors.CustomAngiaphat = {
        attach: function (context) {


            $("ul.sf-menu li a").each(function () {
                // if($(this).next().length > 0){
                //   $(this).parent().addClass('sf-with-ul');
                // }
                $(this).hover(function () {
                    $(this).next().toggle();
                });
                $(this).next().hover(function () {
                    $(this).toggle();
                });
            });

            //add select 2
            $(".frombookingFliter").select2({
                width: 'resolve' // need to override the changed default
            });
            $(".tobookingFliter").select2({
                width: 'resolve' // need to override the changed default
            });

            //   _initFormTicket();
            //form submit ajax
            if ($(".frombookingFliter").val() != '' && $(".tobookingFliter").val() != '') {
                var data_ = getFormData($("#bookingForm"));
                var data2_ = getFormData($($("#bookingForm")));
                var cleartickettimeout;
                $(".fromway-ticket").html('');
                $(".returnway-ticket").html('');

                $("#btn-search-ticket").hide();

                //check 1 way or 2 way
                if (data_.RoundTrip == 'true') {
                    //clear data first
                    clearTimeout(cleartickettimeout);
                    //if($("#booking_type_1_way").checked()){
                    $(".loading-message-depart").show();
                    data_.ReturnDate = null;
                    cleartickettimeout = setTimeout(function () {
                        $.post("/ajax/ticket/checking", {data: data_, method : 'oneway'})
                            .done(function (data) {
                                $(".submit-ticket-result").show();
                                $(".loading-message-depart").hide();
                                $(".fromway-ticket").append(data);
                                _initFormTicket();
                                $("#btn-search-ticket").show();

                            })
                            .fail(function () {
                                //alert( "error" );
                            });
                    }, 200);

                    //return
                    var cleartickettimeoutTo;
                    clearTimeout(cleartickettimeoutTo);
                    cleartickettimeoutTo = setTimeout(function () {
                        var newToPlace = data2_.FromPlace;
                        var newTolaceNam = data2_.FromPlaceName;
                        var newFromdate = data2_.ReturnDate;
                        data2_.FromPlace = data2_.ToPlace;
                        data2_.FromPlaceName = data2_.ToPlaceName;
                        data2_.ToPlace = newToPlace;
                        data2_.ToPlaceName = newTolaceNam;
                        data2_.DepartDate = newFromdate;
                        $(".loading-message-return").show();
                        $.post("/ajax/ticket/checking/return", {data: data2_, method : 'twoway'})
                            .done(function (datato) {
                                $(".submit-ticket-result").show();
                                $(".loading-message-return").hide();
                                $(".returnway-ticket").append(datato);
                                _initFormTicket2();
                                $("#btn-search-ticket").show();

                            })
                            .fail(function () {
                                //alert( "error" );
                            });
                    }, 1000);


                } else {
                    clearTimeout(cleartickettimeout);
                    //if($("#booking_type_1_way").checked()){
                    $(".loading-message-depart").show();
                    cleartickettimeout = setTimeout(function () {
                        $.post("/ajax/ticket/checking", {data: data_, method : 'oneway'})
                            .done(function (data) {
                                $(".submit-ticket-result").show();
                                $(".loading-message-depart").hide();
                                $(".fromway-ticket").append(data);
                                _initFormTicket();
                                $("#btn-search-ticket").show();

                            })
                            .fail(function () {
                                //alert( "error" );
                            });
                    }, 200);
                }
                //return false;

            }
            //click subnit
            $(".page-ticket-checking #bookingForm").submit(function () {
                var data_ = getFormData($(this));
                var data2_ = getFormData($(this));
                var cleartickettimeout;
                $(".fromway-ticket").html('');
                $(".returnway-ticket").html('');

                $("#btn-search-ticket").hide();

                //check 1 way or 2 way
                if (data_.RoundTrip == 'true') {
                    //clear data first
                    clearTimeout(cleartickettimeout);
                    //if($("#booking_type_1_way").checked()){
                    $(".loading-message-depart").show();
                    data_.ReturnDate = null;
                    cleartickettimeout = setTimeout(function () {
                        $.post("/ajax/ticket/checking", {data: data_, method : 'oneway'})
                            .done(function (data) {
                                $(".submit-ticket-result").show();
                                $(".loading-message-depart").hide();
                                $(".fromway-ticket").append(data);
                                _initFormTicket();
                                $("#btn-search-ticket").show();

                            })
                            .fail(function () {
                                //alert( "error" );
                            });
                    }, 200);

                    //return
                    var cleartickettimeoutTo;
                    clearTimeout(cleartickettimeoutTo);
                    cleartickettimeoutTo = setTimeout(function () {
                        var newToPlace = data2_.FromPlace;
                        var newTolaceNam = data2_.FromPlaceName;
                        var newFromdate = data2_.ReturnDate;
                        data2_.FromPlace = data2_.ToPlace;
                        data2_.FromPlaceName = data2_.ToPlaceName;
                        data2_.ToPlace = newToPlace;
                        data2_.ToPlaceName = newTolaceNam;
                        data2_.DepartDate = newFromdate;
                        $(".loading-message-return").show();
                        $.post("/ajax/ticket/checking/return", {data: data2_, method : 'twoway'})
                            .done(function (datato) {
                                $(".submit-ticket-result").show();
                                $(".loading-message-return").hide();
                                $(".returnway-ticket").append(datato);
                                _initFormTicket2();
                                $("#btn-search-ticket").show();

                            })
                            .fail(function () {
                                //alert( "error" );
                            });
                    }, 1000);


                } else {
                    clearTimeout(cleartickettimeout);
                    //if($("#booking_type_1_way").checked()){
                    $(".loading-message-depart").show();
                    cleartickettimeout = setTimeout(function () {
                        $.post("/ajax/ticket/checking", {data: data_, method : 'oneway'})
                            .done(function (data) {
                                $(".submit-ticket-result").show();
                                $(".loading-message-depart").hide();
                                $(".fromway-ticket").append(data);
                                _initFormTicket();
                                $("#btn-search-ticket").show();

                            })
                            .fail(function () {
                                //alert( "error" );
                            });
                    }, 200);
                }

                return false;

            });

            function getFormData(dom_query) {
                var out = {};
                var s_data = $(dom_query).serializeArray();
                //transform into simple data/value object
                for (var i = 0; i < s_data.length; i++) {
                    var record = s_data[i];
                    out[record.name] = record.value;
                }
                return out;
            }


        }
    };

    function _initFormTicket() {
        $(".depart-info .detail a").each(function () {
            $(this).live('click',function (event) {
                event.preventDefault();
                $(this).parent().next().toggle();
            });
        });

        $(".booking-ticket-oneway .ticket-selection").each(function(){
            $(this).change(function(){
                $(".submit-ticket-result .oneway-ticket").val($(this).val());
            });
        });

    }

    function _initFormTicket2() {
        $(".return-info .detail a").each(function () {
            $(this).live('click',function (event) {
                event.preventDefault();
                $(this).parent().next().toggle();
            });
        });

        $(".booking-ticket-twoway .ticket-selection").each(function(){
            $(this).change(function(){
                $(".submit-ticket-result .twoway-ticket").val($(this).val());
            });
        });

    }

})(jQuery);
