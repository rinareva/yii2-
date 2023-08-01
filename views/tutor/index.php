<?php

use app\models\Tutor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TutorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<!-- <div class="row">
  <?php foreach($tutors as $tutor): ?>
    <div class="col-sm-3 mb-3">
    <div class="card card-bg">
    <div class="text-center"><a href="<?=Url::toRoute(['site/tutor', 'id' => $tutor['id']]);?>"><img class="my-5" src="assets/img/icons/<?php echo $tutor['img'] ?>" width="100" alt="services" /></a>                      
    <div class="card-body text-center text-md-start">
      <h6 class="fw-bold fs-1"><?php echo $tutor['name'] ?></h6>
      <p class="card-subtitle mb-2 text-muted"><small class="text-muted"><?php echo $tutor['type'] ?></small></p>
      <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $tutor->lang->name ?></h6>
      <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Уроки от</small></p>
      <h4 class="fw-3 mb-md-0 mb-lg-3"><?php echo $tutor->lang->name ?></h4> 
    </div>
    </div>
    </div>
    </div>
  <?php endforeach ?>
</div> -->
</br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'img',
                'format' => 'raw',
                'value' => function($data){ return Html::img(Url::toRoute($data->img),
                    [
                        'alt'=>'yii2 - картинка',
                        'style' => 'width:15px;'
                    ]
                );},
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($data) { return Html::a($data->name, [Yii::$app->controller->id.'/tutor','id'=>$data->id]); }
            ],
            // [
            //     'format' => 'html',
            //     'label' => 'img',
            //     'value' => function($data){
            //     return Html::img($data->getImage(), ['width'=>200]);
            //     }
            // ],
            'place',
            'type',
            'nationality',
            [
                'attribute' => 'id_native_lang',
                'value' => function($data){
                    return $data->lang->name;
                }
            ],
        ],
    ]); ?>
</div>
