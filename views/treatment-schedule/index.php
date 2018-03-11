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
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p style="text-align: right">
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
                'value' => 'order.ekip.full_name',
            ],
            [
                'header' => 'Direct Sale',
                'value' => 'order.sale.full_name'
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
                'value' => function ($data) {
                    $url = Yii::$app->urlManager->createUrl(['treatment-schedule/start']);
                    if ($data->real_start == "" || $data->real_start == null) {
                        return "<button class='btn btn-default' onclick='start($data->id);return false;'>Bắt đầu</button>";
                    } else {
                        return $data->real_start;
                    }
                },
            ],
            [
                'header' => 'Kết thúc',
                'attribute' => 'real_end',
                'format' => 'raw',
                'value' => function ($data) {
                    $url = Yii::$app->urlManager->createUrl(['treatment-schedule/end']);
                    if ($data->real_end == "" || $data->real_end == null) {
                        return "<button class='btn btn-default' onclick='end($data->id); return false;'>Kết thúc</button>";
                    } else {
                        return $data->real_end;
                    }
                },
            ],
            [
                'header' => 'Thái độ',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->att_point == 2) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    } elseif ($data->att_point == 1) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    } elseif ($data->att_point == -3) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    }
                }
            ],
            [
                'header' => 'Chuyên môn',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->spect_point == 2) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    } elseif ($data->spect_point == 1) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    } elseif ($data->spect_point == -3) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    }
                }
            ],
            [
                'header' => 'Thẩm mỹ',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->ae_point == 2) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    } elseif ($data->ae_point == 1) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/> <img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    } elseif ($data->ae_point == -3) {
                        return "<img style='width:15px' src='" . Yii::$app->request->baseUrl . "/images/ic-star.png'/>";
                    }
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        $url = Yii::$app->urlManager->createUrl(['treatment-schedule/update', 'id' => $model->id, 'url' => \yii\helpers\Url::current()]);
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                            'title' => 'Update'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
