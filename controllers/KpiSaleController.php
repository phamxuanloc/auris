<?php

namespace app\controllers;

use navatech\role\filters\RoleFilter;
use Yii;
use app\models\KpiSale;
use app\models\KpiSaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KpiSaleController implements the CRUD actions for KpiSale model.
 */
class KpiSaleController extends Controller {

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
			'role'  => [
				'class'   => RoleFilter::className(),
				'name'    => 'Quản lý KPI sale',
				'actions' => [
					'index'    => 'Danh sách',
					'create'   => 'Thêm mới',
					'update'   => 'Cập nhật',
					'delete'   => 'Xoá',
					'view-all' => 'Xem tất cả',
				],
			],
		];
	}

	public function actionViewAll() {
		return true;
	}

	/**
	 * Lists all KpiSale models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new KpiSaleSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single KpiSale model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new KpiSale model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new KpiSale();
		if($model->load(Yii::$app->request->post())) {
            $kpiSale = KpiSale::find()->where("sale_id = $model->sale_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
            if($kpiSale){
                $kpiSale->load(Yii::$app->request->post());
                if($kpiSale->save()) {
                    return $this->redirect(['index']);
                }
            }else {
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing KpiSale model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);
		if($model->load(Yii::$app->request->post())) {
			if($model->save()) {
				return $this->redirect(['index']);
			}
		}
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing KpiSale model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the KpiSale model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return KpiSale the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if(($model = KpiSale::findOne($id)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
