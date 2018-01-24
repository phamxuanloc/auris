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
            ['class' => 'yii\grid\CheckboxColumn'],
            'order_code',
            [
                'attribute' => 'customer_code',
                'contentOptions' => [
                    'style' => 'width:100px'
                ]
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
                'value' => 'ekip.ekip_name',
                'contentOptions' => [
                    'style' => 'width:150px'
                ]
            ],
            [
                'attribute' => 'sale_id',
                'value' => 'sale.username',
                'contentOptions' => [
                    'style' => 'width:90px'
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
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($data){
                    if($data->type == 0){
                        return "<span style='color: #0E7E12;'>Đang làm</span>";
                    }else{
                        return "Hoàn thành";
                    }
                },
            ],
            [
                'attribute' => 'total_price',
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'note',
                'contentOptions' => [
                    'style' => 'width:280px'
                ]
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
</div>
