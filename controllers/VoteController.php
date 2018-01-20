<?php

namespace app\controllers;

use app\models\TreatmentHistory;
use app\sse\MessageEventHandler;
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
		];
	}

	public function actionRealtime() {
		$sse = Yii::$app->sse;
		$sse->addEventListener('message', new MessageEventHandler());
		$sse->start();
	}

	public function actionIndex() {
		$this->layout = 'vote';
		return $this->render('index');
	}

	public function actionVote() {
		if($_POST['id'] != null) {
			$history = TreatmentHistory::findOne($_POST['id']);
			if($history) {
				if($_POST['type'] == TreatmentHistory::ATT_POINT) {
					$history->updateAttributes(['att_point' => $_POST['point']]);
				} elseif($_POST['type'] == TreatmentHistory::SPECT_POINT) {
					$history->updateAttributes(['spect_point' => $_POST['point']]);
				} else {
					$history->updateAttributes(['ae_point' => $_POST['point']]);
				}
			}
		}
		return true;
	}
}
