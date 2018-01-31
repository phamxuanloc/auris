<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreatmentScheduleSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treatment Schedules';
$this->params['breadcrumbs'][] = $this->title;
$url = Yii::$app->urlManager->createUrl(['treatment-schedule/start']);
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
    <?php \yii\widgets\Pjax::begin(['id' => 'refresh-grid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'order_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->order_code, Yii::$app->urlManager->createUrl(['order/update', 'id' => $model->order_id]));
                }
            ],
            [
                'attribute' => 'customer_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->customer_code, Yii::$app->urlManager->createUrl(['customer/update', 'id' => $model->customer_id]));
                }
            ],
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
                'attribute' => 'real_start',
                'format' => 'raw',
                'value' => function($data){
                    $url = Yii::$app->urlManager->createUrl(['treatment-schedule/start']);
                    if($data->real_start == "" || $data->real_start == null){
                        return "<button class='btn btn-default' onclick='start($data->id);return false;'>Bắt đầu</button>";
                    }else{
                        return $data->real_start;
                    }
                },
            ],
            [
                'header' => 'Kết thúc',
                'attribute' => 'real_end',
                'format' => 'raw',
                'value' => function($data){
                    $url = Yii::$app->urlManager->createUrl(['treatment-schedule/end']);
                    if($data->real_end == "" || $data->real_end == null){
                        return "<button class='btn btn-default' onclick='end($data->id); return false;'>Kết thúc</button>";
                    }else{
                        return $data->real_end;
                    }
                },
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
    <?php \yii\widgets\Pjax::end(); ?>
</div>
