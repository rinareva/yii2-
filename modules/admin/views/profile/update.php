<?php 

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use coderius\pell\Pell;

$this->title = Yii::t('app', 'Редактирование');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Мой профиль'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
 
<?= $form->field($model, 'name')->label('Имя') ?>
<?= $form->field($model, 'email')->label('Электронная почта') ?>
<!-- <?= $form->field($model, 'password')->label('Пароль') ?> -->
<?= $form->field($model, 'img')->fileInput(['maxlength' => true])->label('Фото профиля') ?>
 
<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
</div>
 
<?php ActiveForm::end(); ?>