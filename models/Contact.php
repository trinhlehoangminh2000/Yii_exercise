<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "contact".
 *
 * @property int $id_contact
 * @property string|null $name
 * @property string|null $email
 * @property string|null $subject
 * @property string|null $sub_category_subject
 * @property int|null $created_at
 * @property string|null $message
 */
class Contact extends \yii\db\ActiveRecord
{
    public $verifyCode;
    public $updated_at;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
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
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'sub_category_subject','message'], 'required'],
            [['created_at'], 'integer'],
            [['message'], 'string'],
            [['name', 'email', 'subject', 'sub_category_subject'], 'string', 'max' => 50],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_contact' => 'Id Contact',
            'name' => 'Full Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'sub_category_subject' => 'Subject details',
            'created_at' => 'Created At',
            'message' => 'Message',
            'verifyCode' => 'Verification Code',
        ];
    }
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom('trinhm800@gmail.com')
                //->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->message)
                ->send();

            return true;
        }
        return false;
    }

    public static function getSubSubject($id_subject)
    {
        return [
            ['id' => '1', 'name' => "subject " . $id_subject." sub 1"],
            ['id' => '2', 'name' => "subject " . $id_subject." sub 2"]
        ];
    }
}
