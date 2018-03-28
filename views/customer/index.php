<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">
    <div class="help-block"></div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
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
                'format' => ['date', 'php:d-m-Y'],
            ],
            [
                'header' => 'Tỉnh/Thành phố',
                'value' => 'region.region_name'
            ],
            'phone',
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
            'note',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
