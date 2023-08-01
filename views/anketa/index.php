<?php

use app\models\Anketa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearchAnketa $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Моя анкета';
$this->title = 'Моя анкета';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anketa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать анкету', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- <?php echo $this->render('_search', ['model' => $searchModel]); ?> -->

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
                'template' => '{view} {delete}'
            ]
        ],
    ]); ?>


</div>
