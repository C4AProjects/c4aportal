<?php
/**
 * Created by PhpStorm.
 * User: ousmanesamba
 * Date: 4/4/15
 * Time: 6:37 PM
 */

namespace Drupal\c4a_blocks\Plugin\Block;


use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;
/**
 * Provide menu for Dev/Employer
 * @Block(
 *  id = "learn",
 *  admin_label = @Translation("Learn"),
 *
 * )
 *
 */
class LearnBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
      $content = array();
      $path = 'learn/video-library';
      $url_object = \Drupal::service('path.validator')->getUrlIfValid($path);
      $route_name = $url_object->getRouteName();
      $url = Url::fromRoute($route_name);
      $video_url =  \Drupal::l(t('Video Library'), $url);
      $path = 'learn/articles';
      $url_object = \Drupal::service('path.validator')->getUrlIfValid($path);
      $route_name = $url_object->getRouteName();
      $url = Url::fromRoute($route_name);
      $article =  \Drupal::l(t('Articles'), $url);
      $content = array(
          '#type' => '#markup',
          '#markup' => '<span class="video">' . $video_url . '</br></span>'
      );
      $content[] = array(
          '#type' => '#markup',
          '#markup' => '<span class="video">' . $article . '</br></span>'
      );   
    
      return $content;
    }
}