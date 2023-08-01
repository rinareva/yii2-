<?php

$this->title = 'Tututor';

use kop\y2sp\assets\InfiniteAjaxScrollAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use kartik\rating\StarRating;
use yii\helpers\Url;

use kriss\calendarSchedule\widgets\FullCalendarWidget;
use kriss\calendarSchedule\widgets\processors\EventProcessor;
use kriss\calendarSchedule\widgets\processors\HeaderToolbarProcessor;
use kriss\calendarSchedule\widgets\processors\LocaleProcessor;



?>



<div class="card mb-3" style="width: 50rem;">
  <div class="card-body">
  <div class="text"></br>
  <?= Html::img(Yii::getAlias('@web').'/assets/img/icons/'.$anketa->tutorr->img, ['alt' => 'image', 'width' => '200', 'style' => 'border-radius: 10%;']);?></br>
  </br>
    <h6 class="fw-bold fs-1"><?php echo $anketa->tutorr->fname ?>  ⭐ <?php echo $anketa->tutorr->avg_raiting ?></h6>
    <p class="card-text"><?php echo $anketa['type'] ?></p>
    <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Преподает</small></p>
    <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $anketa->lang->name ?></h6>
  </div>
    <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" href="#home" aria-selected="true" role="tab">Обо мне</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#profile" aria-selected="false" role="tab" tabindex="-1">Образование</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#profilee" aria-selected="false" role="tab" tabindex="-1">Опыт</a>
    </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active show" id="home" role="tabpanel">
            </br><p>Страна проживания - <?php echo $anketa['place'] ?></p></br>
            <p><?php echo $anketa['about'] ?></p>
        </div></br>
        <div class="tab-pane fade" id="profile" role="tabpanel">
            </br><p><?php echo $anketa['education'] ?></p>
        </div>
        <div class="tab-pane fade" id="profilee" role="tabpanel">
            </br><p><?php echo $anketa['experience'] ?></p>
        </div>
    </div>
    </div>
    </br>
    <!-- <?php echo Html::a('Добавить в Google Calendar', ['/event/create', 'id'=>$_GET['id']]);?></br> -->
    <?php echo Html::a("Записаться на пробный урок",["/event/create", 'id' => $_GET['id']],['class' => 'btn btn-secondary btn-sm']); ?></br>
    </br>
</div>

<h6 class="fw-bold fs-1">Уроки</h6>
<div class="card mb-3" style="width: 50rem;">
    <div class="card-body">
    <div class="text">
    <table class="table table-hover ">
  <?php foreach($price as $price): ?>
    <tr>
      <!-- <th scope="row"><?php echo $price->category->vid ?></th> -->
      <td><?php echo $price->category->name ?></br>
      <small class="text-muted">— <?php echo $price->category->vid ?></small></td>
      <td><?php echo $price['price'] ?> руб</td>
    </tr>
    <?php endforeach ?>
</table>
    </div>
</div>
</div>

<h6 class="fw-bold fs-1">Расписание</h6>
<div class="card card-bg mb-3" style="width: 50rem;">
    <div class="card-body">
    <div class="text">
    
   <?php echo FullCalendarWidget::widget([
    'calendarRenderBefore' => "console.log('before', calendar)",
    'calendarRenderAfter' => "console.log('after', calendar)",
    'clientOptions' => [
    ],
    
    'processors' => [
        // quick solve fullCalendar options
        new LocaleProcessor([
            'locale' => 'en',
        ]),
        new HeaderToolbarProcessor(),
        new EventProcessor([
            // use Array
            'events' => [
                [
                    'title' => 'aaa', 
                    'start' => time(), 
                    'end' => time() + 10 * 3600
                ],
            ],
            // use Ajax
            'events' => ['site/events'], // see FullCalendarEventsAction
        ]),
    ],
]);?></br>

    <?php echo Html::a("Записаться на пробный урок",["/event/create"],['class' => 'btn btn-secondary btn-sm']); ?></br>
    </div>
</div>
</div>


<h6 class="fw-bold fs-1">Отзывы</h6>
<div class="card card-bg mb-3" style="width: 50rem;">
    <div class="card-body">
    <div class="col">
    <?php echo Html::a("Написать отзыв",["/comment/create", 'id' => $_GET['id']],['class' => 'btn btn-secondary btn-sm']); ?></br>
  </div>
    </br>
    <div class="text">
    <div class="row">
    <?php foreach($com as $com): ?>
        <div class="col-sm-4 mb-3">
        <div class="card card-bg">                   
        <div class="card-body">
            <h6 class="fw-bold fs-1"><?php echo $com->stud->name ?></h6>
            <!-- <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Изучает <?php echo $com->stud->lang->name ?></small></p> -->
            <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $com['name'] ?></h6>
            <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo StarRating::widget([
                'name' => 'rating', 
                'value' => $com['rating'], 
                'pluginOptions' => [
                    'displayOnly' => true
                    ]]); ?></h6>
        </div>
        </div>
        </div>  
        <?php endforeach ?>
    </div>
</div>
</div>




<style>
    .table{ 
        overflow: hidden; 
        border-radius: 15px;
    }
</style>