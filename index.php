<?php
/**
 * Created by PhpStorm.
 * User: ylsc
 * Date: 16-8-31
 * Time: 上午11:53
 */

require 'app/createZhuan.php';

$class = 'Zhuan';

spl_autoload_register(function ($class) {
    include 'Models/' . $class . '.php';
});