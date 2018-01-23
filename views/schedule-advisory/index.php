<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScheduleAdvisorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedule Advisories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-advisory-index">
    <div class="help-block"></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo lịch hẹn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'customer_code',
            'full_name',
            'sex',
            'birthday',
            'phone',
            'ap_date',
            'sale_id',
            'status',
            'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
