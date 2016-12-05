<html>
<head>
	<meta charset="utf-8" />
    <link media="all" href="style.css" type="text/css" rel="stylesheet">
</head>
<body>

<?php
	
	$data_post = '{
"RoundTrip": true,
"FromPlace": "SGN",
"ToPlace": "HAN",
"DepartDate": "2016-11-22T00:00:00.000",
"ReturnDate": "2016-11-30T00:00:00.000",
"CurrencyType": "VND",
"FlightType": "DirectAndContinue",
"Adult": 1,
"Child": 0,
"Infant": 0,
"Sources": "VietJetAir,JetStar,VietnamAirlines"
}';
//	"Sources": "VietJetAir" Tìm một hãng VietJetAir
//	"Sources": "JetStar" Tìm một hãng JetStar
	
	$username = "angiaphat247.vn"; $password = "ZVBNhfg4";		//username and password của API
	
	$ch = curl_init();
	
	$url = 'http://api.atvietnam.vn/oapi/airline/Flights/Find?$expand=TicketPriceDetails,Details,TicketOptions';
	// expand thêm 3 trường TicketPriceDetails,Details,TicketOptions (có thể chỉ chọn 1 hay nhiều )
	// TicketPriceDetails : Chi tiết giá Net , thuế phí của người lớn, trẻ em ...
	// Details : Chi tiết các chặng dừng
	// TicketOptions : Các hạng mục vé khác ( nếu có ), vd VNAirline có Economy Save, Economy Standard ...

	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json' )
	);
	
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);    		  //  curl authentication
	
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");		//  curl authentication
	
	curl_setopt($ch, CURLOPT_POST, 1);
	
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data_post);

	$str=  curl_exec($ch);
	
	curl_close($ch);
	
	$data = json_decode($str);			// Dữ liệu trả về là kiểu stdClass Object
	
	//echo $data_post.'<br />';

	

?>
<table>
    nhan
<?php
	foreach($data->value as $val)
    { 
		
	 
		
	?>
    
	<tr class="i-result">
   		<td class="flight-logo-name">
         <?php

			echo $val->Airline;
			?>
            
        </td>
        <td><span><?=$val->FlightNumber?></span></td>
        <td class="time-going-flight"><?=$val->DepartTime?> - <?=$val->LandingTime?></td>
        <td class="f-price td-price-wapper"><?=number_format($val->Price)?> VND</td>
        <td style="padding-left:0px;display:" class="v-detail"><a class="linkViewFlightDetail" >
        	<b>Xem Chi Tiết</b></a>
        </td>
        <td style="width: 50px;" class="end"><input type="radio" rec="0" flightref="<?=$val->FlightNumber?>" id="" name="Block<?=$roundTrip?>" value="<?=$val->FlightNumber?>"></td>
    </tr>
    
 
    	
<?php 
		
	}
	?>
  </table> 
  
  
  
  
</body>
</html>