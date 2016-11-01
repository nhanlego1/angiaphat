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
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
      ));
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);          //  curl authentication
      curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");    //  curl authentication
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
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
}