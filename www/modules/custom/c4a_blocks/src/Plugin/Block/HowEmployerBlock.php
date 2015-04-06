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
 *  id = "home_how_employer",
 *  admin_label = @Translation("Home How Employer"),
 *
 * )
 *
 */
class HowEmployerBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
        return array(
            '#type' => '#markup',
            '#markup' => '
                          <div class="how_title">For Employers</div>
                          <div class="block_container">
                          <div class="how_block pn"><span class="ico"></span><span class="title">Post your needs</span></div>
                          <div class="how_block gm"><span class="ico"></span><span class="title">Get matched candidates vetted</span></div>
                          <div class="how_block pi"><span class="ico"></span><span class="title">You make the final pick</span></div>
                          <div class="how_block wm"><span class="ico"></span><span class="title">We manage your Projects risk</span></div>
                         </div>'
        );
    }
}