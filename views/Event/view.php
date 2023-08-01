<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Event $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_student',
                'value' => function($data){
                    return $data->student->name;
                }
            ],
            // [
            //     'attribute' => 'id_tutor',
            //     'value' => function($data){
            //         return $data->tutorr->fname;
            //     }
            // ],
            'title',
            'description',
            'date',
            [
                'attribute'=>'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? '<span class="text-success">Проведен</span>' : '<span class="text-danger">Не проведен</span>';
                }
            ],
            //'status',
            // [
            //     'attribute'=>'status',
            //     'format' => 'raw',
            //     'value' => function($data){
            //         return $data->status ? '<span class="text-success">Подтвержденный</span>' : '<span class="text-danger">Не подтвержденный</span>';
            //     }
            // ],
        ],
    ]) ?>

</div>
