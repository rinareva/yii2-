<?php 

namespace app\modules\admin\controllers;

use app\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

 
class ProfileController extends AppAdminController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update'],
                'rules' => [
                    [
                        'actions' => ['index', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }
 
    public function actionStud()
    {
        return $this->render('stud', [
            'model' => $this->findModel(),
        ]);
    }

    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }

    public function actionUpdate()
    {
        $model = $this->findModel();
        $model->scenario = User::SCENARIO_PROFILE;

        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->img = UploadedFile::getInstance($model, 'img');
            $model->img->saveAs("img/icons/{$model->img->baseName}.{$model->img->extension}");
            
            $model->save(false);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                'model' => $model,
        ]);
    }
}
?>