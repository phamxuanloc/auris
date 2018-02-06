<?php

namespace app\models;

use app\components\Model;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "role".
 *
 * @property int    $id
 * @property string $name
 * @property string $permissions
 * @property int    $is_backend_login
 *
 * @property User[] $users
 */
class Role extends Model {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'role';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				[
					'name',
					'permissions',
				],
				'required',
			],
			[
				['permissions'],
				'string',
			],
			[
				['is_backend_login'],
				'integer',
			],
			[
				['name'],
				'string',
				'max' => 255,
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'               => 'ID',
			'name'             => 'Name',
			'permissions'      => 'Permissions',
			'is_backend_login' => 'Is Backend Login',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUsers() {
		return $this->hasMany(User::className(), ['role_id' => 'id']);
	}

	public static function getRoleArray() {
		return ArrayHelper::map(Role::find()->all(), 'id', 'name');
	}
}
