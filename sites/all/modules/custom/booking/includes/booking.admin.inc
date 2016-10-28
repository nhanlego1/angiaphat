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
  $form ['common']['max_people_adult'] = array(
    '#type' => 'textfield',
    '#title' => t('Số lượng người lớn tối đa'),
    '#required' => TRUE,
    '#default_value' => variable_get('max_people_adult', 10),
    '#element_validate' => array('element_validate_integer_positive'),
    '#weight' => 1,
    '#group' => 'setting_form'
  );
  $form ['common']['max_people_child_medium'] = array(
    '#type' => 'textfield',
    '#title' => t('Số lượng trẻ em (2T -11T) tối đa'),
    '#required' => TRUE,
    '#default_value' => variable_get('max_people_child_medium', 10),
    '#element_validate' => array('element_validate_integer_positive'),
    '#weight' => 2,
    '#group' => 'setting_form'
  );
  $form ['common']['max_people_child'] = array(
    '#type' => 'textfield',
    '#title' => t('Số lượng trẻ em (dưới 2 tuổi) tối đa'),
    '#required' => TRUE,
    '#default_value' => variable_get('max_people_child', 10),
    '#element_validate' => array('element_validate_integer_positive'),
    '#weight' => 3,
    '#group' => 'setting_form'
  );
  $form = system_settings_form($form);
  return $form;
}