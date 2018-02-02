<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <?= $form->field($model, 'order_code') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'customer_code') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'customer_name') ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <?= $form->field($model, 'sale_id', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->dropDownList($model->getListDirectSale(), ['prompt' => 'Tất cả'])->label("DirectSale") ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'ekip_id', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->dropDownList($model->getListEkip(), ['prompt' => 'Tất cả'])->label("Ekip") ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'status', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->dropDownList(['0'=>'Đang làm', '1'=>'Hoàn tất'], ['prompt' => 'Tất cả'])->label("Tình trạng") ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'payment_status', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->dropDownList(['1'=>'Đã thanh toán đủ', '0'=>'Chưa thanh toán đủ'], ['prompt' => 'Tất cả'])->label("Thanh toán") ?>
            </div>
        </div>
    </div>
    <div class="help-block"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <?= $form->field($model, 'start_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ]
                ])->label("Từ ngày") ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'end_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ]
                ])->label("Đến ngày") ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
