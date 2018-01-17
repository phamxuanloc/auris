<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreatmentScheduleSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treatment Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Treatment Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'order_code',
            'customer_id',
            'customer_name',
            //'customer_phone',
            //'treatment_time',
            //'note:ntext',
            //'is_finish',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
