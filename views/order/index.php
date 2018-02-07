<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <div class="help-block"></div>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm đơn hàng', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-calendar-o" aria-hidden="true"></i> Tạo lịch hẹn', ['treatment-schedule/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute' => 'order_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->order_code, Yii::$app->urlManager->createUrl(['order/update', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'customer_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->customer_code, Yii::$app->urlManager->createUrl(['customer/update', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'customer_name',
                'contentOptions' => [
                    'style' => 'width:150px'
                ]
            ],
            'customer_phone',
            [
                'attribute' => 'ekip_id',
                'value' => 'ekip.full_name',
                'contentOptions' => [
                    'style' => 'width:150px'
                ]
            ],
            [
                'attribute' => 'sale_id',
                'value' => 'sale.full_name',
                'contentOptions' => [
                    'style' => 'width:160px'
                ]
            ],
            [
                'attribute' => 'service_id',
                'value' => 'service.name',
                'contentOptions' => [
                    'style' => 'width:150px'
                ]
            ],
            [
                'attribute' => 'product_id',
                'value' => 'product.name',
                'contentOptions' => [
                    'style' => 'width:220px'
                ]
            ],
            [
                'attribute' => 'color_id',
                'value' => 'color.name',
            ],
            'quantiy',
            [
                'attribute' => 'price',
//                'format' => ['decimal', 0],
            ],
            [
                'class' => \yii2mod\editable\EditableColumn::class,
                'attribute' => 'type',
                'url' => ['change-type'],
                'type' => 'select',
                'contentOptions' => [
                    'style' => 'width:180px'
                ],
                'editableOptions' => function ($model) {
                    return [
                        'mode' => 'inline',
                        'source' => ['1' => 'Đang làm', '2' => 'Hoàn thành'],
                        'value' => $model->type,
                    ];
                },
                'value' => function ($data) {
                    if ($data->type == 1) {
                        return "<span style='color: #0E7E12;'>Đang làm</span>";
                    } else if ($data->type == 2) {
                        return "<span style='color: #0E7E12;'>Hoàn thành</span>";
                    }
                }
            ],
            [
                'attribute' => 'total_price',
//                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'total_payment',
                'header' => 'Đã thanh toán',
                'contentOptions' => [
                    'style' => 'width:180px'
                ],
                'value' => function($data){
                    if($data->total_payment < $data->total_price){
                        return "<span style='color: red;'>".number_format($data->total_payment, '0', ',', '.')."</span>";
                    }else{
                        return "<span style='color: #0E7E12;'>".number_format($data->total_payment, '0', ',', '.')."</span>";
                    }
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
</div>
