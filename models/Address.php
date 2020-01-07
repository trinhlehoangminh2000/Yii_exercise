<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "address".
 *
 * @property int $id_address
 * @property string $street
 * @property string|null $number
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $user_id
 *
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['street'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'integer'],
            [['street'], 'string', 'max' => 50],
            [['number', 'zip'], 'string', 'max' => 10],
            [['city'], 'string', 'max' => 30],
            [['country'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public function attributeLabels()
    {
        return [
            'id_address' => 'Id Address',
            'street' => 'Street',
            'number' => 'Number',
            'city' => 'City',
            'zip' => 'Zip',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'user_id']);
    }
}
