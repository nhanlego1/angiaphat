<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">

    <script src="../Html/js/jquery.js"></script>

    <script>
        $(document).ready(function () {
            $(".test a").click(function(){
                var auth = btoa('angiaphat247.vn:ZVBNhfg4')
                $.ajax
                ({
                    type: "POST",
                    url: "http://api.atvietnam.vn/oapi/airline/Flights/Find",
                    dataType: "json",
                    contentType: 'application/x-www-form-urlencoded',
                    headers: {
                        "Authorization": "Basic " + auth
                    },
                    async: false,
                    data: '{"RoundTrip": true,"FromPlace": "SGN","ToPlace": "HAN","DepartDate": "2016-12-10T00:00:00.000","ReturnDate": "2016-12-15T00:00:00.000","CurrencyType": "VND","FlightType": "DirectAndContinue","Adult": 1,"Child": 0,"Infant": 0,"Sources": "VietnamAirlines"}',
                    success: function (data){
                        console.log(data);
                    }
                });

//                $.post("http://api.atvietnam.vn/oapi/airline/Flights/Find?$expand=TicketPriceDetails,Details,TicketOptions",
//                    {
//                        RoundTrip: true,
//                        FromPlace: "SGN",
//                        ToPlace: "HAN",
//                        DepartDate: "2016-12-10T00:00:00.000",
//                        ReturnDate: "2016-11-30T00:00:00.000",
//                        CurrencyType: "VND",
//                        FlightType: "DirectAndContinue",
//                        Adult: 1,
//                        Child: 0,
//                        Infant: 0,
//                        Sources: "VietJetAir"
//                    })
//                    headers: {
//                        "Authorization": "Basic " + auth
//                    }
//                    .done(function (data) {
//                        $(".xu-point").text(data);
//                    })
//                    .fail(function () {
//                        //alert( "error" );
//                    });

            });
        });

    </script>
</head>

<div class="test">
    <a href="#">text ajax call</a>
</div>

</body><!-- Google Tag Manager --></html>