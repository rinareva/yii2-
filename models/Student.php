<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property int|null $age
 * @property string|null $gender
 * @property string|null $place
 * @property int|null $id_native_lang
 * @property string|null $nationality
 * @property string|null $about
 * @property string $email
 * @property string $password
 * @property string|null $auth_key
 * @property string|null $img
 * @property int|null $id_user
 *
 * @property Comment[] $comments
 * @property Event[] $events
 * @property LanguageStudent[] $languageStudents
 * @property Language $nativeLang
 * @property User $user
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['age', 'id_native_lang', 'id_user'], 'integer'],
            [['gender'], 'string'],
            [['name', 'nationality'], 'string', 'max' => 30],
            [['place', 'email'], 'string', 'max' => 50],
            [['about'], 'string', 'max' => 255],
            [['id_native_lang'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['id_native_lang' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'place' => 'Местоположение',
            'id_native_lang' => 'Язык изучения',
            'nationality' => 'Национальность',
            'about' => 'О себе',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_student' => 'id']);
    }

    /**
     * Gets query for [[Events]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::class, ['id_student' => 'id']);
    }

    /**
     * Gets query for [[LanguageStudents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageStudents()
    {
        return $this->hasMany(LanguageStudent::class, ['id_student' => 'id']);
    }

    /**
     * Gets query for [[NativeLang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Language::class, ['id' => 'id_native_lang']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
