<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treatment_history".
 *
 * @property int $id
 * @property int $order_id
 * @property int $customer_id
 * @property string $customer_code
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $ap_date
 * @property string $real_start
 * @property string $real_end
 * @property int $att_point
 * @property int $spect_point
 * @property int $ae_point
 */
class TreatmentHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'customer_id'], 'required'],
            [['order_id', 'customer_id', 'att_point', 'spect_point', 'ae_point'], 'integer'],
            [['ap_date', 'real_start', 'real_end'], 'safe'],
            [['note'], 'string'],
            [['customer_code', 'customer_name', 'customer_phone', 'order_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Mã Đơn Hàng',
            'customer_id' => 'Customer ID',
            'customer_code' => 'Mã Khách Hàng',
            'customer_name' => 'Họ và tên',
            'customer_phone' => 'Số Điện Thoại',
            'ap_date' => 'Thời Gian Điều Trị',
            'real_start' => 'Real Start',
            'real_end' => 'Real End',
            'att_point' => 'Att Point',
            'spect_point' => 'Spect Point',
            'ae_point' => 'Ae Point',
            'order_code' => 'Mã đơn hàng',
            'note' => 'Ghi chú'
        ];
    }
}
