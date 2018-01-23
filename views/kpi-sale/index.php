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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'kpi',
            'created_date',
            'month',
            //'estimate_revenue',
            //'real_revenue',
            //'total_customer',
            //'att_point',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
