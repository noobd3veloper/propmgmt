<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyBowerAsset extends AssetBundle
{
    public $sourcePath = '@bower';

    public $css = [
        'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        
        
    ];
    public $js = [
        'eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',        
    ];
    public $depends = [
    ];

}