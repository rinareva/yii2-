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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/theme.css',
        'css/theme.min.css',
        'css/theme-rtl.css',
        'css/theme-rtl.min.css',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&amp;display=swap',
        'css/font-awesome.css',
        'css/font-awesome.min.css'
    ];
    public $js = [
        'js/bootstrap-navbar.js',
        'js/theme.js',
        'js/theme.min.js',
        'js/main.js',
        'vendors/@popperjs/popper.min.js',
        'vendors/bootstrap/bootstrap.min.js',
        'vendors/is/is.min.js',
        'https://polyfill.io/v3/polyfill.min.js?features=window.scroll',
        'vendors/feather-icons/feather.min.js',
    ];
    public $img = [
        'img/favicons/apple-touch-icon.png',
        'img/favicons/favicon-32x32.png',
        'img/favicons/favicon-16x16.png',
        'img/favicons/favicon.ico',
        'img/favicons/manifest.json',
        'img/favicons/mstile-150x150.png',
        'img/illustrations/footer-bg.png',
        'img/illustrations/hero.png',
        'img/illustrations/heroheader-bg.png',
        'img/gallery/logo.png',
        'img/illustrations/heroheader-bg.png',
        'img/icons/facebook.svg',
        'img/icons/twitter.svg',
        'img/icons/linkdin.svg',
        'img/icons/youtube.svg',
        'img/illustrations/language1.png',
        'img/illustrations/language2.png',
        'img/illustrations/language3.png',
        'img/illustrations/language4.png',
        // 'img/icons/organized.png',
        // 'img/icons/screen.png',
        // 'img/icons/statistics.png',
        // 'img/icons/text.png',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
