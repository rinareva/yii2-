<?php

$this->title = 'chat';

use kop\y2sp\assets\ScrollPager;
use yii\bootstrap5\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\data\Pagination;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>

<?= \sintret\chat\ChatRoom::widget(['url'=>  \yii\helpers\Url::to(['/chat/send-chat'])]); ?>;