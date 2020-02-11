<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'user_original';
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
        return self::findOne()->where(['id_user'=>$id]);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
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
        return self::findOne(['username' => $username]);
    }
    public function validatePAssword($password){
        return password_verify($password, $this->password);
    }
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }


    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['created_by' => 'id_user']);
    }


}


