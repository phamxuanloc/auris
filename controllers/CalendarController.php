<?php

namespace app\controllers;

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
class CalendarController extends Controller
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
        return $this->render('index');
    }

    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){
        $events = array();

        $treatmentHistory = TreatmentHistory::find()->all();

        foreach ($treatmentHistory as $item){
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = 1;
            $Event->title = 'Lịch điều trị - KH: '.$item->customer_code.' - '.$item->customer_name;
            $Event->start = date('Y-m-d H:i:s', strtotime($item->ap_date));
            $events[] = $Event;
        }

        header('Content-type: application/json');
        return Json::encode($events);

        Yii::$app->end();
    }
}
