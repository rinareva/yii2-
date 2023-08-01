<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Anketa $model */

$this->title = 'Создать анкету';
$this->params['breadcrumbs'][] = ['label' => 'Anketas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anketa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
