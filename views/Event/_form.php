<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\MaskedInput;
use kartik\datetime\DateTimePicker;
use app\models\Category;
use yii\helpers\ArrayHelper;
use app\models\Event;


?>

<div class="event-form">
    

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->textArea(['rows' => 5]) ?>

    <!-- <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(Event::find()->all(), 'id', 'status'), ['prompt' => '']) ?>

    <?= $form->field($model, 'text')?> -->

    <!-- <?= $form->field($model, 'date')->widget(
        MaskedInput::class, [
            'mask' => "y-2-1 h:s",
            'clientOptions' => [
                'alias' => 'datetime',
                "placeholder" => "yyyy-mm-dd hh:mm",
                "separator" => "-"
            ]]) ?> -->

    

<?= $form->field($model, 'date')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'yyyy-mm-dd hh:mm'],
    'pluginOptions' => [
        'autoclose' => true,
        'daysOfWeekDisabled' => '0,6',
        'hoursDisabled' => '0,1,2,3,4,5,6,7,8,19,20,21,22',
        'minutesDisabled' => '5,10,15,20,25,35,40,45,50,55'
    ]
]);
?></br>

    <div class="form-group">
        <?= Html::submitButton('Записаться', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
        .event-form{
                float: left;
                width: 40%;
        } 
</style>
