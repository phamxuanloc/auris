<?php

namespace app\controllers;

use app\models\Clinic;
use app\models\CustomerMedia;
use app\models\Order;
use navatech\role\filters\RoleFilter;
use Yii;
use app\models\Customer;
use app\models\CustomerSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['gen-customer-code', 'index', 'create', 'update', 'get-info', 'delete', 'view-phone', 'design', 'uploads', 'view-uploads'], 'roles' => ['@']],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'role' => [
                'class' => RoleFilter::className(),
                'name' => 'Quản lý khách hàng',
                'actions' => [
                    'index' => 'Danh sách',
                    'create' => 'Thêm mới',
                    'update' => 'Cập nhật',
                    'get-info' => 'Lấy thông tin',
                    'delete' => 'Xoá',
                    'view-phone' => 'Hiển thị số điện thoại',
                    'design' => 'Danh sách khách hàng',
                    'uploads' => 'Upload ảnh',
                    'view-uploads' => 'Thiết kế nụ cười',
                ],
            ],
        ];
    }

    /**
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
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

    public function actionGenCustomerCode($clinic_id = null)
    {
        if (isset($_POST['clinic_id'])) {
            $clinic_id = $_POST['clinic_id'];
        }
        $prefix = Clinic::findOne($clinic_id)->prefix;
        $customer = Customer::find()->select('max(customer_code) as customer_code')->where(['clinic_id' => $clinic_id])->one();
        if (!empty($customer->customer_code)) {
            $customerCode = substr($customer->customer_code, 4, 5);
            $value = $customerCode;
            $length = 0;
            while ($value != 0) {
                $value = intval($value / 10);
                $length++;
            }
//			return $length;
            if (($length + 1) == 1) {
                $a = (int)$customerCode + 1;
                return json_encode($prefix . "-00000" . $a);
            } else if (($length + 1) == 2) {
                $a = (int)$customerCode + 1;
                if ($a >= 10) {
                    return json_encode($prefix . "-000" . $a);
                } else {
                    return json_encode($prefix . "-0000" . $a);
                }
            } else if (($length + 1) == 3) {
                $a = (int)$customerCode + 1;
                if ($a >= 100) {
                    return json_encode($prefix . "-00" . $a);
                } else {
                    return json_encode($prefix . "-000" . $a);
                }
            } else if (($length + 1) == 4) {
                $a = (int)$customerCode + 1;
                if ($a >= 1000) {
                    return json_encode($prefix . "-0" . $a);
                } else {
                    return json_encode($prefix . "-00" . $a);
                }
            } else if (($length + 1) == 5) {
                $a = (int)$customerCode + 1;
                return json_encode($prefix . "-" . $a);
            } else {
                $a = $prefix . "-" . $customerCode + 1;
                return json_encode($a);
            }
        } else {
            return json_encode($prefix . "-00001");
        }
        //        print_r($orderCode);exit;
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();
        if (Yii::$app->user->identity->getRoleId() != 1) {
            $model->customer_code = json_decode($this->actionGenCustomerCode(Yii::$app->user->identity->clinic_id));
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->customer_status_id) {
                $model->customer_status_id = implode(',', $model->customer_status_id);
            }
            if (Yii::$app->user->identity->getRoleId() != 1) {
                $model->clinic_id = Yii::$app->user->identity->clinic_id;
            }
            $model->step = 1;
            $model->customer_img = UploadedFile::getInstance($model, 'customer_img');
            $model->upload();
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
     * Updates an existing Customer model.
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
        $modelOld = clone $model;
        if ($model->customer_status_id) {
            $model->customer_status_id = explode(',', $model->customer_status_id);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->customer_status_id) {
                $model->customer_status_id = implode(',', $model->customer_status_id);
            }
            if ($model->customer_img) {
                $model->customer_img = UploadedFile::getInstance($model, 'customer_img');
                $model->upload();
            } else {
                $model->customer_img = $modelOld->customer_img;
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionGetInfo()
    {
        $value = $_POST['value'];
        $order = Customer::find()->where("customer_code = '$value'")->one();
        if ($order) {
            $result = [
                'status' => 1,
                'data' => [
                    'customer_id' => $order->id,
                    'customer_name' => $order->name,
                    'customer_phone' => $order->phone,
                    'customer_sex' => $order->sex,
                    'customer_birthday' => date("Y-m-d", strtotime($order->birthday)),
                ],
            ];
            return json_encode($result);
        } else {
            return "abc";
        }
    }

    public function actionViewPhone()
    {
        return true;
    }

    public function actionDesign()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('design', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUploads($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->step = 2;
            $model->save();
            if (!empty($post['Customer']['listImage']) && $post['Customer']['listImage'] != null) {
                $listImage = $post['Customer']['listImage'];
                for ($i = 0; $i < count($listImage); $i++) {
                    $customerMedia = new CustomerMedia();
                    $customerMedia->customer_id = $id;
                    $customerMedia->url = 'uploads/' . $listImage[$i]['path'];
                    if (!$customerMedia->save()) {
                        print_r($customerMedia->getErrors());
                        exit;
                    }
                }
            }
        }

        return $this->render('uploads', [
            'model' => $model,
        ]);
    }

    public function actionViewUploads($id)
    {
        $model = $this->findModel($id);

        return $this->render('view-uploads', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
