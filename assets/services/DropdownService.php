<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\assets\services;

use app\assets\AppAsset;
use yii\helpers\ArrayHelper;

/**
 * Description of SupplierUserService
 *
 * @author uchep
 */
class DropdownService {





  public static function isActive(): array {
    return [
      1 => 'Active',
      0 => 'Not Active'
    ];
  }





}
