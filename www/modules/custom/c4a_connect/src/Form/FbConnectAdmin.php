<?php

/**
 * @file
 * Contains Drupal\c4a_connect\Form\FbConnectAdmin.
 */

namespace Drupal\c4a_connect\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FbConnectAdmin.
 *
 * @package Drupal\c4a_connect\Form
 */
class FbConnectAdmin extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'c4a_connect.fbconnectadmin_config'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'fb_connect_admin';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('c4a_connect.fbconnectadmin_config');
    $form['application_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Application ID'),
      '#description' => $this->t('Also called the <em>OAuth client_id</em> value on Facebook App settings pages. <a href="https://www.facebook.com/developers/createapp.php">Facebook Apps must first be created</a> before they can be added here'),
      '#default_value' => $config->get('application_id'),
    );
    $form['application_secret'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Application secret'),
      '#description' => $this->t('Also called the <em>OAuth client_secret</em> value on Facebook App settings pages.'),
      '#default_value' => $config->get('application_secret'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('c4a_connect.fbconnectadmin_config')
      ->set('application_id', $form_state->getValue('application_id'))
      ->set('application_secret', $form_state->getValue('application_secret'))
      ->save();
  }

}
