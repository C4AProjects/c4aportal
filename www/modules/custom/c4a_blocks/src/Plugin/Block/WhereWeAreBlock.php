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
 *  id = "where_we_are",
 *  admin_label = @Translation("Home Where we are"),
 *
 * )
 *
 */
class WhereWeAreBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){

        return array(
            '#type' => '#markup',
            '#markup' => '
                          <div class="who_title">Our Network</div>
                          <div class="block_container">

                            <div class="us tooltip" title="USA" >
                                <div class="ico"></div>
                            </div>
                            <div class="sn tooltip" title="Sénégal">
                                <div class="ico"></div>
                            </div>
                            <div class="ng tooltip" title="Nigeria">
                                <div class="ico"></div>
                            </div>
                            <div class="sa tooltip" title="South Africa">
                                <div class="ico"></div>
                            </div>
                            <div class="tn tooltip" title="Tunisia">
                                <div class="ico"></div>
                            </div>
                            <div class="et tooltip" title="Ethiopia">
                                <div class="ico"></div>
                            </div>
                            <div class="ke tooltip" title="Kenya">
                                <div class="ico"></div>
                            </div>
                         </div>'
        );
    }
}