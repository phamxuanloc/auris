<?php

namespace app\controllers;

use app\models\Customer;
use app\models\TreatmentHistory;
use Yii;
use app\models\Clinic;
use app\models\ClinicSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClinicController implements the CRUD actions for Clinic model.
 */
class CheckpointController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Clinic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Customer::find()->orderBy('step')->all();
        return $this->render('index', [
            'model' => $model
        ]);
    }
}
