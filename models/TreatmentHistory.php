<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "treatment_history".
 *
 * @property int      $id
 * @property int      $order_id
 * @property int      $customer_id
 * @property string   $customer_code
 * @property string   $customer_name
 * @property string   $customer_phone
 * @property string   $ap_date
 * @property string   $real_start
 * @property string   $real_end
 * @property int      $att_point
 * @property int      $spect_point
 * @property int      $ae_point
 * @property Customer $customer
 */
class TreatmentHistory extends Model {

    public $start_date, $end_date;

	const VOTE_TYPE   = [
		1 => 'Thái độ phục vụ',
		2 => 'Tính chuyên môn',
		3 => 'Tính thẩm mỹ',
	];

	const ATT_POINT   = 1;

	const SPECT_POINT = 2;

	const AE_POINT    = 3;

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'treatment_history';
	}

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->ap_date = date('Y-m-d H:i', strtotime($this->ap_date));
            return true;
        } else {
            return false;
        }
    }

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[
				[
				    'order_code',
//					'order_id',
//					'customer_id',
				],
				'required',
			],
			[
				[
					'order_id',
					'customer_id',
					'att_point',
					'spect_point',
					'ae_point',
                    'is_finish',
                    'sale_id',
                    'ekip_id',
				],
				'integer',
			],
			[
				[
					'ap_date',
					'real_start',
					'real_end',
                    'start_date',
                    'end_date',
                    'created_date'
				],
				'safe',
			],
			[
				['note'],
				'string',
			],
			[
				[
					'customer_code',
					'customer_name',
					'customer_phone',
					'order_code',
				],
				'string',
				'max' => 255,
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'             => 'ID',
			'order_id'       => 'Mã Đơn Hàng',
			'customer_id'    => 'Customer ID',
			'customer_code'  => 'Mã Khách Hàng',
			'customer_name'  => 'Họ và tên',
			'customer_phone' => 'Số Điện Thoại',
			'ap_date'        => 'Thời Gian Điều Trị',
			'real_start'     => 'Real Start',
			'real_end'       => 'Real End',
			'att_point'      => 'Att Point',
			'spect_point'    => 'Spect Point',
			'ae_point'       => 'Ae Point',
			'order_code'     => 'Mã đơn hàng',
			'note'           => 'Ghi chú',
			'is_finish'           => 'Đợt Điều Trị Cuối Cùng (Khi bạn chọn ô này, Khách Hàng có thể đánh giá Chuyên Môn, Tính Thẩm Mỹ)',
		];
	}

	public function getCustomer() {
		return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
	}

	public function getOrder(){
	    return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
    public function getListOrder()
    {
        $data = Order::find()
            ->select(['order_code as value'])
            ->asArray()
            ->all();
        return $data;
    }
}
