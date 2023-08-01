<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\Pagination;
use kop\y2sp\assets\ScrollPager;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Tutor;
use app\models\Language;
use app\models\Price;
use app\models\Category;
use app\models\Comment;
use app\models\Student;
use app\models\SignupForm;
use app\models\User;
use app\models\Anketa;
use app\models\AnketaSearch;
use app\models\SearchStud;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'profile', 'about'],
                'rules' => [
                    [
                        'actions' => ['logout', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main2';
        $query = Anketa::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        
        $anketa = Anketa::find()->all();

        // $model = new Anketa();
        // if (Yii::$app->request->post('submit')==='create_add') {
        //     echo 'hi'; 
        // } else {
        //     echo 'no'; 
        // }

        return $this->render('index',compact('anketa', 'pages'));
    }

    public function actionTutor()
    {
        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $anketa = Anketa::find()->where(['id_tutor' => $_GET['id']])->one();
            $price = Price::find()->where(['id_tutor' => $_GET['id']])->all();
            $com = Comment::find()->where(['id_tutor' => $_GET['id']])->all();
            return $this->render('tutor', compact('anketa','price', 'com'));
        } 
        // $model->id_tutor = $_GET['id'];
        // $model->id_student = Yii::$app->user->id;
        //     if ($model->load($this->request->post()) && $model->validate()) {
        //         $event = New Event();
        //         $event->id_tutor = $_GET['id'];
        //         $event->title = $model->title;
        //         $event->date = $model->date;
        //         $event->description = $model->description;
        //         $event->id_student = Yii::$app->user->id;
        //         $event->save();
        //         return $this->render('tutor', compact('event','model'));
        //     }


        return $this->redirect('index');
    }

    // public function actionCreatecom($id)
    // {
    //     $model = new Comment();
        
    //     if(Yii::$app->request->isPost)
    //     {
    //         $model->load(Yii::$app->request->post());
    //         if($model->saveComment($id))
    //         {
    //             Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
    //             return $this->redirect(['site/view','id'=>$id]);
    //         }
    //     }
    // }
    
    // public function actionProfiletutor()
    // {
    //     if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    //         $tutors = Tutor::find()->where(['id' => $_GET['id']])->one();
    //         return $this->render('profiletutor', compact('tutors'));
    //     } 
    //     return $this->redirect('index');
    // }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    // echo '<pre>'; print_r($model);
    // die;

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            $user = new User();
            $user->name = $model->name;
            $user->email = $model->email;
            $user->password = Yii::$app->security->generatePasswordHash($model->password);
            if ($user->save()){
                Yii::$app->user->login($user);
                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }
    
    public function actionContact()
    {
        $model = new Anketa();

        if ($model->load(Yii::$app->request->post())){
            $query = Anketa::find()
            ->select('anketa.id, anketa.id_lang, tutor.fname as abc, anketa.type, anketa.place, anketa.price, tutor.img as image, tutor.avg_raiting as rait')
            ->joinWith('tutorr');
            if ($model->id_lang){
                $query->andWhere(['anketa.id_lang' => $model->id_lang]);
            }
            if ($model->place){
                $query->andWhere(['anketa.place' => $model->place]);
            }
            if ($model->type){
                $query->andWhere(['anketa.type' => $model->type]);
            }
            if ($model->price){
                $query->andWhere(['<=', 'anketa.price', $model->price]);
            }
            if ($model->avg_raiting){
                if ($model->avg_raiting == 'SORT_ASC'){$s = SORT_ASC;} else {$s = SORT_DESC;}
                $query->orderBy(['tutor.avg_raiting' => $s]);
            }
            
        } else {
            $query = Anketa::find()
            ->select('anketa.id, anketa.id_lang, tutor.fname as abc, anketa.type, anketa.place, anketa.price, tutor.img as image, tutor.avg_raiting as rait')
            ->joinWith('tutorr');
        }

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);
        $anketa = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('contact', compact('model', 'pagination', 'query', 'anketa'));
    }

    public function actionStud()
    {
        $searchModel = new SearchStud();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('stud', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    // public function actionAddtogooglecalendar($id)
    // {
    //     $model = $this->findModel($id);
        
    //     $dt = new \DateTime($model->when_date." ".$model->when_time, new \DateTimeZone("UTC"));
    //     $dt2 = new \DateTime($model->when_date." ".$model->when_time, new \DateTimeZone("UTC"));
    //     $dtend = $dt2->add(new \DateInterval('PT2H'))->format(self::DATETIME_FORMAT);
        
    //     $dt->createFromFormat('Y-m-d H:i:s', $model->when_date." ".$model->when_time);
    //     $dtstart = $dt->format(self::DATETIME_FORMAT);
        
        
    //     $text = $model->who."__".$model->what;
    //     $dates = $dtstart."/".$dtend;
    //     $location = $model->where;
    //     $details = $model->clubName."\n\r".$model->link;
        
    //     return $this->redirect('https://calendar.google.com/calendar/r/eventedit?' . http_build_query(['text' => $text, 'dates'=>$dates, 'location'=>$location, 'details'=>$details]));
    // }    

}
