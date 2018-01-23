<?php

namespace app\models;

use app\components\Model;
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
class Order extends Model
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
            [['customer_code', 'customer_name', 'service_id', 'product_id', 'price', 'quantiy', 'total_price', 'total_payment'], 'required'],
            [['customer_id', 'ekip_id', 'sale_id', 'service_id', 'product_id', 'color_id', 'quantiy', 'status', 'type'], 'integer'],
            [['price', 'total_price', 'total_payment', 'debt'], 'number'],
            [['note'], 'string'],
            [['created_date'], 'safe'],
            [['customer_code', 'customer_name', 'customer_phone', 'order_code'], 'string', 'max' => 255],
        ];
    }

    public function getEkip()
    {
        return $this->hasOne(Ekip::className(), ['id' => 'ekip_id']);
    }
    public function getSale()
    {
        return $this->hasOne(User::className(), ['id' => 'sale_id']);
    }
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }
    public function getTreatmentHistory()
    {
        return $this->hasMany(TreatmentHistory::className(), ['order_id' => 'id']);
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
            'type' => 'Tình trạng',
            'total_payment' => 'Tổng thanh toán',
            'debt' => 'Còn nợ',
            'note' => 'Ghi chú',
            'order_code' => 'Mã đơn hàng',
            'created_date' => 'Ngày tạo',
        ];
    }

    public function getQuantity()
    {
        return [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
            '21' => '21',
            '22' => '22',
            '23' => '23',
            '24' => '24',
            '25' => '25',
            '26' => '26',
        ];
    }
}
