<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $username
 * @property int $user_id
 * @property int $treatment_schedule_id
 * @property string $message
 * @property string $created_at
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'user_id', 'treatment_schedule_id'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'username' => 'Username',
            'user_id' => 'User ID',
            'treatment_schedule_id' => 'Treatment Schedule ID',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }
}
