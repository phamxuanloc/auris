<?php

namespace app\controllers;

use app\models\TreatmentHistory;
use app\sse\MessageEventHandler;
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
class VoteController extends Controller {

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
			//			'role'  => [
			//				'class'   => RoleFilter::className(),
			//				'name'    => 'Trang chủ',
			//				'actions' => [
			//					'index' => 'Trang bầu chọn',
			//				],
			//			],
		];
	}

	public function actionRealtime() {
		$sse = Yii::$app->sse;
		//		$sse->exec_limit = 300;
		$sse->addEventListener('message', new MessageEventHandler());
		$sse->start();
	}

	public function actionIndex() {
		$this->layout = 'vote';
		return $this->render('index');
	}

	public function actionVote() {
		$this->layout = 'vote';
		$check        = 1;
		if($_POST['id'] != null) {
			$history = TreatmentHistory::findOne($_POST['id']);
			if($history) {
				if($_POST['type'] == TreatmentHistory::ATT_POINT) {
					$history->updateAttributes(['att_point' => $_POST['point']]);
				} elseif($_POST['type'] == TreatmentHistory::SPECT_POINT) {
					$history->updateAttributes(['spect_point' => $_POST['point']]);
				} else {
					$history->updateAttributes(['ae_point' => $_POST['point']]);
					$check = 0;
				}
			}
		}
		return $check;
	}

	public function actionThanks() {
		$this->layout = 'vote';
		return $this->render('thanks');
	}
}
