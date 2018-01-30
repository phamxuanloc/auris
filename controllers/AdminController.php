<?php
/**
 * @project ordermana
 * @author  LocPX
 * @email   loc.xuanphama1t1[at]gmail.com
 * @date    11/29/2016
 * @time    11:13 PM
 */
namespace app\controllers;

use app\components\Model;
use app\models\Product;
//use app\models\UserSearch;
use app\models\User;
use DateInterval;
use DateTime;
use dektrium\user\controllers\AdminController as BaseAdminController;
use navatech\role\filters\RoleFilter;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\db\Query;
use yii\helpers\Json;

class AdminController extends BaseAdminController {

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
//				'name'    => 'Trang Admin',
//				//NOT REQUIRED, only if you want to translate
//				'actions' => [
//					//without translate
//					'index'        => 'Danh sách ',
//					'update'       => 'Cập nhật ',
//					'create'       => 'Thêm mới người dùng',
//				],
//			],
		];
	}

	public function beforeAction($action) {
		if(Yii::$app->user->isGuest && Yii::$app->controller->action->id !== 'login') {
			$this->redirect(Url::to(['/user/security/login']));
			return false;
		} else {
			return parent::beforeAction($action);
		}
	}

	public function actionIndex() {
		// TODO: Change the auto generated stub
		return parent::actionIndex();
	}

	public function actionBlock($id) {
		// TODO: Change the auto generated stub
		return parent::actionBlock($id);
	}

	public function actionConfirm($id) {
		// TODO: Change the auto generated stub
		return parent::actionConfirm($id);
	}

	public function actionInfo($id) {
		// TODO: Change the auto generated stub
		return parent::actionInfo($id);
	}

	public function actionUpdate($id) {
		Url::remember('', 'actions-redirect');
		$user           = $this->findModel($id);
		$role           = $user->role_id;
		$model          = new Model();
		$user->scenario = 'update';
		$event          = $this->getUserEvent($user);
		$this->performAjaxValidation($user);
		$this->trigger(self::EVENT_BEFORE_UPDATE, $event);
		if($user->load(\Yii::$app->request->post()) && $user->save()) {
			\Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Account details have been updated'));
			$this->trigger(self::EVENT_AFTER_UPDATE, $event);
			return $this->redirect(['index']);
		}
		return $this->render('_account', [
			'user' => $user,
			'role' => $role,
		]);
	}

	public function actionAssignments($id) {
		// TODO: Change the auto generated stub
		return parent::actionAssignments($id);
	}

	public function actionDelete($id) {
		// TODO: Change the auto generated stub
		return parent::actionDelete($id);
	}

	public function actionUpdateProfile($id) {
		// TODO: Change the auto generated stub
		return parent::actionUpdateProfile($id);
	}

//	public function actionCreate() {
//		/** @var User $user */
//		return $this->render('create_role');
//	}

	public function actionCreate() {
		$user  = \Yii::createObject([
			'class'    => User::className()
//			'scenario' => 'admin_create',
		]);
		$event = $this->getUserEvent($user);
		$this->performAjaxValidation($user);
		$this->trigger(self::EVENT_BEFORE_CREATE, $event);
		if($user->load(\Yii::$app->request->post())) {
			$user->role_id      = Model::ROLE_ADMIN;
			$user->confirmed_at = 1456114858;
			if($user->create()) {
				if($user->save()) {
				}
				\Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
				$this->trigger(self::EVENT_AFTER_CREATE, $event);
				if(\Yii::$app->user->identity->role_id != Model::ROLE_ADMIN) {
					return $this->redirect([
						'tree',
					]);
				} else {
					return $this->redirect([
						'index',
					]);
				}
			} else {
				echo '<pre>';
				print_r($user->errors);
				die;
			}
		}
		return $this->render('create', [
			'user' => $user,
		]);
	}

	protected function findModel($id) {
		if(($model = User::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}