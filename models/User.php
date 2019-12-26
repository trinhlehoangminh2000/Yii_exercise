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
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 */
class User extends \yii\db\ActiveRecord
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
            [['password'], 'string', 'max' => 16],
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
}



// <?php



// class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
// {



//     /**
//      * {@inheritdoc}
//      */
//     public static function findIdentity($id)
//     {
//         return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public static function findIdentityByAccessToken($token, $type = null)
//     {
//         foreach (self::$users as $user) {
//             if ($user['accessToken'] === $token) {
//                 return new static($user);
//             }
//         }

//         return null;
//     }

//     /**
//      * Finds user by username
//      *
//      * @param string $username
//      * @return static|null
//      */
//     public static function findByUsername($username)
//     {
//         foreach (self::$users as $user) {
//             if (strcasecmp($user['username'], $username) === 0) {
//                 return new static($user);
//             }
//         }

//         return null;
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function getId()
//     {
//         return $this->id;
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function getAuthKey()
//     {
//         return $this->authKey;
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function validateAuthKey($authKey)
//     {
//         return $this->authKey === $authKey;
//     }

//     /**
//      * Validates password
//      *
//      * @param string $password password to validate
//      * @return bool if password provided is valid for current user
//      */
//     public function validatePassword($password)
//     {
//         return $this->password === $password;
//     }
// }
