<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $role = true;
    public $language;

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'role' => 'Я хочу быть репетитором',
            'language' => 'Язык преподавания'
        ];
    }

    public function rules()
    {
        return [
            //[['email', 'password'], 'required', 'except' => self::SCENARIO_PROFILE],
            [['active', 'is_email'], 'integer'],
            [['email', 'password', 'name', 'auth_key', 'code'], 'string', 'max' => 255],
            //[['name', 'auth_key', 'code', 'active', 'is_email'], 'safe'],
            //['email', 'email', 'except' => self::SCENARIO_PROFILE],
            //['email', 'unique', 'targetClass' => self::className(), 'except' => self::SCENARIO_PROFILE],
            //['email', 'string', 'max' => 255, 'except' => self::SCENARIO_PROFILE],
            ['role', 'boolean'],
            //проверка на уникальность
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'Данная почта уже используется'],
            //Имя класса ActiveRecord, который следует использовать для проверки уникальности текущего значения атрибута
        ];
    }
}
