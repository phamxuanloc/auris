<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderSearch;
use navatech\role\filters\RoleFilter;
use Yii;
use app\models\Customer;
use app\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class ReportController extends Controller {

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
				'role'    => [
					'class'   => RoleFilter::className(),
					'name'    => 'Báo cáo',
					'actions' => [
						'index' => 'Trang chi tiết báo c',
					],
				],
			],
		];
	}

	/**
	 * Lists all Customer models.
	 * @return mixed
	 */
	public function actionIndex() {
		$model = Order::find()->select("date(created_date) as created_date, count(id) as id, sum(total_price) as total_price, sum(total_payment) as total_payment")->groupBy("date(created_date)")->all();
		return $this->render('index', [
			'model' => $model,
		]);
	}
}
