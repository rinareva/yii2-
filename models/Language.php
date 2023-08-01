<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Language extends ActiveRecord
{
    public function getTutor() 
    {         
        return $this->hasMany(Tutor::class, ['id_native_lang' => 'id']);
    }

    public function getStudent() 
    {         
        return $this->hasMany(Student::class, ['id_native_lang' => 'id']);
    }
}
?>