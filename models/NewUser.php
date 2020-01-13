<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class NewUser extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 16],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
    public static function findIdentity($id)
    {
        return self::find()->where(['id_user'=>$id])->one();
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token'=>$token]);
    }
    public function getId()
    {
        return $this->id_user;
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    public static function findByUsername($username)
    {
        return self::findOne([
            'username' => $username,
            'status'=>1
            ]
        );
    }

    public function validatePassword($passwordOnForm){
        return Yii::$app->getSecurity()->validatePassword($passwordOnForm, $this->password);
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['created_by' => 'id_user']);
    }


}



