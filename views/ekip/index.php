<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EkipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ekips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ekip-index">
    <div class="help-block"></div>

    <p>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo Ekip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ekip_name',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    if ($data->status == 1) {
                        return "Hoạt động";
                    } else {
                        return "Không hoạt động";
                    }
                }
            ],
            'created_date',
            'end_date',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
</div>
