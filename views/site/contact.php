<?php

use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Tutor;
use app\models\Language;
use app\models\Price;
use app\models\Category;
use app\models\Anketa;
use kartik\touchspin\TouchSpin;


$this->title = 'Найти репетитора';
?>

<div class="anketa-search">
        <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'id_lang')->dropDownList(ArrayHelper::map(Language::find()->all(), 'id', 'name'), 
                        ['prompt' => ''])->label('Выбрать язык');?>
                <?= $form->field($model, 'place')->dropDownList(ArrayHelper::map(Anketa::find()->all(), 'place', 'place'), 
                        ['prompt' => ''])?>
                <?= $form->field($model, 'type')->dropDownList([
                        'Профессиональный преподаватель' => 'Профессиональный преподаватель', 
                        'Репетитор сообщества' => 'Репетитор сообщества', 
                        ], ['prompt' => ''])->label('Тип репетитора'); ?>
                <?= $form->field($model, 'price')->widget(TouchSpin::classname(), [
                        'options' => ['placeholder' => 'Максимальная цена'],
                        'pluginOptions' => [
                                'prefix' => '₽', 
                                'step' => 50, 
                                'min' => 0, 
                                'max' => 10000,
                                ]]);?>
                <?= $form->field($model, 'avg_raiting')->label('Сортировка по рейтингу')->radioList([ 
                        'SORT_ASC' => 'По возрастанию 🠕', 
                        'SORT_DESC' => 'По убыванию 🠗' 
                        ]);?>
        <div class="form-group">
                <?= Html::submitButton('Найти', ['class' => 'btn btn-outline-secondary']) ?>
        </div></br>
        <?php ActiveForm::end(); ?>
</div> 

</br>


<div class="row">
  <?php foreach($anketa as $anketa): ?>
    <div class="col-sm-3 mb-3">
    <div class="card card-bg"> 
    <div class="text-center"><a href="<?=Url::toRoute(['site/tutor', 'id' => $anketa['id']]);?>"></br>

    <?= Html::img(Yii::getAlias('@web').'/assets/img/icons/'.$anketa->image, ['alt' => 'image', 'width' => '200', 'style' => 'border-radius: 10%;']);?></a>                      
    <div class="card-body">
      <h6 class="fw-bold fs-1"><?php echo $anketa->abc ?></h6>
      <p class="card-subtitle mb-2 text-muted"><small class="text-muted"><?php echo $anketa['type'] ?></small></p>
      <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $anketa->lang->name ?></h6>
      <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Уроки от</small></p>
      <h4 class="fw-3 mb-md-0 mb-lg-3"><?php echo $anketa['price'] ?></h4> 
      <h5 class="fw-3 mb-md-0 mb-lg-3"> ⭐<?php echo $anketa->rait ?></h5>
    </div>
    </div>
    </div>
    </div>
  <?php endforeach ?>
</div>


<?= LinkPager::widget([
        'pagination' => $pagination,
        'prevPageLabel' => false,
        'nextPageLabel' => false,
        'linkOptions' => [
                'class' => 'page-link'
        ],
        ]) ?>
        
<style>
        .anketa-search{
                float: left;
                width: 100%;
        }
        .img_avatar{ 
                border-radius: 50%
        }
</style>