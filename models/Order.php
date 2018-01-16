<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $customer_code
 * @property string $customer_name
 * @property string $customer_phone
 * @property int $ekip_id
 * @property int $sale_id
 * @property int $service_id
 * @property int $product_id
 * @property int $color_id
 * @property string $price
 * @property int $quantiy
 * @property string $total_price
 * @property int $status
 * @property int $type
 * @property string $total_payment
 * @property string $debt
 * @property string $note
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'customer_code', 'customer_name', 'service_id', 'product_id', 'price', 'quantiy', 'total_price', 'type', 'total_payment'], 'required'],
            [['customer_id', 'ekip_id', 'sale_id', 'service_id', 'product_id', 'color_id', 'quantiy', 'status', 'type'], 'integer'],
            [['price', 'total_price', 'total_payment', 'debt'], 'number'],
            [['note'], 'string'],
            [['customer_code', 'customer_name', 'customer_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'customer_code' => 'Mã số KH',
            'customer_name' => 'Họ và tên',
            'customer_phone' => 'Số Điện Thoại',
            'ekip_id' => 'Ekip Phục Vụ',
            'sale_id' => 'Direct Sale',
            'service_id' => 'Loại dịch vụ',
            'product_id' => 'Sản phẩm',
            'color_id' => 'Màu sắc',
            'price' => 'Đơn giá',
            'quantiy' => 'Số lượng',
            'total_price' => 'Thành tiền',
            'status' => 'Trạng thái',
            'type' => 'Type',
            'total_payment' => 'Total Payment',
            'debt' => 'Còn nợ',
            'note' => 'Ghi chú',
        ];
    }

    public function getEkip()
    {
        return ArrayHelper::map(CustomerStatus::find()->all(), 'id', 'name');
    }
}
