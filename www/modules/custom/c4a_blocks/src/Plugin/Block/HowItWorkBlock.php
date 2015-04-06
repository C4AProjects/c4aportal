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
 *  id = "home_how_it_block",
 *  admin_label = @Translation("Home How it Block"),
 *
 * )
 *
 */
class HowItWorkBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
        return array(
            '#type' => '#markup',
            '#markup' => 'How it works'
        );
    }
}