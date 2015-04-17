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
 *  id = "who_we_are",
 *  admin_label = @Translation("Home How we work"),
 *
 * )
 *
 */
class WhoWeAreBlock extends BlockBase {


    /**
     * {@inheritdoc}
     */
    public function build(){

        return array(
            '#type' => '#markup',
            '#markup' => '
                          <div class="who_title">Who we are</div>
                          <div class="block_container">
                          <div class="who_block left">
                            <span class="title">More than Code. Practical Solutions</span>
                            <span class="desc">We are full-service software and consulting company
                             specializing in software development for both web and mobile platforms.
                            </span>
                            <div class="bplan">
                                <div class="ico"></div>
                                <div class="content">
                                    <span class="head">Planning</span>
                                    <span class="text">We manage development milestones determin project scope, requirements, design, develop, test, pilot, and deploy.</span>
                                </div>
                            </div>
                            <div class="bdesign">
                                <div class="ico"></div>
                                <div class="content">
                                    <span class="head">Design</span>
                                    <span class="text">We create aesthetically appealing websites, mobile and web applications with focus on quality user experience.</span>
                                </div>
                            </div>
                            <div class="bbuild">
                                <div class="ico"></div>
                                <div class="content">
                                    <span class="head">Design</span>
                                    <span class="text">We build high quality native applications for iPhone, Andoid, and Windows Phone platforms.</span>
                                </div>
                            </div>
                         </div>
                         </div>'
        );
    }
}