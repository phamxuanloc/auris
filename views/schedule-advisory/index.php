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
//            'customer_code',
            'full_name',
            [
                'attribute' => 'sex',
                'value' => function ($data) {
                    if ($data->sex == 1) {
                        return 'Nam';
                    } else {
                        return 'Nữ';
                    }
                }
            ],
            [
                'attribute' => 'birthday',
                'format' => ['date', 'php:d-m-Y'],
            ],
            'phone',
            [
                'attribute' => 'ap_date',
                'format' => ['date', 'php:g, d/m/Y'],
            ],
            [
                'class' => \yii2mod\editable\EditableColumn::class,
                'url' => ['change-sale'],
                'type' => 'select',
                'editableOptions' => function ($model) {
                    return [
                        'mode' => 'inline',
                        'source' => $model->getListDirectSale(),
                        'value' => $model->sale_id,
                    ];
                },
                'attribute' => 'sale_id',
                'value' => 'sale.username',
            ],
            [
                'class' => \yii2mod\editable\EditableColumn::class,
                'attribute' => 'status',
                'url' => ['change-status'],
                'type' => 'select',
                'editableOptions' => function ($model) {
                    return [
                        'mode' => 'inline',
                        'source' => [3 => 'Chưa đến', 1 => 'Thành công', 2 => 'Không làm'],
                        'value' => $model->status,
                    ];
                },
                'value' => function ($data) {
                    if ($data->status == 1) {
                        return '<span class="label label-warning">Thành công</span>';
                    } else if ($data->status == 2) {
                        return '<span class="label label-danger">Không làm</span>';
                    } else {
                        return '<span class="label label-default">Chưa đến</span>';
                    }
                }
            ],
            [
                'class' => \yii2mod\editable\EditableColumn::class,
                'url' => ['change-note'],
                'editableOptions' => [
                    'mode' => 'inline',
                ],
                'attribute' => 'note',
                'value' => 'note',
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
