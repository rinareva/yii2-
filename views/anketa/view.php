<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Anketa $model */

// $this->title = 'Моя анкета';
$this->title = 'Анкета репетитора';
$this->params['breadcrumbs'][] = ['label' => 'Anketas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anketa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?> -->
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger',
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
            
        ],
    ]) ?>

</div>
