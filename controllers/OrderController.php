<?php

namespace app\controllers;

use app\models\KpiSale;
use app\models\Models;
use app\models\Customer;
use app\models\OrderCheckout;
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

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'role' => [
                'class' => RoleFilter::className(),
                'name' => 'Quản lý đơn hàng',
                'actions' => [
                    'index' => 'Danh sách',
                    'create' => 'Thêm mới',
                    'update' => 'Cập nhật',
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order;
        $modelCheckouts = [new OrderCheckout];
        if ($model->load(Yii::$app->request->post())) {
            $model->order_code = $this->genOrderCode();
            $customer = Customer::find()->where("customer_code = '$model->customer_code'")->one();
            if ($customer) {
                $model->customer_id = $customer->id;
            }
            if ($model->save()) {
                if ($model->sale_id) {
                    $kpiSale = KpiSale::find()->where("sale_id = $model->sale_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
                    if ($kpiSale) {
                        $kpiSale->estimate_revenue = $model->total_price;
                        $kpiSale->total_customer = $kpiSale->total_customer + 1;
                        $kpiSale->save();
                    }
                }
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
                exit;
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelCheckouts' => (empty($modelCheckouts)) ? [new OrderCheckout] : $modelCheckouts,
        ]);
    }

    public function actionProduct(){
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if (!empty($parents)) {
                $cat_id = $parents;
                $out = Product::getListShop($cat_id);
                return Json::encode(['output' => $out, 'selected' => '']);
            }
        }
        return Json::encode(['output' => '', 'selected' => '']);
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsCheckouts = $model->orderCheckout;
        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsCheckouts, 'id', 'id');
            $modelsCheckouts = Models::createMultiple(OrderCheckout::classname(), $modelsCheckouts);
            Models::loadMultiple($modelsCheckouts, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsCheckouts, 'id', 'id')));
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                if ($flag = $model->save(false)) {
                    if (!empty($deletedIDs)) {
                        OrderCheckout::deleteAll(['id' => $deletedIDs]);
                    }
                    $totalPayment = 0;
                    $model->total_payment = 0;
                    foreach ($modelsCheckouts as $modelCheckouts) {
                        $modelCheckouts->customer_id = $model->customer_id;
                        $modelCheckouts->order_id = $model->id;
                        $totalPayment += $modelCheckouts->money;
                        //                        if(!$modelCheckouts->save()){
                        //                            print_r($modelCheckouts->getErrors());exit;
                        //                        }
                        if (!($flag = $modelCheckouts->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }
                    if ($model->sale_id) {
                        $kpiSale = KpiSale::find()->where("sale_id = $model->sale_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
                        if ($kpiSale) {
                            $kpiSale->real_revenue = $kpiSale->real_revenue + $totalPayment;
                            $kpiSale->save();
                        }
                    }
                    $model->total_payment = $model->total_payment + $totalPayment;
                    $model->update();
                }
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        return $this->render('update', [
            'model' => $model,
            'modelsCheckouts' => (empty($modelsCheckouts)) ? [new OrderCheckout] : $modelsCheckouts,
        ]);
    }

    public function genOrderCode()
    {
        $order = Order::find()->orderBy('id DESC')->one();
        if ($order) {
            //            echo $order->order_code;exit;
            $orderCode = substr($order->order_code, 6, 7);
            $value = $orderCode;
            $length = 0;
            while ($value != 0) {
                $value = intval($value / 10);
                $length++;
                //                echo $length;
            }
            if (($length) == 1) {
                $a = $orderCode + 1;
                return "AU1-HD000000" . $a;
            } else if (($length) == 2) {
                $a = $orderCode + 1;
                return "AU1-HD00000" . $a;
            } else if (($length) == 3) {
                $a = $orderCode + 1;
                return "AU1-HD0000" . $a;
            } else if (($length) == 4) {
                $a = $orderCode + 1;
                return "AU1-HD000" . $a;
            } else if (($length) == 5) {
                $a = $orderCode + 1;
                return "AU1-HD00" . $a;
            } else if (($length) == 6) {
                $a = $orderCode + 1;
                return "AU1-HD0" . $a;
            } else if (($length) == 7) {
                $a = $orderCode + 1;
                return "AU1-HD" . $a;
            }
        }
        //        print_r($orderCode);exit;
    }

    public function actionGetPrice()
    {
        $id = $_POST['value'];
        $product = Product::findOne($id);
        if ($product) {
            $result = [
                'status' => 1,
                'data' => [
                    'price' => $product->price,
                ],
            ];
            return json_encode($result);
        } else {
            $result = [
                'status' => 0,
                'data' => [],
            ];
            return json_encode($result);
        }
    }

    public function actionCreateSchedule()
    {
        $model = new TreatmentHistory();
        return $this->render('create-schedule', [
            'model' => $model,
        ]);
    }

    public function actionGetInfo()
    {
        $value = $_POST['value'];
        $order = Order::find()->where("order_code like '%$value%'")->one();
        if ($order) {
            $result = [
                'status' => 1,
                'data' => [
                    'order_id' => $order->id,
                    'customer_id' => $order->customer_id,
                    'customer_code' => $order->customer_code,
                    'customer_name' => $order->customer_name,
                    'customer_phone' => $order->customer_phone,
                ],
            ];
            return json_encode($result);
        } else {
            return "abc";
        }
    }

    public function actionReport()
    {
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
    public function actionDelete($id)
    {
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
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
