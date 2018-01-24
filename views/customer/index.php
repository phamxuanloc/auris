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

    <p>
        <button class="btn">Sắp xếp <i class="fa fa-indent" aria-hidden="true"></i></button>
        <button class="btn"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
        <button class="btn"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
        <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm khách hàng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'customer_code',
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
            'phone',
            [
                'header' => 'Đã thanh toán',
                'format' => ['decimal', '0'],
                'value' => function($model){
                    return $model->getPayment($model->id);
                }
            ],
            [
                'attribute' => 'character_type',
                'value' => function ($data) {
                    return $data->characterType($data->character_type);
                }
            ],
            'note',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]); ?>
</div>
