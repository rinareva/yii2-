<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <!-- <title>tututor</title> -->
    <title><?= Html::encode($this->title) ?></title>
    <link href="assets/css/theme.css" rel="stylesheet" />
    <?php $this->head() ?>
  </head>
  <?php $this->beginBody() ?>
  <body>
  <header id="header">

  <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-lg navbar-light fixed-top py-3 d-block navbar-klean', 'data-navbar-on-scroll'=>'data-navbar-on-scroll']
    ]);

    echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => array_filter([
          ['label' => 'Найти преподавателя', 'url' => ['/site/contact']],
          ['label' => 'Стать преподавателем', 'url' => ['/site/index']],
          //['label' => 'Contact', 'url' => ['/site/contact']],
          // ['label' => 'Contact', 'url' => ['/site/chat']],
          Yii::$app->user->isGuest ?
          ['label' => 'Зарегистрироваться', 'url' => ['/site/signup']] :
            false,
          Yii::$app->user->id == '1' ?
          ['label' => 'Профиль', 'url' => ['/admin/profile/index']] :
            false,
          Yii::$app->user->id == '4' ?
          ['label' => 'Профиль студента', 'url' => ['/admin/profile/stud']] :
            false,
          //['label' => 'Админ', 'url' => ['/anketa/about'], 'visible' => Yii::$app->user->isGuest && Yii::$app->user->identity->admin ? true : false],
          Yii::$app->user->id == '10' ?
          ['label' => 'Админ', 'url' => ['/anketa/about']] :
            false,
          Yii::$app->user->isGuest
              ? ['label' => 'Войти', 'url' => ['/site/login']]
              : '<li class="nav-item dropdown">'
                  . Html::beginForm(['/site/logout'])
                  . Html::submitButton(
                      'Выйти (' . Yii::$app->user->identity->name . ')',
                      ['class' => 'nav-link btn btn-link logout']
                  )
                  . Html::endForm()
                  . '</li>'
                  ]),
                  
  ]);
  ?>
  <div class="navbar-text pull-right">
      <?=
      \lajax\languagepicker\widgets\LanguagePicker::widget([
          'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
          'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
      ]);
      ?>
  </div>
  <?php NavBar::end(); ?>
      </header>

<div class="container">
  <div class="wrapper">
    <div id="calendar">
    </div>
  </div>
</div>   
    <?php $this->endBody() ?>
  </body>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
  <script defer src="assets/css/theme.js" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
</html>
<?php $this->endPage() ?>