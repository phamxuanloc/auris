<?php

use yii\helpers\Html;
use yii\grid\GridView;
use navatech\role\helpers\RoleChecker;
use app\controllers\CustomerController;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index normal-table-list">
    <div class="help-block"></div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute' => 'customer_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->customer_code, Yii::$app->urlManager->createUrl(['customer/update', 'id' => $model->id]));
                }
            ],
            'name',
            [
                'attribute' => 'sex',
                'value' => function ($data) {
                    if ($data->sex == 1) {
                        return "Nam";
                    } else {
                        return "Nữ";
                    }
                }
            ],
            [
                'attribute' => 'birthday',
            ],
            [
                'header' => 'Tỉnh/Thành phố',
                'value' => 'region.region_name'
            ],
            [
                'attribute' => 'phone',
                'visible' => RoleChecker::isAuth(CustomerController::className(), 'view-phone', Yii::$app->user->identity->getRoleId()),
            ],
            [
                'header' => 'Đã thanh toán',
//                'format' => ['decimal', '0'],
                'value' => function ($model) {
                    return $model->getPayment($model->id);
                }
            ],
            [
                'attribute' => 'character_type',
                'value' => function ($data) {
                    return $data->characterType($data->character_type);
                }
            ],
            [
                'attribute' => 'created_date',
                'format' => ['date', 'php:d-m-Y'],
            ],
            [
                'header' => 'Thiết kế nụ cười',
                'format' => 'raw',
                'contentOptions' => ['style'=>'padding:0;vertical-align: middle;text-align: center;'],
                'options' => [
                    'style' => 'margin:auto'
                ],
                'value' => function ($data) {
                    if (!empty($data->media)) {
                        return '<a href="' . Yii::$app->urlManager->createUrl(["customer/view-uploads", "id" => $data->id]) . '"> <i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i></a>';
                    }
                },
            ],
            'note',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
