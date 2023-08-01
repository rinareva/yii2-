<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Language;
use yii\helpers\ArrayHelper;
use coderius\pell\Pell;

/** @var yii\web\View $this */
/** @var app\models\Student $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'мужской' => 'Мужской', 'женский' => 'Женский', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_native_lang')->dropDownList(ArrayHelper::map(Language::find()->all(), 'id', 'name'), ['prompt' => '']) ?>

    <?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about')->widget(Pell::className(), [])->label('О себе') ?></br>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
