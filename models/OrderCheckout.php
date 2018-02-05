<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_checkout".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $order_id
 * @property string $money
 * @property string $created_date
 * @property string $payment_date
 * @property int $casher
 * @property int $status
 */
class OrderCheckout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_checkout';
    }

//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            for ($i = 0; $i < count($_POST['OrderCheckout']); $i++) {
//                $this->money = preg_replace('/\./', '', $_POST['OrderCheckout'][$i]['money']);
//            }
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function afterFind()
    {
        $this->money = number_format($this->money, 0, ',', '.');
        parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['customer_id', 'order_id', 'money'], 'required'],
            [['customer_id', 'order_id', 'casher', 'status', 'cash_type'], 'integer'],
//            [['money'], 'number'],
            [['created_date', 'payment_date'], 'safe'],
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
            'order_id' => 'Order ID',
            'money' => 'Money',
            'created_date' => 'Created Date',
            'payment_date' => 'Payment Date',
            'casher' => 'Casher',
            'status' => 'Status',
        ];
    }
}
