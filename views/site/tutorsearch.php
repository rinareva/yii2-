<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;


$this->title = 'запрос №1';
?>

<div>
        <h4>Запрос №1</h4>
</div>
<p>Получить перечень и общее число врачей указанного профиля для конкретного медицинского учреждения, 
        больницы, либо поликлиники, либо всех медицинских учреждений города</p>


<div class="item_left">
        <?php $form = ActiveForm::begin(); ?>
                <?=$form->field($model, 'pol')->dropDownList(ArrayHelper::map(Medical::find()->all(), 'id', 'name'))?>
                <?=$form->field($model, 'prof')->dropDownList(ArrayHelper::map(Job::find()->all(), 'id', 'name'))?>
                <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
</div>
<table class="table">
        <tr>
                <th>Специальность</th>
                <th>Количество</th>
        </tr>       
        <?php
        foreach($doc as $doc){
                echo "<tr>
                <td>{$doc->job->name}</td>
                <td>{$doc['col']}</td>
                </tr>";
        }
        ?>
</table>
<?= LinkPager::widget([
        'pagination' => $pagination,
        'prevPageLabel' => false,
        'nextPageLabel' => false,
        'linkOptions' => [
                'class' => 'page-link'
        ],
        ]) ?>
<style>
        .item_left{
                float: left;
                width: 40%;
        }
        
</style>
               
