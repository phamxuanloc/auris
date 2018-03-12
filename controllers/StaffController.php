<?php

namespace app\controllers;

use app\models\StaffSearch;
use app\models\User;
use dektrium\user\helpers\Password;
use Yii;
use app\models\DirectSale;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DirectSaleController implements the CRUD actions for DirectSale model.
 */
class StaffController extends Controller {

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all DirectSale models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new StaffSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single DirectSale model.
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
	 * Creates a new DirectSale model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model           = new User();
		$model->scenario = 'create_staff';
		if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = 'json';
			return ActiveForm::validate($model);
		}
		if($model->load(Yii::$app->request->post())) {
			$model->confirmed_at  = time();
			$model->password_hash = Password::hash($model->password_hash);
			if($model->save()) {
				return $this->redirect([
					'index',
				]);
			} else {
				echo '<pre>';
				print_r($model->errors);
				die;
			}
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing DirectSale model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model           = $this->findModel($id);
		$model->scenario = 'update_staff';
		if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = 'json';
			return ActiveForm::validate($model);
		}
		$oldPass              = $model->password_hash;
		$model->password_hash = null;
		if($model->load(Yii::$app->request->post())) {
			$model->password_hash != null ? $model->password_hash = Password::hash($model->password_hash) : $model->password_hash = $oldPass;
			$model->save();
			return $this->redirect([
				'index',
			]);
		}
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing DirectSale model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->updateAttributes(['role_id' => 8]);
		return $this->redirect(['index']);
	}

	/**
	 * Finds the DirectSale model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return User the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if(($model = User::findOne($id)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
