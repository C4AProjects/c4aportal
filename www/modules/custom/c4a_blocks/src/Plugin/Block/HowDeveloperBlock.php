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
 *  id = "home_how_developer",
 *  admin_label = @Translation("Home How Developer Block"),
 *
 * )
 *
 */
class HowDeveloperBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){
        return array(
            '#type' => '#markup',
            '#markup' => '
                          <div class="how_title">For Developers</div>
                          <div class="block_container">
                          <div class="how_block bm"><span class="ico"></span><span class="title">Become a member</span></div>
                          <div class="how_block gt"><span class="ico"></span><span class="title">Get trained</span></div>
                          <div class="how_block gc"><span class="ico"></span><span class="title">Get coached</span></div>
                          <div class="how_block bw"><span class="ico"></span><span class="title">Begin work</span></div>
                         </div>'
        );
    }
}