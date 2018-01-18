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

    <div class="help-block"></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <button class="btn">Sắp xếp <i class="fa fa-indent" aria-hidden="true"></i></button>
        <button class="btn"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
        <button class="btn"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm đơn hàng', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-calendar-o" aria-hidden="true"></i> Tạo lịch hẹn', ['treatment-schedule/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
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
