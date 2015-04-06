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
 *  id = "home_menu_employer",
 *  admin_label = @Translation("Home Employer Block"),
 *
 * )
 *
 */
class HomeEmployerBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
        return array(
            '#type' => '#markup',
            '#markup' => '<span class="title">Want to rent a coder ?</span>
                         <span class="help">Rent coder as company, startup or individual</span>
                         <a href="/">Learn more</a>'
        );
    }
}