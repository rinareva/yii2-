<?php

use app\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мой профиль студента';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'age',
            'gender',
            'place',
            [
                'attribute' => 'id_native_lang',
                'value' => function($data){
                    return $data->lang->name;
                }
            ],
            'nationality',
            'about',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}'
            ]
        ],
    ]); ?>


</div>
