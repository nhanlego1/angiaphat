<?php

/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 01/11/2016
 * Time: 11:00
 */
class BookingHelper {
  public static function rest_http_post($url, $data_post, $username, $password) {
    try {
      $json = json_encode($data_post);
      if (!$json) {
        throw new RemoteRestException('Unable to serialize data for HTTP POST', 999);
      }
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);          //  curl authentication
      curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");    //  curl authentication
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
      $str = curl_exec($ch);
      curl_close($ch);
      $data = json_decode($str);      // Dữ liệu trả về là kiểu stdClass Object
    }
    catch (Exception $e) {
      watchdog_exception('booking', json_encode(array(
        'error' => $e->getMessage(),
        'data' => $data_post,
        'url' => $url,
        'response' => $str,
      )));
      return NULL;
    }
    return $data;
  }

  public static function getImageByAirlineCode($airline_code) {
    $targets = array('vietjetair', 'jetstar');
    $path = drupal_get_path('module', 'booking') . '/assets/images/';
    foreach ($targets as $target) {
      if (preg_match("/$target/", strtolower($airline_code))) {
        return '<img src="' . url($path . $target . '.png') . '">';
      }
    }
    return '';
  }

  public static function getClassByAirlineCode($airline_code) {
    $targets = array('vietjetair', 'jetstar');
    $path = drupal_get_path('module', 'booking') . '/assets/images/';
    foreach ($targets as $target) {
      if (preg_match("/$target/", strtolower($airline_code))) {
        return $target;
      }
    }
    return '';
  }

  public static function getPrice($price, $default_return_value = '') {
    if (!is_numeric($price)) {
      return $default_return_value;
    }
    return number_format($price);
  }

  public static function getTime($datetime1, $datetime2) {
    $out = '';
    $out .= date("H:i:s", strtotime($datetime1));
    $out .= ' - ';
    $out .= date("H:i:s", strtotime($datetime2));
    return $out;
  }

  public static function array_chop(&$arr, $num) {
    $ret = array_slice($arr, 0, $num);
    $arr = array_slice($arr, $num);
    return $ret;
  }

  public static function build_data_filter($data_post) {
    $filters = array(
      "RoundTrip",
      "FromPlace",
      "ToPlace",
      "DepartDate",
      "ReturnDate",
      "CurrencyType",
      "FlightType",
      "Adult",
      "Child",
      "Infant",
    );

    $result = array();

    $result['Sources'] = variable_get('list_airline_support', 'VietJetAir,JetStar,VietnamAirlines');
    foreach ($filters as $filter) {
      switch ($filter) {
        case 'RoundTrip':
          $result[$filter] = isset($data_post[$filter]) ? filter_var($data_post[$filter], FILTER_VALIDATE_BOOLEAN) : FALSE;
          break;
        case 'FromPlace':
        case 'ToPlace':
          $result[$filter] = $data_post[$filter];
          break;
        case 'DepartDate':
          $date = str_replace('/', '-', $data_post[$filter]);
          $result[$filter] = date("Y-m-d\TH:i:s", strtotime($date));
          break;
        case 'ReturnDate':
          $date = str_replace('/', '-', isset($data_post[$filter]) ? $data_post[$filter] : $data_post['DepartDate']);
          $result[$filter] = date("Y-m-d\TH:i:s", strtotime($date));
          break;
        case 'Adult':
        case 'Child':
        case 'Infant':
          $result[$filter] = !empty($data_post[$filter]) ? intval($data_post[$filter]) : 0;
          break;
        case 'CurrencyType':
          $result[$filter] = isset($data_post[$filter]) ? $data_post[$filter] : 'VND';
          break;
        case 'FlightType':
          $result[$filter] = isset($data_post[$filter]) ? $data_post[$filter] : 'DirectAndContinue';
          break;
      }
    }
    return $result;
  }
}