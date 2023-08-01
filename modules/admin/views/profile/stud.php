<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\modules\user\models\User;
use kartik\tabs\TabsX;
use kartik\icons\FontAwesomeAsset;

$this->title = Yii::t('app', 'Мой профиль');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
<!-- <h1><?= Html::encode($this->title) ?></h1> -->

<?php echo Html::a("редактировать профиль",["update"],['class' => 'btn btn-secondary btn-sm']); ?> 

<?php echo Html::a("мои занятия",["/site/stud"],['class' => 'btn btn-secondary btn-sm']); ?>

<?php echo Html::a("информация",["/student/index"],['class' => 'btn btn-secondary btn-sm']); ?></br>
</br>
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email',
            [
                'attribute'=>'img',
                'value'=> Yii::$app->homeUrl.'/assets/img/icons/'.$model->img,
                'format' => ['image',['width'=>'200', 'style' => 'border-radius: 10%;']],
            ],
            
        ],
    ])?>


