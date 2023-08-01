<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use kartik\icons\FontAwesomeAsset;

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

      <section>
        <section id="home">
        <div class="bg-holder d-none d-md-block bg-size" style="background-image:url(assets/img/lang2.png);background-position:right bottom;">
        </div>
        

        <div class="bg-holder" style="background-image:url(assets/img/illustrations/heroheader-bg.png);background-position:center;background-size:contain;">
        </div>
       

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-lg-6 py-6">
              <h1 class="fw-bold display-4 fs-4 fs-lg-6 fs-xxl-7" style="color: #2d9cb5;"> Начни учить</h1>
              <h1 class="fw-bold" style="color: #2d9cb5;">язык <span class="fw-bold" style="color: #2d9cb5;">прямо сейчас</span></h1>
              <p class="mb-5 fs-0">Отправься в свое путешествие ногово языка!</p>
              <!-- <a class="btn hover-top btn-glow btn-klean" href="/tutor/index">Поехали !</a> -->
              <?php echo Html::a("Поехали !",["/site/contact"],['class' => 'btn hover-top btn-glow btn-klean']); ?>
            </div>
          </div>
        </div>
      </section>
        <div class="container">
          <div class="row align-items-center">
              <?= $content ?>
          </div>
        </div>
      </section>
      <section>
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/cta-bg.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder" style="background-image:url(assets/img/illustrations/cta-bg-1.png);background-position:right top;background-size:auto;margin-top:-38px;margin-left:-200px;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center circle-blend circle-blend-right circle-pink">
            <div class="col-xxl-9 py-5 text-center">
              <h1 class="fw-bold mb-4 text-gradient fs-6">Exclusively by ThemeWagon</h1>
              <p class="mb-6 mx-xxl-11">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by<span class="fw-bold">ThemeWagon  </span></p><a class="btn hover-top btn-glow btn-klean rounded-pill" href="#">Download Free</a>
            </div>
          </div>
        </div>
      </section>
      <!-- футер -->
      <section class="pb-0 pt-6">
        <div class="bg-holder" style="background-image:url(img/illustrations/footer-bg.png);background-position:center;background-size:cover;">
        </div>

        <div class="container">
          <div class="row justify-content-lg-between circle-blend-right circle-danger">
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h5 class="text-600 mb-3 fw-bold">About</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Prices</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">About</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Resources</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Team</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Blog</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h5 class="text-600 mb-3 fw-bold">Resources </h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Terms</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Help</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Privacy</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h5 class="text-600 mb-3 fw-bold">Team</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Dveloper</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Designer</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h5 class="text-600 mb-3 fw-bold">Blog</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">CEO</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Lifestyle</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Article</a></li>
                <li class="mb-2"><a class="text-400 text-decoration-none" href="#!">Tech</a></li>
              </ul>
            </div>
            <div class="col-9 col-sm-6 col-lg-auto mb-3">
              <h5 class="text-600 mb-3 fw-bold">Follow Us</h5>
              <ul class="list-unstyled list-inline my-3">
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/facebook.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/twitter.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/linkdin.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/youtube.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"></a></li>
              </ul>
              <p class="fw-semi-bold mt-4 mb-3">Subscribe to our newsletter</p>
              <label class="col-sm-2 col-form-label visually-hidden" for="inputEmail2">Email</label>
              <div class="col-sm-12 input-group-icon">
                <input class="form-control rounded-pill border-white py-1 px-4" id="inputEmail2" type="email" placeholder="email" />
                <svg class="bi bi-envelope-fill input-box-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" style="left:.8rem;">
                  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                </svg>
              </div>
            </div>
          </div>
          <hr class="text-100 mb-0" />
          <div class="row justify-content-md-between justify-content-evenly py-3">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs--1 my-2 fw-bold">All rights Reserved &copy; tututor, 2023</p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 my-2 text-center text-md-end"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#EB6453" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp; by&nbsp;Katy 
              </p>
            </div>
          </div>
        </div>
      </section>
   
    <?php $this->endBody() ?>
  </body>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
</html>
<?php $this->endPage() ?>