<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchAnketa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anketa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_tutor') ?>

    <?= $form->field($model, 'place') ?>

    <?= $form->field($model, 'about') ?>

    <?= $form->field($model, 'experience') ?>

    <?= $form->field($model, 'education') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'id_lang') ?>

    <?= $form->field($model, 'price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
