<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes_views\primary\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl =  '@web/themes_assets/primary'; 
    public $css = ['css/style.css','css/plugins.css','css/plugins/pace/pace.css','icons/font-awesome/css/font-awesome.min.css','css/demo.css'];
    public $js = ['js/plugins/pace/pace.js','js/plugins/bootstrap/bootstrap.min.js','js/plugins/slimscroll/jquery.slimscroll.min.js','js/plugins/popupoverlay/jquery.popupoverlay.js',
        'js/plugins/popupoverlay/defaults.js',
        ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
