<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KpiEkipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Ekips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-ekip-index">
    <div class="help-block"></div>

    <p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm KPI', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'ekip_id',
                'value' => 'ekip.full_name',
            ],
            [
                'attribute' => 'month',
                'format' => ['date', 'php:m/Y'],
            ],
            [
                'attribute' => 'total_time',
                'value' => function ($data) {
                    if ($data->total_time < 60) {
                        return "0 giờ 0 phút " . $data->total_time . " giây";
                    } else if ($data->total_time >= 60 && $data->total_time < 3600) {
                        $minute = ($data->total_time - $data->total_time % 60) / 60;
                        $second = $data->total_time % 60;
                        return "0 giờ " . $minute . " phút " . $second . " giây";
                    } else {
                        $hour = ($data->total_time - $data->total_time % 3600) / 3600;
                        $minute = (($data->total_time % 3600) - ($data->total_time % 3600) % 60) / 60;
                        $second = $data->total_time - $minute * 60 - $hour * 3600;
                        return $hour." giờ " . $minute . " phút " . $second . " giây";
                    }
                }
            ],
            [
                'attribute' => 'estimate_revenue',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<b style='font-size: 16px;color: red;'>" . number_format($data->estimate_revenue, 0, ',', '.') . " (" . (($data->estimate_revenue / $data->kpi) * 100) . "%)</b>";
                }
            ],
            [
                'attribute' => 'real_revenue',
                'format' => 'raw',
                'value' => function ($data) {
                    return "<b style='font-size: 16px;color: green;'>" . number_format($data->real_revenue, 0, ',', '.') . " (" . (($data->real_revenue / $data->kpi) * 100) . "%)</b>";
                }
            ],
            'total_customer',
            'spect_point',
            'ae_point',
        ],
    ]); ?>
</div>
