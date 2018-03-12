<?php

use app\models\Product;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Quản lý sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="help-block"></div>

    <div class="product-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-sm-3">
            <?= $form->field($model, 'name')->textInput([
                'maxlength' => true,
                'placeholder' => 'Tên sản phẩm',
            ])->label(false) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'service_id')->dropDownList($service)->label(false) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'price')->textInput([
                'maxlength' => true,
                'placeholder' => 'Đơn giá',
            ])->label(false) ?>
        </div>
        <div class="form-group col-sm-3">
            <?= Html::submitButton('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo sản phẩm', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'Id',
            ],
            'name',
            [
                'attribute' => 'service_id',
                'value' => function ($data) {
                    return $data->service->name;
                },
            ],
            [
                'attribute' => 'price',
                'format' => [
                    'decimal',
                    0,
                ],
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
	                if($data->status == 1){
	                    return "Hoạt động";
                    }else{
                        return "Không hoạt động";
                    }
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
</div>
