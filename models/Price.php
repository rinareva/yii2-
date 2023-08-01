<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Price extends ActiveRecord
{
    public function getTutor() 
    {          
        return $this->hasOne(Tutor::class, ['id' => 'id_tutor']);
    }

    public function getCategory() 
    {          
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }
}
?>