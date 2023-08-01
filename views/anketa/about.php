<?php

use app\models\Anketa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->title = 'Все анкеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anketa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_tutor',
            [
                'attribute' => 'id_tutor',
                'value' => function($data){
                    return $data->tutorr->fname;
                }
            ],
            'place',
            'about',
            'experience',
            'education',
            'type',
            [
                'attribute' => 'id_lang',
                'value' => function($data){
                    return $data->lang->name;
                }
            ],
            [
                'attribute'=>'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? '<span class="text-success">Одобрено</span>' : '<span class="text-danger">Не одобрено</span>';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete} {update}'
            ]
        ],
    ]); ?>


</div>
