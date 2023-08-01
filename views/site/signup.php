<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use app\models\Language;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1>Регистрация</h1>
    <?php $form = ActiveForm::begin(); ?>
        <div class="offset col-lg-4">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <!-- <?= $form->field($model, 'language')->dropDownList(ArrayHelper::map(Language::find()->all(), 'id', 'name'), ['prompt' => '']) ?>  -->
                <?= $form->field($model, 'password')->passwordInput() ?>
                <!-- <?= $form->field($model, 'role')->checkbox([
            'template' => "<div class=\" custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?> -->
                <!-- <label>
                    <input type="checkbox" checked id="name" value="TRUE" name="role" /> Я хочу быть репетитором
                </label> -->
        </div>
                <div class="form-group">
                    <div class="offset-lg-0 col-lg-7">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'btn_go']) ?>
                    </div>
                </div>
    <?php ActiveForm::end(); ?>
</div>
