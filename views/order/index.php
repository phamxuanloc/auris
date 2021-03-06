<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index normal-table-list">
    <div class="help-block"></div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
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
                    return Html::a($model->order_code, Yii::$app->urlManager->createUrl(['order/update', 'id' => $model->id, 'url' => \yii\helpers\Url::current()]));
                }
            ],
            [
                'attribute' => 'customer_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->customer_code, Yii::$app->urlManager->createUrl(['customer/update', 'id' => $model->customer_id]));
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
                'attribute' => 'advisory_id',
                'value' => 'advisory.full_name',
                'contentOptions' => [
                    'style' => 'width:160px'
                ]
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->total_payment < $data->total_price) {
                        return "<span style='color: red;'>Đang làm</span>";
                    } else{
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
                'value' => function ($data) {
                    if ($data->total_price == $data->total_payment) {
                        return "<span style='color: #0E7E12;'>" . number_format($data->total_payment, '0', ',', '.') . "</span>";
                    } else {
                        return "<span style='color: red'>" . number_format($data->total_payment, '0', ',', '.') . "</span>";
                    }
                },
                'format' => 'raw',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $url = Yii::$app->urlManager->createUrl(['order/update', 'id' => $model->id, 'url' => \yii\helpers\Url::current()]);
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                            'title' => 'Update'
                        ]);
                    },
                    'delete' => function($url) {
                        if (\navatech\role\helpers\RoleChecker::isAuth(\app\controllers\OrderController::className(), 'delete', Yii::$app->user->identity->getRoleId())) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => 'Delete'
                            ]);
                        }
                    }
                ],
            ],
        ],
    ]); ?>
</div>
