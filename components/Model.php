<?php

namespace app\components;

use app\models\Color;
use app\models\Ekip;
use app\models\Product;
use app\models\Service;
use app\models\User;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 1/22/2018
 * Time: 12:03 PM
 */
class Model extends ActiveRecord {

	const STATUS        = [
		'delete',
		'active',
	];

	const STATUS_DELETE = 0;

	const STATUS_ACTIVE = 1;

	const ROLE_ADMIN    = 1;

	const ROLE          = [];


	public function getListEkip() {
		return ArrayHelper::map(Ekip::find()->all(), 'id', 'ekip_name');
	}

	public function getListDirectSale() {
		return ArrayHelper::map(User::find()->all(), 'id', 'username');
	}

	public function getListService() {
		return ArrayHelper::map(Service::find()->where(['status' => Model::STATUS_ACTIVE])->all(), 'id', 'name');
	}

	public function getListProduct() {
		return ArrayHelper::map(Product::find()->where(['status' => Model::STATUS_ACTIVE])->all(), 'id', 'name');
	}

	public function getListColor() {
		return ArrayHelper::map(Color::find()->where(['status' => Model::STATUS_ACTIVE])->all(), 'id', 'name');
	}
}