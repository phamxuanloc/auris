<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KpiSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sale-index">
    <div class="help-block"></div>

    <p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm KPI', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'attribute' => 'month',
                'format' => ['date', 'php:m/Y'],
            ],
            [
                'attribute' => 'kpi',
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'estimate_revenue',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->kpi <= 0) {
                        return "<b style='font-size: 16px;color: red;'>" . number_format($data->estimate_revenue, 0, ',', '.') . "</b>";
                    } else {
                        return "<b style='font-size: 16px;color: red;'>" . number_format($data->estimate_revenue, 0, ',', '.') . " (" . (($data->estimate_revenue / $data->kpi) * 100) . "%)</b>";
                    }
                }
            ],
            [
                'attribute' => 'real_revenue',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->kpi <= 0) {
                        return "<b style='font-size: 16px;color: green;'>" . number_format($data->real_revenue, 0, ',', '.') . "</b>";
                    } else {
                        return "<b style='font-size: 16px;color: green;'>" . number_format($data->real_revenue, 0, ',', '.') . " (" . (($data->real_revenue / $data->kpi) * 100) . "%)</b>";
                    }
                }
            ],
            [
                'attribute' => 'total_customer',
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'att_point',
                'format' => ['decimal', 0],
            ],
            [
                'header' => '% Tư Vấn Thành Công',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<span style='color: green;'>" . $data->getSuccess($data->sale_id) . " %</span>";
                }
            ],
        ],
    ]); ?>
</div>
