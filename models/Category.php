<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public $category;

    public function attributeLabels(){
        return[
            'category' => 'Категория урока',
            'money' => 'Стоимость урока',
            'money2' => 'Стоимость урока'
        ];
    }

    public function getPrice() 
    {          
        return $this->hasMany(Price::class, ['id_category' => 'id']);
    }
}
?>