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

<?php echo Html::a("моя анкета",["/anketa/index"],['class' => 'btn btn-secondary btn-sm']); ?> 

<?php echo Html::a("мои ученики",["/event/index"],['class' => 'btn btn-secondary btn-sm']); ?></br>
</br>
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email',
            //'img',
            // [
            //     'attribute'=>'img',
            //     'value' => Html::img(Yii::getAlias('@web').'/assets/img/icons/'.$anketa->tutorr->img,['width'=>'100','height'=>'100']),
            //     'format' => ['image', ['width'=>100, 'height'=>100]]
            // ],
            [
                'attribute'=>'img',
                'value'=> Yii::$app->homeUrl.'/assets/img/icons/'.$model->img,
                'format' => ['image',['width'=>'200', 'style' => 'border-radius: 10%;']],
            ],
            
        ],
    ])?>



    </br>

<!-- <?php echo TabsX::widget([
    'position'=>TabsX::POS_LEFT,
    'encodeLabels'=>false,
    'enableStickyTabs' => true,
    'items' => [
        [
            'label' => '<i class="fas fa-user"></i> Profile',
            'content' => DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'email',
                    'place',
                    'about',
                    'type',
                    [
                        'attribute'=>'img',
                        'value'=>'img/icons/'.$model->img,
                        'format'=>['image', ['width'=>100, 'height'=>100]]
                    ],
                ],
            ]),
            'active' => true
        ],
        [
            'label' => '<i class="fas fa-edit"></i> Edit Profile',
            'content' => 'Anim pariatur cliche...',
            'headerOptions' => ['style'=>'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ],
        [
            'label' => '<i class="fas fa-users"></i> My student',
            'content' => 'Anim pariatur cliche...',
            'headerOptions' => ['style'=>'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ],
    ],
]);?>
</div>
 -->
