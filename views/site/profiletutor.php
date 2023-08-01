<?php

$this->title = 'My Yii Application';
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
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
</div>