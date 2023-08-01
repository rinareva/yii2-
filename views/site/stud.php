<?php

use app\models\Event;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EventSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои занятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_tutor',
                'value' => function($data){
                    return $data->tutorr->fname;
                }
            ],
            'title',
            'description',
            // [
            //     'attribute' => 'id_tutor',
            //     'value' => function($data){
            //         return $data->tutorr->fname;
            //     }
            // ],
            'date',
            // 'status',
            [
                'attribute'=>'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? '<span class="text-success">Проведен</span>' : '<span class="text-danger">Не проведен</span>';
                }
                // 'content' => function($model){
                //     return get_class($model)::$nameStatus[$model->status];
                // },
                //'filter' => Event::$nameStatus
            ],
            'text',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete} {update}'
            ],
            // [
            //     'class' => 'yii\grid\CheckboxColumn',
            //     'header' => 'status',
            //     'checkboxOptions' => function ($model, $key, $index, $column) {
            //         return $model->status ? ['checked' => "checked"] : [];
            //     }
            // ],
        ],
    ]); ?>


</div>
