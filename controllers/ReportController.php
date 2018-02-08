<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderCheckout;
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
			],
            'role'    => [
                'class'   => RoleFilter::className(),
                'name'    => 'Báo cáo',
                'actions' => [
                    'index' => 'Trang chi tiết báo chi tiết',
                ],
            ],
		];
	}

	/**
	 * Lists all Customer models.
	 * @return mixed
	 */
	public function actionIndex() {
	    $modelSearch = new Order();
		$model = Order::find()->select("date(created_date) as created_date, count(id) as id, sum(total_price) as total_price, sum(total_payment) as total_payment");

		$reportProvince = Order::find();
        $reportProvince->select('count(*) as id, region_name');
        $reportProvince->joinWith('customerRegion');
        $reportProvince->groupBy('customer.region_id');

        $reportSex = Order::find();
        $reportSex->select('count(*) as id, sex');
        $reportSex->joinWith('customer');
        $reportSex->groupBy('customer.sex');

        $reportPayment = OrderCheckout::find();
        $reportPayment->select('count(*) as id, cash_type');

        if(isset($_GET['Order']['start_date']) && $_GET['Order']['start_date'] != ""){
            $start_date = $_GET['Order']['start_date'];
            $start_date = \DateTime::createFromFormat('d/m/Y', $start_date);
            $start_date = $start_date->format('Y-m-d');
            $model->andFilterWhere(['>=', 'DATE(created_date)', $start_date]);
            $modelSearch->start_date = $_GET['Order']['start_date'];
        }
        if(isset($_GET['Order']['end_date']) && $_GET['Order']['end_date'] != ""){
            $end_date = $_GET['Order']['end_date'];
            $end_date = \DateTime::createFromFormat('d/m/Y', $end_date);
            $end_date = $end_date->format('Y-m-d');
            $model->andFilterWhere(['<=', 'DATE(created_date)', $end_date]);
            $modelSearch->end_date = $_GET['Order']['end_date'];
        }

        $reportProvince = $reportProvince->all();
        $reportSex = $reportSex->all();
        $reportPayment = $reportPayment->all();

        $model = $model->orderBy("created_date DESC")->groupBy("date(created_date)");
        $model = $model->all();
		return $this->render('index', [
			'model' => $model,
			'modelSearch' => $modelSearch,
			'reportProvince' => $reportProvince,
			'reportSex' => $reportSex,
			'reportPayment' => $reportPayment,
		]);
	}
}
