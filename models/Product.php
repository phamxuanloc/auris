<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int     $id
 * @property int     $service_id
 * @property string  $name
 * @property int     $status
 * @property string  $price
 * @property Service $service
 */
class Product extends Model {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'product';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[
				[
					'service_id',
					'name',
				],
				'required',
			],
			[
				[
					'service_id',
					'status',
				],
				'integer',
			],
			[
				['price'],
				'number',
			],
			[
				['name'],
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
			'id'         => 'ID',
			'service_id' => 'Dịch vụ',
			'name'       => 'Tên sản phẩm',
			'status'     => 'Trạng thái',
			'price'      => 'Đơn giá',
		];
	}

	public function getService() {
		return $this->hasOne(Service::className(), ['id' => 'service_id']);
	}

    public static function getListShop($district){
        $data = Product::find()->where(['service_id'=>$district])
            ->select(['id', 'name'])->asArray()->all();
        if(count($data)>0){
            return $data;
        }
        return null;
    }
}
