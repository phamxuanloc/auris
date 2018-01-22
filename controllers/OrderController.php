<?php

namespace app\controllers;

use app\models\Customer;
use app\models\TreatmentHistory;
use Yii;
use app\models\Order;
use app\models\OrderSearch;
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
     * @param integer $id
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
        $model = new Order();
        if ($model->load(Yii::$app->request->post())) {
            $model->order_code = $this->genOrderCode();
            $customer = Customer::find()->where("customer_code like '%$model->customer_code%'")->one();
            if($customer){
                $model->customer_id = $customer->id;
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
                exit;
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function genOrderCode(){
        $order = Order::find()->select('max(order_code) as order_code')->one();
        if($order){
            $orderCode = substr($order->order_code, 2, 5);
            $value = $orderCode;
            $length = 0;
            while ($value != 0) {
                $value = intval($value / 10);
                $length++;
//                echo $length;
            }
//            exit;
            if (($length) == 1) {
                $a = $orderCode + 1;
                return "DH0000" . $a;
            } else if (($length) == 2) {
                $a = $orderCode + 1;
                return "DH000" . $a;
            } else if (($length) == 3) {
                $a = $orderCode + 1;
                return "DH00" . $a;
            } else {
                $a = $orderCode + 1;
                return $a;
            }
        }
//        print_r($orderCode);exit;
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
                ]
            ];
            return json_encode($result);
        } else {
            return "abc";
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * @param integer $id
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
