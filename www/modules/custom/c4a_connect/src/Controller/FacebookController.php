<?php

/**
 * @file
 * Contains Drupal\c4a_connect\Controller\FacebookController.
 */

namespace Drupal\c4a_connect\Controller;

use Drupal\Component\Utility\String;
use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;

/**
 * Class FacebookController.
 *
 * @package Drupal\c4a_connect\Controller
 */
class FacebookController extends ControllerBase {
  /**
   * Connect.
   *
   * connect user with facebook and redirect to user page.
   */
  public function connect() {
      c4a_connect_facebook_client_load();

      $config = \Drupal::config('c4a_connect.fbconnectadmin_config');
      $init_params = array(
          'appId' => $config->get('application_id'),
          'secret' => $config->get('application_secret'),
      );
      FacebookSession::setDefaultApplication($init_params['appId'], $init_params['secret']);
      $helper = new FacebookRedirectLoginHelper('http://c4aportal.dev/user/facebook-connect');

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
      // see if we have a session
      if ( isset( $session ) )
      {
          // set the PHP Session 'token' to the current session token
          $_SESSION['token'] = $session->getToken();
          $request = ( new FacebookRequest( $session, 'GET', '/me' ) )->execute();
          $fbuser = $request->getGraphObject()->asArray();
          if($fbuser){
              if(isset($fbuser['email'])){
                  $query = db_select('users_field_data', 'u');
                  // @TODO Use $this->connection() instead as suggested by Adam
                  $query->condition('u.mail', String::checkPlain($fbuser['email']));
                  $query->fields('u', array('uid'));
                  $query->range(0, 1);

                  $drupal_user_id = 0;
                  $result = $query->execute()->fetchAll(\PDO::FETCH_ASSOC);

                  if (count($result))
                      $drupal_user_id = $result[0]['uid'];

                  if($drupal_user_id){
                      $user_obj = User::load($drupal_user_id);
                      if ($user_obj->isActive()){
                          user_login_finalize($user_obj);
                          drupal_set_message(t('You have been logged in with the username !username', array('!username' => $user_obj->getUsername())));
                          return $this->redirect('user.page');
                      }
                      else{
                          drupal_set_message($this->t('You could not be logged in as your account is blocked. Contact site administrator.'), 'error');
                          return $this->redirect('user.page');
                      }
                  }
                  else{
                      //create the drupal user
                      //This will generate a random password, you could set your own here
                      $fb_username = (isset($fbuser['first_name']) ? $fbuser['first_name'].''.$fbuser['last_name'] : $fbuser['name']);
                      $drupal_username_generated = c4a_connect_unique_user_name(String::checkPlain($fb_username));
                      $password = user_password(8);
                      //set up the user fields
                      $fields = array(
                          'name' => $drupal_username_generated,
                          'mail' => String::checkPlain($fbuser['email']),
                          'pass' => $password,
                          'status' => 1,
                          'init' => 'email address',
                          'roles' => array(
                              DRUPAL_AUTHENTICATED_RID => 'authenticated user',
                          ),
                      );
                      $pic_url = "https://graph.facebook.com/" . String::checkPlain($fbuser['id']) . "/picture?width=100&height=100";
                      $result = \Drupal::httpClient()->get($pic_url);
                      $file = 0;
                      if ($result->getStatusCode() == 200) {
                          //@TODO: get default path
                          $picture_directory = file_default_scheme() . '://' . 'pictures/';
                          file_prepare_directory($picture_directory, FILE_CREATE_DIRECTORY);
                          $file = file_save_data($result->getBody(), $picture_directory . '/' . String::checkPlain($fbuser['id']) . '.jpg', FILE_EXISTS_RENAME);
                      }
                      else {
                          // Error handling.
                      }
                      if (is_object($file)) {
                          $fields['user_picture'] = $file->id();
                      }
                      //the first parameter is left blank so a new user is created
                      $account = entity_create('user', $fields);
                      $account->save();
                      // If you want to send the welcome email, use the following code
                      // Manually set the password so it appears in the e-mail.
                      $account->password = $fields['pass'];
                      // Send the e-mail through the user module.
                      //@TODO
                      //drupal_mail('user', 'register_no_approval_required', $account->mail, NULL, array('account' => $account), variable_get('site_mail', 'admin@drupalsite.com'));
                      drupal_set_message(t('You have been registered with the username !username', array('!username' => $account->getUsername())));
                      user_login_finalize($account);
                      return $this->redirect('user.page');
                  }
              }
              else {
                  drupal_set_message(t('Though you have authorised the Facebook app to access your profile, you have revoked the permission to access email address. Please contact site administrator.'), 'error');
                  return $this->redirect('user.page');
              }

          }
          else{
              if (!isset($_REQUEST['error'])) {
                  return $this->redirect('user.login');
              }
          }
      }
      $build = array(
          '#type' => 'markup',
          '#markup' => t('test'),
      );
      return $build;

  }

}
