<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const SCENARIO_PROFILE = 'profile';
    
    public $model;

    public function rules()
    {
        return [
            ['email', 'required', 'except' => self::SCENARIO_PROFILE],
            ['email', 'email', 'except' => self::SCENARIO_PROFILE],
            ['email', 'unique', 'targetClass' => self::className(), 'except' => self::SCENARIO_PROFILE],
            ['email', 'string', 'max' => 255, 'except' => self::SCENARIO_PROFILE],
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['name', 'email'],
            self::SCENARIO_PROFILE => ['email', 'name', 'place', 'about', 'type', 'language'],
        ];
    }

    public function sendConfirmationLink()
    {
        $conform = Url::to(['site/confirmemail', 'email' =>  $this->email, 'code' => $this->code]);
        $confirmLink = html::a('Подтвердите email', $conform);

        $sending = Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('Подтвердите email')
            ->setHtmlBody('<p>Для прохождения регистрации Вам необходимо подвердить свой email</p>
            <p>'.$confirmLink .'</p>')
            ->send();
        return $sending;
        
    }

    public static function tableName()
    {
        //return 'tutor';
        // if(isset($_POST['role'])){
        return 'user';
        // } else {
        //return 'student';
        // } 
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getId()
    {
        return $this->id;
    }
    
    public static function findByUsername($name)
    {
        return static::findOne(['name' => $name]);
    }


    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function generateAuthKey()
    {
        //метод generateAuthKey генерирует случайную строку 
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        $hash = $this->password;
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
    }

    public function getTutor() 
    {          
        return $this->hasMany(Tutor::class, ['id_user' => 'id']);
    }
}
