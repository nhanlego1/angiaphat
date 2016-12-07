<?php
/**
 * @file
 * booking_setting.features.inc
 */

/**
 * Implements hook_node_info().
 */
function booking_setting_node_info() {
  $items = array(
    'booking' => array(
      'name' => t('Booking'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
