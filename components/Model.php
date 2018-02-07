<?php

namespace app\components;

use app\models\Color;
use app\models\Ekip;
use app\models\Product;
use app\models\Service;
use app\models\User;
use yii\console\Application;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 1/22/2018
 * Time: 12:03 PM
 */
class Model extends ActiveRecord {

	const STATUS = [
		'delete',
		'active',
	];

	public $user;

	const STATUS_DELETE = 0;

	const STATUS_ACTIVE = 1;

	const ROLE_ADMIN    = 1;

	const ROLE_EKIP     = 2;

	const ROLE_SALE     = 3;

	const ROLE          = [];

	public function getListEkip() {
		return ArrayHelper::map(User::find()->where(['role_id' => $this::ROLE_EKIP])->all(), 'id', 'full_name');
	}

	public function getListDirectSale() {
		return ArrayHelper::map(User::find()->where(['role_id' => $this::ROLE_SALE])->all(), 'id', 'full_name');
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

	public function __construct($config = []) {
		parent::__construct($config);
		if(!\Yii::$app instanceof Application) {
			$this->user = \Yii::$app->user->identity;
		}
	}

	public function getMonth() {
		return [
			date('Y') . '/01/01' => '01/'.date('Y'),
			date('Y') . '/02/01' => '02/'.date('Y'),
			date('Y') . '/03/01' => '03/'.date('Y'),
			date('Y') . '/04/01' => '04/'.date('Y'),
			date('Y') . '/05/01' => '05/'.date('Y'),
			date('Y') . '/06/01' => '06/'.date('Y'),
			date('Y') . '/07/01' => '07/'.date('Y'),
			date('Y') . '/08/01' => '08/'.date('Y'),
			date('Y') . '/09/01' => '09/'.date('Y'),
			date('Y') . '/10/01' => '10/'.date('Y'),
			date('Y') . '/11/01' => '11/'.date('Y'),
			date('Y') . '/12/01' => '12/'.date('Y'),
		];
	}
}