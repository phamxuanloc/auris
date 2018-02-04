<?php

namespace app\controllers;

use app\editable\EditableController;
use navatech\role\filters\RoleFilter;
use Yii;
use app\models\ScheduleAdvisory;
use app\models\ScheduleAdvisorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2mod\editable\EditableAction;

/**
 * ScheduleAdvisoryController implements the CRUD actions for ScheduleAdvisory model.
 */
class ScheduleAdvisoryController extends EditableController {

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
				'name'    => 'Quản lý lịch hẹn tư vấn mới',
				'actions' => [
					'index'    => 'Danh sách lịch hẹn tư vẫn',
					'create'   => 'Thêm mới',
					'update'   => 'Cập nhật lịch hẹn tư vấn',
					'delete'   => 'Xóa lịch',
					'view-all' => 'Xem tất cả',
				],
			],
		];
	}

	/**
	 * Lists all ScheduleAdvisory models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new ScheduleAdvisorySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single ScheduleAdvisory model.
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
	 * Creates a new ScheduleAdvisory model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new ScheduleAdvisory();
		if($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing ScheduleAdvisory model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);
		//        $model->ap_date = date('H, d/m/Y', strtotime($model->ap_date));
		//        $model->birthday = date('d/m/Y', strtotime($model->birthday));
		if($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing ScheduleAdvisory model.
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
	 * Finds the ScheduleAdvisory model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return ScheduleAdvisory the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if(($model = ScheduleAdvisory::findOne($id)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
