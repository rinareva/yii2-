<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;


use kartik\rating\StarRating;



/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textArea(['rows' => 5]) ?>

    <!-- <?= $form->field($model, 'id_tutor')?>
    <?= $form->field($model, 'id_student')?> -->

    <?= $form->field($model, 'rating')->widget(StarRating::className(),[
    'name' => 'rating',
    'pluginOptions' => [
        'min' => 0,
        'max' => 5,
        'step' => 0.5,
        'size' => 'lg',
        'starCaptions' => [
            0 => 'Extremely Poor',
            1 => 'Very Poor',
            2 => 'Poor',
            3 => 'Ok',
            4 => 'Good',
            5 => 'Very Good'
        ],
        'starCaptionClasses' => [
            0 => 'text-danger',
            1 => 'text-danger',
            2 => 'text-warning',
            3 => 'text-info',
            4 => 'text-primary',
            5 => 'text-success'
        ],
    ], ])?>
</br>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
        .comment-form{
                float: left;
                width: 40%;
        } 
</style>