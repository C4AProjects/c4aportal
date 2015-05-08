<?php
/**
 * Created by PhpStorm.
 * User: ousmanesamba
 * Date: 4/4/15
 * Time: 6:37 PM
 */

namespace Drupal\c4a_blocks\Plugin\Block;


use Drupal\Core\Block\BlockBase;

/**
 * Provide menu for Dev/Employer
 * @Block(
 *  id = "community_member",
 *  admin_label = @Translation("Members"),
 *
 * )
 *
 */
class CommunityMemberBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
      $content = array();
      $node = \Drupal::request()->attributes->get('node');
      $query = db_select('users_field_data', 'u');
      $query->join('flagging', 'flag', 'flag.uid = u.uid');
      $query->fields('u', array('name'));
      $query->condition('flag.entity_id', $node->id());
      $query->condition('flag.fid', 'subscribe_to_community');
      $result = $query->execute()->fetchCol();
      foreach ($result as $name) {
        $content[] = array(
          '#type' => '#markup',
          '#markup' => '<span class="username">' . $name . '</br></span>'
        );  
      }
      return $content;
    }
}