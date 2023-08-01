<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $id_tutor
 * @property int $id_student
 * @property string $date
 *
 * @property Student $student
 * @property Tutor $tutor
 */
class Event extends \yii\db\ActiveRecord
{
    const STATUS_EVENT_YES = 1;
    const STATUS_EVENT_NO = 0;

    public static function tableName()
    {
        return 'event';
    }

    public static $nameStatus = [
        self::STATUS_EVENT_YES => 'yes',
        self::STATUS_EVENT_NO => 'no'
    ];

    public function rules()
    {
        return [
            [['title', 'description', 'id_tutor', 'id_student', 'date'], 'required'],
            [['id_tutor', 'id_student'], 'integer'],
            [['date',  'dateFormat' => 'dd.MM.yyyy',], 'safe',],
            [['title', 'description'], 'string', 'max' => 255],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['id_student' => 'id']],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::class, 'targetAttribute' => ['id_tutor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название урока',
            'description' => 'Описание',
            'id_tutor' => 'Репетитор',
            'id_student' => 'Студент',
            'date' => 'Дата урока',
            'text' => 'Ссылка',
            'status' => 'Статус'
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'id_student']);
    }

    /**
     * Gets query for [[Tutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutorr()
    {
        return $this->hasOne(Tutor::class, ['id' => 'id_tutor']);
    }
}
