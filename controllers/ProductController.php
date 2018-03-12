<?php

namespace app\controllers;

use app\components\Model;
use app\models\Service;
use navatech\role\filters\RoleFilter;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

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
				'name'    => 'Quản lý sản phẩm',
				'actions' => [
					'index'  => 'Danh sách',
					'create' => 'Thêm mới',
					'update' => 'Cập nhật',
				],
			],
		];
	}

	/**
	 * Lists all Product models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel   = new ProductSearch();
		$dataProvider  = $searchModel->search(Yii::$app->request->queryParams);
		$service       = $searchModel->getListService();
		$model         = new Product();
		$model->status = Model::STATUS_ACTIVE;
		if($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect([
				'index',
			]);
		}
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
			'service'      => $service,
			'model'        => $model,
		]);
	}

	/**
	 * Displays a single Product model.
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
	 * Creates a new Product model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Product();
		if($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect([
				'index',
			]);
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Product model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);
		if($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect([
				'index',
			]);
		}
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Product model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->updateAttributes(['status' => Model::STATUS_DELETE]);
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Product model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Product the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if(($model = Product::findOne($id)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
