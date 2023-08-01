<?php

$this->title = 'Tututor';

use kop\y2sp\assets\ScrollPager;
use yii\bootstrap5\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\data\Pagination;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
 <div class="site-index">

<div class="row">
<div class="col-lg-7 col-xxl-5 mx-auto text-center py-7">

  <!-- <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Service</h5>
  <p class="mb-0">We offer youth with chances for career development in their practice. We also support a wide range of services to ensure client satisfaction</p> -->

  <!-- <div class="col-auto mx-1 mt-6">
    <?php echo Html::a("английский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("корейский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("испанский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("японский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("китайский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("французский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("итальянский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("немецкий",["index"],['class' => 'btn btn-secondary btn-sm']); ?>
    <?php echo Html::a("арабский",["index"],['class' => 'btn btn-secondary btn-sm']); ?>

    <?= Html::submitButton('Найти', ['name' => 'language', 'value' => '7', 'class' => 'btn btn-secondary btn-sm']) ?></br>
</br> -->


  </div>
</div>
</div>
  


<div class="row">
  <?php foreach($anketa as $anketa): ?>
    <div class="col-sm-3 mb-3">
    <div class="card card-bg">
    <div class="text-center"><a href="<?=Url::toRoute(['site/tutor', 'id' => $anketa['id']]);?>"></br>
    <?= Html::img(Yii::getAlias('@web').'/assets/img/icons/'.$anketa->tutorr->img, ['alt' => 'image', 'width' => '200', 'style' => 'border-radius: 10%;']);?></a>  
    <div class="card-body">
      <h6 class="fw-bold fs-1"><?php echo $anketa->tutorr->fname ?></h6>
      <p class="card-subtitle mb-2 text-muted"><small class="text-muted"><?php echo $anketa['type'] ?></small></p>
      <h6 class="fw-3 mb-md-0 mb-lg-3"><?php echo $anketa->lang->name ?></h6>
      <p class="card-subtitle mb-2 text-muted"><small class="text-muted">Уроки от</small></p>
      <h4 class="fw-3 mb-md-0 mb-lg-3"><?php echo $anketa['price'] ?></h4> 
      <h5 class="fw-3 mb-md-0 mb-lg-3"> ⭐ <?php echo $anketa->tutorr->avg_raiting ?></h5>
    </div>
    </div>
    </div>
    </div>
  <?php endforeach ?>
</div>

<!-- <?= LinkPager::widget([
    'pagination' => $pages,
    'prevPageLabel' => 'Предыдущая',
    'nextPageLabel' => 'Следующая'
]) ?> -->




<!-- <?= Html::submitButton('Показать еще', ['class' => 'bt_sert']) ?> -->
<?php
	//echo ListView::widget([
		//'dataProvider' => $dataProvider,
		//'itemOptions' => ['class' => 'item'],
		//'itemView' => '_item_view',
		//'pager' => ['class' => \kop\y2sp\ScrollPager::className()]
	//]);

	//echo GridView::widget([
		//'dataProvider' => $dataProvider,
		//'pager' => [
			//'class' => \kop\y2sp\ScrollPager::className(),
			//'container' => '.grid-view tbody',
			//'item' => 'tr',
			//'paginationSelector' => '.grid-view .pagination',
			//'triggerTemplate' => '<tr class="ias-trigger"><td colspan="100%" style="text-align: center"><a style="cursor: pointer">{text}</a></td></tr>',
			//],
	//]);
?>


