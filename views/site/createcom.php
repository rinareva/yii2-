<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */

$this->title = 'Create Comment';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!-- <?= $form->field($model, 'id_tutor')->textInput() ?>

<?= $form->field($model, 'id_student')->textInput() ?> -->
</br>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
