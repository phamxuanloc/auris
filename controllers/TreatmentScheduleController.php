<?php

namespace app\controllers;

use app\models\Customer;
use app\models\KpiEkip;
use app\models\Order;
use app\models\TreatmentHistory;
use app\models\TreatmentHistorySearch;
use navatech\role\filters\RoleFilter;
use Yii;
use app\models\TreatmentSchedule;
use app\models\TreatmentScheduleSeacrh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreatmentScheduleController implements the CRUD actions for TreatmentSchedule model.
 */
class TreatmentScheduleController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [//					'delete' => ['POST'],
                ],
            ],
            'role' => [
                'class' => RoleFilter::className(),
                'name' => 'Quản lý lịch điều trị',
                'actions' => [
                    'index' => 'Danh sách lịch điều trị',
                    'create' => 'Thêm mới',
                    'update' => 'Cập nhật lịch điều trị',
                    'start' => 'Bắt đầu điều trị',
                    'end' => 'Kết thúc điều trị',
                    'delete' => 'Xóa lịch điều trị',
                    'view-all' => 'Xem tất cả',
                ],
            ],
        ];
    }

    public function actionViewAll()
    {
        return true;
    }

    /**
     * Lists all TreatmentSchedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TreatmentHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TreatmentSchedule model.
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
     * Creates a new TreatmentSchedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($order_id = null)
    {
        $model = new TreatmentHistory();
        if ($order_id != null) {
            $order = Order::findOne($order_id);
            $model->order_code = $order->order_code;
            $model->order_id = $order->id;
            $model->customer_id = $order->customer_id;
            $model->customer_code = $order->customer_code;
            $model->customer_name = $order->customer_name;
            $model->customer_phone = $order->customer_phone;
            $model->sale_id = $order->sale_id;
            $model->ekip_id = $order->ekip_id;
        }
        if ($model->load(Yii::$app->request->post())) {
            $order = Order::find()->where("order_code like '%$model->order_code%'")->one();
            if ($order) {
                $ap_date = \DateTime::createFromFormat('H:i:s d/m/Y', $model->ap_date);
                $model->ap_date = $ap_date->format('Y-m-d H:i');
                $model->order_code = $order->order_code;
                $model->customer_id = $order->customer_id;
                $model->order_id = $order->id;
                $model->customer_phone = $order->customer_phone;
                $model->sale_id = $order->sale_id;
                $model->ekip_id = $order->ekip_id;
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

    public function actionStart()
    {
        $id = $_POST['id'];
        $treatmentHistory = TreatmentHistory::findOne($id);
        if ($treatmentHistory) {
            $treatmentHistory->real_start = date('Y-m-d H:i:s');
            $treatmentHistory->save();
            return true;
        }
    }

    public function actionEnd()
    {
        $id = $_POST['id'];
        $treatmentHistory = TreatmentHistory::findOne($id);
        if ($treatmentHistory) {
            $treatmentHistory->real_end = date('Y-m-d H:i:s');
            $treatmentHistory->save();
            $first_date = strtotime($treatmentHistory->real_end);
            $second_date = strtotime($treatmentHistory->real_start);
            $datediff = abs($first_date - $second_date);
            $kpiEkip = KpiEkip::find()->where("ekip_id = $treatmentHistory->ekip_id and YEAR(`month`) = YEAR(NOW()) AND MONTH(`month`) = MONTH(NOW())")->one();
            if ($kpiEkip) {
                $kpiEkip->total_time = $kpiEkip->total_time + $datediff;
                $kpiEkip->save();
            } else {
                $kpiEkip = new KpiEkip();
                $kpiEkip->ekip_id = $treatmentHistory->ekip_id;
                $kpiEkip->kpi = 0;
                $kpiEkip->total_time = $kpiEkip->total_time + $datediff;
                $kpiEkip->month = date('Y-m-d');
                if (!$kpiEkip->save()) {
                    print_r($kpiEkip->getErrors());
                    exit;
                }
            }
            return true;
        }
    }

    public function actionVote()
    {
        $id = $_POST['id'];
        $treatmentHistory = TreatmentHistory::findOne($id);
        if ($treatmentHistory && $treatmentHistory->real_end !== null) {
            $treatmentHistory->is_vote = 1;
            $treatmentHistory->save();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Updates an existing TreatmentSchedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $url = "")
    {
        $model = $this->findModel($id);
        $customer = Customer::findOne($model->customer_id);
        $model->treatment_direction = $customer->treatment_direction;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($url);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TreatmentSchedule model.
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
     * Finds the TreatmentSchedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return TreatmentSchedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TreatmentHistory::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
