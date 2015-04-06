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
 *  id = "home_menu",
 *  admin_label = @Translation("Home Developer Block"),
 *
 * )
 *
 */
class HomeDeveloperBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
        return array(
            '#type' => '#markup',
            '#markup' => '<span class="title">Are you a Developer ?</span>
                         <span class="help">Join our network. Get trained,connected with other developers and get hired.</span>
                         <a href="/">Join</a>'
        );
    }
}