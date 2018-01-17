<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TreatmentHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treatment Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Treatment History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'customer_id',
            'customer_code',
            'customer_name',
            //'customer_phone',
            //'ap_date',
            //'real_start',
            //'real_end',
            //'att_point',
            //'spect_point',
            //'ae_point',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
