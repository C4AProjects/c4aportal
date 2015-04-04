<?php

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   An associative array containing the structure of the form.
 * @param $form_state
 *   The current state of the form.
 */
function prius_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

  /**
   * Libraries.
   */
  $form['libraries'] = array(
    '#type' => 'details',
    '#title' => t('External libraries'),
    '#open' => TRUE,
  );

  $form['libraries']['enable_respond'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Respond library'),
    '#description' => t('Min/max-width media query polyfill for IE 6-8'),
    '#default_value' => theme_get_setting('libraries.enable_respond', 'prius'),
  );

  $form['libraries']['enable_selectivizr'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enabling Selectivizr library'),
    '#description' => t('Emulates CSS3 pseudo-classes and attribute selectors for IE 6-8'),
    '#default_value' => theme_get_setting('libraries.enable_selectivizr', 'prius'),
  );
}
