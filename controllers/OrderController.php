<?php

namespace app\controllers;

use app\editable\EditableController;
use app\models\KpiEkip;
use app\models\KpiSale;
use app\models\Models;
use app\models\Customer;
use app\models\OrderCheckout;
use app\models\OrderService;
use app\models\Product;
use app\models\TreatmentHistory;
use navatech\role\filters\RoleFilter;
use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends EditableController {

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [//                    'delete' => ['POST'],
				],
			],
			'role'  => [
				'class'   => RoleFilter::className(),
				'name'    => 'Quản lý đơn hàng',
				'actions' => [
					'index'    => 'Danh sách',
					'create'   => 'Thêm mới',
					'update'   => 'Cập nhật',
					'view-all' => 'Xem tất cả',
					'delete'   => 'Xóa đơn hàng',
				],
			],
		];
	}

	public function actionViewAll() {
		return true;
	}

	/**
	 * Lists all Order models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new OrderSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Order model.
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
	 * Creates a new Order model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model          = new Order;
		$modelCheckouts = [new OrderCheckout];
		$modelServices  = [new OrderService];
		$is_role        = true;
		$role           = Yii::$app->user->identity->getRoleId();
		if($role && $role == Order::ROLE_SALE) {
			$model->sale_id = Yii::$app->user->identity->getId();
			$is_role        = false;
		}
		if($model->load(Yii::$app->request->post())) {
			$model->order_code = $this->genOrderCode();
			$customer          = Customer::find()->where("customer_code = '$model->customer_code'")->one();
			if($customer) {
				$model->customer_id = $customer->id;
			}
			$modelCheckouts = Models::createMultiple(OrderCheckout::classname());
			Models::loadMultiple($modelCheckouts, Yii::$app->request->post());
			$modelServices = Models::createMultiple(OrderService::classname());
			Models::loadMultiple($modelServices, Yii::$app->request->post());
			$transaction = \Yii::$app->db->beginTransaction();
			try {
				if($flag = $model->save(false)) {
					$totalPayment = 0;
					$totalPrice   = 0;
					$i            = 0;
					foreach($modelCheckouts as $modelCheckout) {
						//                        print_r($_POST['OrderCheckout'][$i]['money']);exit;
						if(isset($_POST['OrderCheckout'][$i]['money'])) {
							$money                       = $_POST['OrderCheckout'][$i]['money'];
							$money                       = preg_replace('/\./', '', $money);
							$modelCheckout->money        = $money;
							$modelCheckout->created_date = date('Y-m-d H:i:s');
							$modelCheckout->order_id     = $model->id;
							$modelCheckout->customer_id  = $model->customer_id;
							$totalPayment                += $modelCheckout->money;
							if($modelCheckout->cash_type != "") {
								if(!($flag = $modelCheckout->save(false))) {
									$transaction->rollBack();
									break;
								}
							}
						}
						$i ++;
					}
					$j = 0;
					foreach($modelServices as $modelService) {
						if(isset($_POST['OrderService'][$j])) {
							$service_id                = isset($_POST['OrderService'][$j]['service_id']) ? $_POST['OrderService'][$j]['service_id'] : "";
							$product_id                = isset($_POST['OrderService'][$j]['product_id']) ? $_POST['OrderService'][$j]['product_id'] : "";
							$color_id                  = isset($_POST['OrderService'][$j]['color_id']) ? $_POST['OrderService'][$j]['color_id'] : "";
							$price                     = isset($_POST['OrderService'][$j]['price']) ? $_POST['OrderService'][$j]['price'] : "";
							$quantity                  = isset($_POST['OrderService'][$j]['quantity']) ? $_POST['OrderService'][$j]['quantity'] : "";
							$price                     = preg_replace('/\./', '', $price);
							$modelService->order_id    = $model->id;
							$modelService->service_id  = $service_id;
							$modelService->product_id  = $product_id;
							$modelService->color_id    = $color_id;
							$modelService->price       = $price;
							$modelService->quantity    = $quantity;
							$modelService->total_price = $price * $quantity;
							$totalPrice                += $modelService->price * $modelService->quantity;
							if(!($flag = $modelService->save(false))) {
								$transaction->rollBack();
								break;
							}
						}
						$j ++;
					}
					if($model->sale_id) {
						$kpiSale = KpiSale::find()->where("sale_id = $model->sale_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
						if($kpiSale) {
							$kpiSale->estimate_revenue = $model->total_price;
							$kpiSale->real_revenue     = $totalPayment;
							$kpiSale->total_customer   = $kpiSale->total_customer + 1;
							$kpiSale->save();
						} else {
							$kpiSale                   = new KpiSale();
							$kpiSale->sale_id          = $model->sale_id;
							$kpiSale->kpi              = 0;
							$kpiSale->month            = date('Y-m-d');
							$kpiSale->estimate_revenue = $model->total_price;
							$kpiSale->real_revenue     = $totalPayment;
							$kpiSale->total_customer   = $kpiSale->total_customer + 1;
							$kpiSale->save();
						}
					}
					$kpiEkip = KpiEkip::find()->where("ekip_id = $model->ekip_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
					if($kpiEkip) {
						$kpiEkip->estimate_revenue = $model->total_price;
						$kpiEkip->real_revenue     = $totalPayment;
						//                        $kpiEkip->total_customer = $kpiEkip->total_customer + 1;
						$kpiEkip->save();
					} else {
						$kpiEkip                   = new KpiEkip();
						$kpiEkip->ekip_id          = $model->ekip_id;
						$kpiEkip->kpi              = 0;
						$kpiEkip->month            = date('Y-m-d');
						$kpiEkip->estimate_revenue = $model->total_price;
						$kpiEkip->real_revenue     = $totalPayment;
						$kpiEkip->total_customer   = $kpiEkip->total_customer + 1;
						if(!$kpiEkip->save()) {
							print_r($kpiEkip->getErrors());
							exit;
						}
					}
				} else {
					print_r($model->getErrors());
				}
				$model->total_payment = $model->total_payment + $totalPayment;
				$model->total_price   = $model->total_price + $totalPrice;
				$model->update();
				if($flag) {
					$transaction->commit();
					return $this->redirect(['index']);
				}
			} catch(Exception $e) {
				$transaction->rollBack();
				print_r($e->getMessage());
				exit;
			}
		}
		return $this->render('create', [
			'model'          => $model,
			'is_role'        => $is_role,
			'modelCheckouts' => (empty($modelCheckouts)) ? [new OrderCheckout] : $modelCheckouts,
			'modelServices'  => (empty($modelServices)) ? [new OrderService] : $modelServices,
		]);
	}

	public function actionProduct() {
		$out = [];
		if(isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if(!empty($parents)) {
				$cat_id = $parents;
				$out    = Product::getListShop($cat_id);
				return Json::encode([
					'output'   => $out,
					'selected' => '',
				]);
			}
		}
		return Json::encode([
			'output'   => '',
			'selected' => '',
		]);
	}

	/**
	 * Updates an existing Order model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id, $url = "") {
		$model           = $this->findModel($id);
		$oldModel        = clone $model;
		$modelsCheckouts = $model->orderCheckout;
		$modelsServices  = $model->orderService;
		if($model->load(Yii::$app->request->post())) {
			$oldIDs          = ArrayHelper::map($modelsCheckouts, 'id', 'id');
			$modelsCheckouts = Models::createMultiple(OrderCheckout::classname(), $modelsCheckouts);
			Models::loadMultiple($modelsCheckouts, Yii::$app->request->post());
			$deletedIDs     = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsCheckouts, 'id', 'id')));
			$oldServiceIDs  = ArrayHelper::map($modelsServices, 'id', 'id');
			$modelsServices = Models::createMultiple(OrderService::classname(), $modelsServices);
			Models::loadMultiple($modelsServices, Yii::$app->request->post());
			$deletedServiceIDs = array_diff($oldServiceIDs, array_filter(ArrayHelper::map($modelsServices, 'id', 'id')));
			$transaction       = \Yii::$app->db->beginTransaction();
			try {
				if($flag = $model->save(false)) {
					if(!empty($deletedIDs)) {
						OrderCheckout::deleteAll(['id' => $deletedIDs]);
					}
					$totalPayment         = 0;
					$model->total_payment = 0;
					$i                    = 0;
					foreach($modelsCheckouts as $modelCheckouts) {
						$modelCheckouts->money = $_POST['OrderCheckout'][$i]['money'];
						$money                 = preg_replace('/\./', '', $modelCheckouts->money);
						//                        echo $money;
						$modelCheckouts->money       = $money;
						$modelCheckouts->customer_id = $model->customer_id;
						$modelCheckouts->order_id    = $model->id;
						$totalPayment                += $modelCheckouts->money;
						if($modelCheckouts->cash_type != "") {
							if(!($flag = $modelCheckouts->save(false))) {
								$transaction->rollBack();
								break;
							}
						}
						$i ++;
					}
					if(!empty($deletedServiceIDs)) {
						OrderService::deleteAll(['id' => $deletedServiceIDs]);
					}
					$total_price        = 0;
					$model->total_price = 0;
					$j                  = 0;
					foreach($modelsServices as $modelService) {
						if(isset($_POST['OrderService'][$j])) {
							$service_id                = isset($_POST['OrderService'][$j]['service_id']) ? $_POST['OrderService'][$j]['service_id'] : "";
							$product_id                = isset($_POST['OrderService'][$j]['product_id']) ? $_POST['OrderService'][$j]['product_id'] : "";
							$color_id                  = isset($_POST['OrderService'][$j]['color_id']) ? $_POST['OrderService'][$j]['color_id'] : "";
							$price                     = isset($_POST['OrderService'][$j]['price']) ? $_POST['OrderService'][$j]['price'] : "";
							$quantity                  = isset($_POST['OrderService'][$j]['quantity']) ? $_POST['OrderService'][$j]['quantity'] : "";
							$price                     = preg_replace('/\./', '', $price);
							$modelService->order_id    = $model->id;
							$modelService->service_id  = $service_id;
							$modelService->product_id  = $product_id;
							$modelService->color_id    = $color_id;
							$modelService->price       = $price;
							$modelService->quantity    = $quantity;
							$modelService->total_price = $price * $quantity;
							$total_price               += $modelService->price * $modelService->quantity;
							if(!($flag = $modelService->save(false))) {
								$transaction->rollBack();
								break;
							}
						}
						$j ++;
					}
					$kpiSale = KpiSale::find()->where("sale_id = $model->sale_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
					if($kpiSale) {
						$kpiSale->real_revenue = $totalPayment;
						$kpiSale->save();
					}
					$kpiEkip = KpiEkip::find()->where("ekip_id = $model->ekip_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
					if($kpiEkip) {
						$kpiEkip->real_revenue = $totalPayment;
						$kpiEkip->save();
					}
					if($model->type == 1) {
						if($oldModel->type != $model->type) {
							$kpiEkip->total_customer = $kpiEkip->total_customer + 1;
							$kpiEkip->save();
						}
					}
					$model->total_payment = $model->total_payment + $totalPayment;
					$model->update();
				}
				if($flag) {
					$transaction->commit();
					return $this->redirect($url);
				}
			} catch(Exception $e) {
				print_r($e->getMessage());
				$transaction->rollBack();
				exit;
			}
		}
		return $this->render('update', [
			'model'           => $model,
			'modelsCheckouts' => (empty($modelsCheckouts)) ? [new OrderCheckout] : $modelsCheckouts,
			'modelsServices'  => (empty($modelsServices)) ? [new OrderService] : $modelsServices,
		]);
	}

	public function genOrderCode() {
		$order = Order::find()->orderBy('id DESC')->one();
		if($order) {
			$orderCode = substr($order->order_code, 6, 7);
			$value     = $orderCode;
			$length    = 0;
			while($value != 0) {
				$value = intval($value / 10);
				$length ++;
				//                echo $length;
			}
			if(($length) == 1) {
				$a = $orderCode + 1;
				return "AU1-HD000000" . $a;
			} else if(($length) == 2) {
				$a = $orderCode + 1;
				return "AU1-HD00000" . $a;
			} else if(($length) == 3) {
				$a = $orderCode + 1;
				return "AU1-HD0000" . $a;
			} else if(($length) == 4) {
				$a = $orderCode + 1;
				return "AU1-HD000" . $a;
			} else if(($length) == 5) {
				$a = $orderCode + 1;
				return "AU1-HD00" . $a;
			} else if(($length) == 6) {
				$a = $orderCode + 1;
				return "AU1-HD0" . $a;
			} else if(($length) == 7) {
				$a = $orderCode + 1;
				return "AU1-HD" . $a;
			}
		} else {
			return "AU1-HD0000001";
		}
		//        print_r($orderCode);exit;
	}

	public function actionGetPrice() {
		$id      = $_POST['value'];
		$product = Product::findOne($id);
		if($product) {
			$result = [
				'status' => 1,
				'data'   => [
					'price' => $product->price,
				],
			];
			return json_encode($result);
		} else {
			$result = [
				'status' => 0,
				'data'   => [],
			];
			return json_encode($result);
		}
	}

	public function actionCreateSchedule() {
		$model = new TreatmentHistory();
		return $this->render('create-schedule', [
			'model' => $model,
		]);
	}

	public function actionGetInfo() {
		$value = $_POST['value'];
		$order = Order::find()->where("order_code like '%$value%'")->one();
		if($order) {
			$customer = Customer::findOne($order->customer_id);
			$phone    = substr($order->customer_phone, 7, 3);
			$result   = [
				'status' => 1,
				'data'   => [
					'order_id'            => $order->id,
					'customer_id'         => $order->customer_id,
					'customer_code'       => $order->customer_code,
					'customer_name'       => $order->customer_name,
					'customer_phone'      => 'xxxxxxx' . $phone,
					'treatment_direction' => $customer->treatment_direction,
				],
			];
			return json_encode($result);
		} else {
			return "abc";
		}
	}

	public function actionReport() {
		$report = Order::find()->orderBy('created_date');
	}

	/**
	 * Deletes an existing Order model.
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
	 * Finds the Order model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Order the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if(($model = Order::findOne($id)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
