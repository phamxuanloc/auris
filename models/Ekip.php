<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "ekip".
 *
 * @property int    $id
 * @property string $ekip_name
 * @property int    $status
 * @property string $created_date
 * @property int    $created_user
 * @property string $update_date
 * @property int    $update_user
 * @property string $end_date
 */
class Ekip extends Model {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'ekip';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[
				['ekip_name'],
				'required',
			],
			[
				[
					'status',
					'created_user',
					'update_user',
				],
				'integer',
			],
			[
				[
					'created_date',
					'update_date',
					'end_date',
				],
				'safe',
			],
			[
				['ekip_name'],
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
			'id'           => 'ID',
			'ekip_name'    => 'Tên ekip',
			'status'       => 'Status',
			'created_date' => 'Ngày tạo',
			'created_user' => 'Created User',
			'update_date'  => 'Update Date',
			'update_user'  => 'Update User',
			'end_date'     => 'Ngày hủy',
		];
	}
}
