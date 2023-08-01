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
?>



<div class="card mb-3" style="width: 50rem;">
  <div class="card-body">
  <div class="text">
    <img src="assets/img/icons/<?php echo $tutors['img'] ?>" class="my-5" alt="services">
    <h6 class="fw-bold fs-1"><?php echo $tutors['name'] ?></h6>
    <p class="card-text"><?php echo $tutors['type'] ?></p>
    <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Преподает</small></p>
    <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $tutors->lang->name ?></h6>
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
            </br><p><?php echo $tutors['place'] ?></p></br>
            <p><?php echo $tutors['about'] ?></p>
        </div></br>
        <div class="tab-pane fade" id="profile" role="tabpanel">
            </br><p><?php echo $tutors['education'] ?></p>
        </div>
        <div class="tab-pane fade" id="profilee" role="tabpanel">
            </br><p><?php echo $tutors['experience'] ?></p>
        </div>
    </div>
    </div>
    </br>
    <?php echo Html::a("Записаться на пробный урок",["/event/create"],['class' => 'btn btn-secondary btn-sm']); ?></br>
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

<!-- <h6 class="fw-bold fs-1">Расписание</h6>
<div class="card card-bg mb-3" style="width: 50rem;">
    <div class="card-body">
    <div class="text">
    <?php echo Html::a("Записаться на пробный урок",["/event/create"],['class' => 'btn btn-secondary btn-sm']); ?></br>
    </div>
</div>
</div> -->

<!-- <h6 class="fw-bold fs-1">chat</h6>
<div class="card card-bg mb-3" style="width: 50rem;">
    <div class="card-body">
    <div class="text">

    </div>
</div>
</div> -->



<h6 class="fw-bold fs-1">Отзывы</h6>
<div class="card card-bg mb-3" style="width: 50rem;">
    <div class="card-body">
    <div class="col">
    <?php echo Html::a("Написать отзыв",["/comment/create"],['class' => 'btn btn-secondary btn-sm']); ?></br>
  </div>
    </br>
    <div class="text">
    <div class="row">
    <?php foreach($com as $com): ?>
        <div class="col-sm-4 mb-3">
        <div class="card card-bg">                   
        <div class="card-body">
            <h6 class="fw-bold fs-1"><?php echo $com->stud->name ?></h6>
            <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Изучает <?php echo $com->stud->lang->name ?></small></p>
            <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $com['name'] ?></h6>
            <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo StarRating::widget(['name' => 'rating', 'value' => $com['rating'], 'pluginOptions' => ['displayOnly' => true]]); ?></h6>
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