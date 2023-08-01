<?php

namespace app\models;
use Yii;

class Anketa extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'anketa';
    }

    public function getLang()
    {
        return $this->hasOne(Language::class, ['id' => 'id_lang']);
    }

    public function getTutorr()
    {
        return $this->hasOne(Tutor::class, ['id' => 'id_tutor']);
    }

    public function rules()
    {
        return [
            [['id_tutor', 'id_lang'], 'integer'],
            [['avg_raiting'], 'required'],
            [['type'], 'string'],
            [['price'], 'number'],
            [['place', 'about', 'experience', 'education'], 'string', 'max' => 255],
            [['id_lang'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['id_lang' => 'id']],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::class, 'targetAttribute' => ['id_tutor' => 'id']],
        ];
    }
    
    public $rait, $image, $abc, $avg_raiting;
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tutor' => 'Репетитор',
            'place' => 'Местоположение',
            'about' => 'О себе',
            'experience' => 'Опыт',
            'education' => 'Образование',
            'type' => 'Тип',
            'id_lang' => 'Язык преподавания',
            'price' => 'Цена пробного урока',
            'category' => 'Категория урока',
            'status' => 'Статус',
        ];
    }
}
