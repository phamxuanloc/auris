<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScheduleAdvisorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedule Advisories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-advisory-index normal-table-list">
    <div class="breadcomb-list mg-b-15">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <div class="breadcomb-list">
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
                    'value' => function ($data) {
                        return date('d/m/Y', strtotime($data->birthday));
                    }
                ],
                [
                    'attribute' => 'phone',
                    'value' => function ($data) {
                        0;
                        $newtimestamp = strtotime($data->ap_date . ' - 10 minute');
                        $date = date('Y-m-d H:i:s', $newtimestamp);
                        $currentDate = date('Y-m-d H:i:s');
                        if ($date <= $currentDate) {
                            return $data->phone; // or return true;
                        } else {
                            return ''; // or return false;
                        }
                    }
                ],
                [
                    'attribute' => 'ap_date',
                    'value' => function ($data) {
                        return date('H:i A, d/m/Y', strtotime($data->ap_date));
                    }
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
                    'value' => 'sale.full_name',
                ],
                [
                    'attribute' => 'advisory_id',
                    'value' => 'advisory.full_name'
                ],
                [
                    'attribute' => 'designer_id',
                    'value' => 'designer.full_name'
                ],
                [
                    'class' => \yii2mod\editable\EditableColumn::class,
                    'attribute' => 'status',
                    'url' => ['change-status'],
                    'type' => 'select',
                    'editableOptions' => function ($model) {
                        return [
                            'mode' => 'inline',
                            'source' => ['1' => 'Chưa đến', '2' => 'Đã nhắc', '3' => 'Không đến', '4' => 'Không làm', '5' => 'Đồng ý', '6' => 'Vãng Lai đồng ý', '7' => 'Vãng Lai không làm'],
                            'value' => $model->status,
                        ];
                    },
                    'value' => function ($data) {
                        if ($data->status == 1) {
                            return '<span class="label label-default">Chưa đến</span>';
                        } else if ($data->status == 2) {
                            return '<span class="label" style="background-color: yellow">Đã nhắc</span>';
                        } else if ($data->status == 3) {
                            return '<span class="label label-warning">Không đến</span>';
                        } else if ($data->status == 4) {
                            return '<span class="label label-danger">Không làm</span>';
                        } else if ($data->status == 5) {
                            return '<span class="label label-success">Đồng ý</span>';
                        } else if ($data->status == 6) {
                            return '<span class="label label-success">Vãng Lai đồng ý</span>';
                        } else if ($data->status == 7) {
                            return '<span class="label label-danger">Vãng Lai không làm</span>';
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

                [
                    'class' => \yii2mod\editable\EditableColumn::class,
                    'url' => ['change-note-direct'],
                    'editableOptions' => [
                        'mode' => 'inline',
                    ],
                    'attribute' => 'note_direct',
                    'value' => 'note_direct',
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            $url = Yii::$app->urlManager->createUrl(['schedule-advisory/update', 'id' => $model->id, 'url' => \yii\helpers\Url::current()]);
                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                'title' => 'Update'
                            ]);
                        }
                    ]
                ],
            ],
        ]); ?>
    </div>
</div>
