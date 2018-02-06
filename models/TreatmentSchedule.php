<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "treatment_schedule".
 *
 * @property int $id
 * @property int $order_id
 * @property string $order_code
 * @property int $customer_id
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $treatment_time
 * @property string $note
 * @property int $is_finish
 */
class TreatmentSchedule extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'customer_id', 'is_finish'], 'integer'],
            [['treatment_time'], 'safe'],
            [['note'], 'string'],
            [['order_code', 'customer_name', 'customer_phone', 'customer_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'order_code' => 'Mã Đơn Hàng',
            'customer_id' => 'Mã Khách Hàng',
            'customer_code' => 'Mã Khách Hàng',
            'customer_name' => 'Họ và tên',
            'customer_phone' => 'Số Điện Thoại',
            'treatment_time' => 'Thời Gian Điều Trị',
            'note' => 'Ghi Chú',
            'is_finish' => 'Is Finish',
        ];
    }
}
