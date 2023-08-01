<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Tutor extends ActiveRecord
{
    public static function tableName()
    {
        return 'tutor';
    }

    public $language;
    public $category;
    public $country;
    public $info;
    public $money;
    public $tutor;
    public $name;

    public function attributeLabels(){
        return[
            'languag' => 'Язык',
            'category' => 'Категория урока',
            'country' => 'Репетитор из',
            'info' => 'Информация',
            'money' => 'Стоимость урока',
            'money2' => 'до',
            'name' => 'Имя',
            'email' => '',
            'place' => '',
            'about' => '',
            'type' => '',
        ];
    }

    // public function getImage()
    // {
    //     return ($this->img) ?   'assets/img/icons/' . $this->img  : '/text.png';
    // }

    // public function rules(){
    //     return [
    //         [['languag', 'category', 'country', 'info', 'money', 'money2'], 'required', 'message' => 'Не заполнено поле']
            
    //     ];
    // }

    public function getLang() 
    {          
        return $this->hasOne(Language::class, ['id' => 'id_native_lang']);
    }

    public function getUser() 
    {          
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public function getPric() 
    {          
        return $this->hasOne(Price::class, ['id' => 'id_price']);
    }

    public function getComment() 
    {          
        return $this->hasMany(Comment::class, ['id_tutor' => 'id']);
    }
    
}
?>