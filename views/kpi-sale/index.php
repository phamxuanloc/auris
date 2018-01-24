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

    <?= $this->render('_search',['model' => $searchModel])?>

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
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'real_revenue',
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'total_customer',
                'format' => ['decimal', 0],
            ],
            [
                'attribute' => 'att_point',
                'format' => ['decimal', 0],
            ],
        ],
    ]); ?>
</div>
