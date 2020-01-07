<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string|null $username
 * @property string|null $password
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $privilege
 * @property int|null $status
 * @property string|null $auth_key
 *
 * @property Address[] $addresses
 * @property Article[] $articles
 * @property Article[] $articles0
 */
class UserCreateForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'privilege', 'status'], 'integer'],
            [['username'], 'string', 'max' => 100],
            [['status'], 'default', 'value' => 1],
            [['password'], 'string', 'max' => 16],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'privilege' => 'Privilege',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['created_by' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles0()
    {
        return $this->hasMany(Article::className(), ['updated_by' => 'id_user']);
    }
}
