<?php
/**
 * Created by PhpStorm.
 * User: hautruong
 * Date: 27/10/2016
 * Time: 17:39
 */

function booking_setting_form($form, &$form_state) {

  $form['common'] = array(
    '#type' => 'fieldset',
    '#title' => t('Booking Config'),
    '#collapsible' => TRUE,
    '#description' => t('Booking Config.'),
    '#group' => 'setting_form'
  );
  $form ['common']['booking_rest_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Booking End-point (baseUrl)'),
    '#required' => TRUE,
    '#description' => 'URL API REST is deployed (including trailing slash)',
    '#default_value' => variable_get('booking_rest_url', 'http://api.atvietnam.vn'),
    '#group' => 'setting_form'
  );
  $form ['common']['list_airline_support'] = array(
    '#type' => 'textfield',
    '#title' => t('Danh sách hãng airline được hỗ trợ'),
    '#required' => TRUE,
    '#description' => 'Cách nhau bởi dấu phẩy (,)',
    '#default_value' => variable_get('list_airline_support', 'VietJetAir,JetStar,VietnamAirlines'),
    '#group' => 'setting_form'
  );
  $form ['common']['api_username'] = array(
    '#type' => 'textfield',
    '#title' => t('Api Username'),
    '#required' => TRUE,
    '#default_value' => variable_get('api_username', ''),
    '#group' => 'setting_form'
  );

  $form ['common']['api_password'] = array(
    '#type' => 'textfield',
    '#title' => t('Api Password'),
    '#required' => TRUE,
    '#default_value' => variable_get('api_password', ''),
    '#group' => 'setting_form'
  );

  $form ['common']['max_people_adult'] = array(
    '#type' => 'textfield',
    '#title' => t('Số lượng người lớn tối đa'),
    '#required' => TRUE,
    '#default_value' => variable_get('max_people_adult', 10),
    '#element_validate' => array('element_validate_integer_positive'),
    '#group' => 'setting_form'
  );
  $form ['common']['max_people_child_medium'] = array(
    '#type' => 'textfield',
    '#title' => t('Số lượng trẻ em (2T -11T) tối đa'),
    '#required' => TRUE,
    '#default_value' => variable_get('max_people_child_medium', 10),
    '#element_validate' => array('element_validate_integer_positive'),
    '#group' => 'setting_form'
  );
  $form ['common']['max_people_child'] = array(
    '#type' => 'textfield',
    '#title' => t('Số lượng trẻ em (dưới 2 tuổi) tối đa'),
    '#required' => TRUE,
    '#default_value' => variable_get('max_people_child', 10),
    '#element_validate' => array('element_validate_integer_positive'),
    '#group' => 'setting_form'
  );
  $form = system_settings_form($form);
  return $form;
}