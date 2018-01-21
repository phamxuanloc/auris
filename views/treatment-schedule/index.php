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
            'order_code',
            'customer_code',
            'customer_name',
            'customer_phone',
            [
                'header' => 'Ekip',
                'value' => 'order.ekip.ekip_name',
            ],
            [
                'header' => 'Direct Sale',
                'value' => 'order.sale.username'
            ],
            [
                'header' => 'Loại dịch vụ',
                'value' => 'order.service.name'
            ],
            [
                'header' => 'Sản phẩm',
                'value' => 'order.product.name'
            ],
            [
                'header' => 'Màu sắc',
                'value' => 'order.color.name'
            ],
            [
                'header' => 'Số lượng',
                'value' => 'order.quantiy'
            ],
            [
                'header' => 'Lịch điều trị',
                'value' => 'ap_date'
            ],
            [
                'header' => 'Ghi chú',
                'value' => 'note'
            ],
            [
                'header' => 'Bắt đầu',
                'value' => 'real_start'
            ],
            [
                'header' => 'Kết thúc',
                'value' => 'real_end'
            ],
            [
                'header' => 'Thái độ',
                'value' => 'att_point'
            ],
            [
                'header' => 'Chuyên môn',
                'value' => 'spect_point'
            ],
            [
                'header' => 'Thẩm mỹ',
                'value' => 'ae_point'
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
