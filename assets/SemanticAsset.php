<?php
namespace app\assets;

use yii\web\AssetBundle;

class SemanticAsset extends AssetBundle
{
    public $sourcePath = '@bower/semantic';

    public $css = [
        'dist/semantic.min.css',
        
        
    ];
    public $js = [
        'dist/semantic.min.js',
        'dist/components/transition.js',
        'dist/components/form.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>