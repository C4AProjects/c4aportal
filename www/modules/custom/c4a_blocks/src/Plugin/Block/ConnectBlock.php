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
 *  id = "connect_with_us",
 *  admin_label = @Translation("Connect with us"),
 *
 * )
 *
 */
class ConnectBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){

        return array(
            '#type' => '#markup',
            '#markup' => '
                          <div class="who_title">Connect with Us</div>
                          <div class="block_container">
                            <div class="facebook">
                                <div class="ico"></div>
                            </div>
                            <div class="twitter">
                                <div class="ico"></div>
                            </div>
                            <div class="gplus">
                                <div class="ico"></div>
                            </div>
                            <div class="github">
                                <div class="ico"></div>
                            </div>
                         </div>
                         </div>'
        );
    }
}