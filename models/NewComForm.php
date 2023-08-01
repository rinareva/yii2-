<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class NewComForm extends Model
{
    public $name, $rating, $id_tutor, $id_student;
 
    public function attributeLabels()
    {
        return [
            'name'=>'com',
            'rating' => ' ',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'rating', 'id_tutor', 'id_student'], 'required'],
        ];
    }

}