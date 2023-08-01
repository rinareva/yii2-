<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use coderius\pell\Pell;
use yii\helpers\ArrayHelper;
use app\models\Language;

/** @var yii\web\View $this */
/** @var app\models\Anketa $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'Моя анкета';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="anketa-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'place')->label('Местоположение') ?>
    <?= $form->field($model, 'experience')->textArea(['rows' => 2])->label('Опыт работы') ?>
    <?= $form->field($model, 'education')->textArea(['rows' => 3])->label('Образование') ?>
    <?= $form->field($model, 'id_lang')->dropDownList(ArrayHelper::map(Language::find()->all(), 'id', 'name'), ['prompt' => ''])->label('Язык преподавания') ?>
    <?= $form->field($model, 'about')->widget(Pell::className(), [])->label('О себе') ?>
    <?= $form->field($model, 'type')->dropDownList([ 'Репетитор сообщества' => 'Репетитор сообщества', 'Профессиональный преподаватель' => 'Профессиональный преподаватель' ], ['prompt' => ''])->label('Тип') ?>
    <?= $form->field($model, 'status')?>
</br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
