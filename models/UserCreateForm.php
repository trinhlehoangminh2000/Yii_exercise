<?php

namespace app\models;

use Yii;

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
 * @property int|null $address_id
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property Address $address
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
            [['created_at', 'updated_at', 'privilege', 'status', 'address_id'], 'integer'],
            [['username'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 16],
            [['auth_key'], 'string', 'max' => 32],
            //[['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id_address']],
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
            'address_id' => 'Address ID',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id_address' => 'address_id']);
    }
}
