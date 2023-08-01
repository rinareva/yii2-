<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Tutor;
use app\models\Language;
use app\models\Price;
use app\models\Category;
use kartik\touchspin\TouchSpin;
use yii\widgets\ActiveField;
use yii\widgets\MaskedInput;

?>

<div class="tutor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            // класс формы
            'class' => 'form-horizontal',
            // возможность загрузки файлов
            //'enctype' => 'multipart/form-data'
        ],
        // 'fieldConfig' => [
        //     'template' => '{label}<div class="col-sm-13">{input}</div><div class="col-sm-5">{error}</div>',
        //     'labelOptions' => ['class' => 'col-sm-5 control-label'],
        // ],
    ]); ?>

    <?= $form->field($model, 'id_native_lang')->dropDownList(ArrayHelper::map(Language::find()->all(), 'id', 'name'), ['prompt' => ''])->label('Выбрать язык');?>

    <?=$form->field($model, 'category')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), ['prompt' => ''])?>

    <?=$form->field($model, 'country')->dropDownList(ArrayHelper::map(Tutor::find()->all(), 'id', 'place'), ['prompt' => ''])?>

    <?= $form->field($model, 'type')->dropDownList([ 'Профессиональный преподаватель' => 'Профессиональный преподаватель', 'Репетитор сообщества' => 'Репетитор сообщества', ], ['prompt' => ''])->label('Тип репетитора'); ?>
    
    <!-- <?= $form->field($model, 'money')->dropDownList(ArrayHelper::map(Price::find()->all(), 'id', 'price'), ['prompt' => ''])?> -->
    <?= $form->field($model, 'money')->widget(TouchSpin::classname(), ['options' => ['placeholder' => 'Максимальная цена'],'pluginOptions' => ['prefix' => '₽', 'step' => 50, 'min' => 0, 'max' => 10000,]]);?>

    <!-- <?= $form->field($model, 'money')->widget(TouchSpin::classname(), ['options' => ['placeholder' => 'Максимальная цена'],'pluginOptions' => ['prefix' => '₽', 'step' => 1]]);?> -->

   
    </br>
    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    </div>
    </br>

    <?php ActiveForm::end(); ?>

</div>
<style>
        .tutor-search{
                float: left;
                width: 100%;
        } 
</style>