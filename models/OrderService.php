<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_service".
 *
 * @property int $id
 * @property int $order_id
 * @property int $service_id
 * @property int $product_id
 * @property int $color_id
 * @property string $price
 * @property int $quantity
 * @property string $total_price
 */
class OrderService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_service';
    }

//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            if(isset($_POST['OrderService'])) {
//                $this->price = preg_replace('/\./', '', $_POST['OrderService']['price']);
//            }
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function afterFind()
    {
        $this->price = number_format($this->price, 0,',', '.');
        parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'service_id', 'product_id', 'color_id', 'quantity'], 'integer'],
            [['total_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'service_id' => 'Service ID',
            'product_id' => 'Product ID',
            'color_id' => 'Color ID',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'total_price' => 'Total Price',
        ];
    }
}
