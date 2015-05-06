<?php

/**
 * @file
 * Contains Drupal\c4a_connect\Plugin\Block\FacebookLogin.
 */

namespace Drupal\c4a_connect\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
/**
 * Provides a 'FacebookLogin' block.
 *
 * @Block(
 *  id = "facebook_login",
 *  admin_label = @Translation("facebook_login"),
 * )
 */
class FacebookLogin extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
      global $base_url;
      $build = [];
      c4a_connect_facebook_client_load();
      $config = \Drupal::config('c4a_connect.fbconnectadmin_config');
      $init_params = array(
          'appId' => $config->get('application_id'),
          'secret' => $config->get('application_secret'),
      );

      FacebookSession::setDefaultApplication($init_params['appId'], $init_params['secret']);
      $helper = new FacebookRedirectLoginHelper($base_url.'/user/facebook-connect');
      try {
          if ( isset( $_SESSION['token'] ) ) {
              // Check if an access token has already been set.
              $session = new FacebookSession( $_SESSION['token'] );

          } else {
              // Get access token from the code parameter in the URL.
              $session = $helper->getSessionFromRedirect();
          }
      } catch( FacebookRequestException $ex ) {

          // When Facebook returns an error.
          print_r( $ex );
      } catch( \Exception $ex ) {

          // When validation fails or other local issues.
          print_r( $ex );
      }
      if ( isset( $session ) ) {

          // Retrieve & store the access token in a session.
          $_SESSION['token'] = $session->getToken();
          $logoutURL = $helper->getLogoutUrl( $session, 'http://your-app-domain.com/user/logout' );
          // Logged in

          drupal_set_message('Successfully logged in!');
      } else {
          $permissions = array(
              'email',
              'user_birthday'
          );
          // Generate the login URL for Facebook authentication.
          $loginUrl = $helper->getLoginUrl($permissions);
          $build['facebook_login']['#markup']   = '<a href="' . $loginUrl . '">Login with facebook</a>';
      }

    return $build;
  }

}
