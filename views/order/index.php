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
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'customer_code',
            'customer_name',
            'customer_phone',
            //'ekip_id',
            //'sale_id',
            //'service_id',
            //'product_id',
            //'color_id',
            //'price',
            //'quantiy',
            //'total_price',
            //'status',
            //'type',
            //'total_payment',
            //'debt',
            //'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
