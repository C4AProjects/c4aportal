<?php
/**
 * Created by PhpStorm.
 * User: ousmanesamba
 * Date: 4/28/15
 * Time: 10:03
 */

namespace Drupal\c4a_customs\Controller;


use Drupal\Core\Controller\ControllerBase;

class CodersController extends ControllerBase{

    /**
     * {@inheritdoc}
     */
    public function  index(){
        $build = array(
            '#type' => 'markup',
            '#markup' => t(''),
        );
        return $build;
    }

}