<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header b-b">
        <h3><?= $title?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="box-header">
                    <h6>Thông tin khách hàng</h6>
                </div>

                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'birthday')->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd/mm/yyyy'
                    ]
                ]) ?>

                <?= $form->field($model, 'sex')->dropDownList(['2' => "Nữ", '1' => 'Nam']) ?>

                <?= $form->field($model, 'address')->textInput() ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput() ?>

                <div class="box-header">
                    <h6>Mong muốn khách hàng</h6>
                </div>
                <?= $form->field($model, 'disire')->textarea(['rows' => '8'])->label(false) ?>

                <div class="box-header">
                    <h6>Thăm khám</h6>
                </div>
                <?= $form->field($model, 'examination')->textarea(['rows' => '8'])->label(false) ?>

                <div class="box-header">
                    <h6>Upload ảnh</h6>
                </div>
                <?php if (!$model->isNewRecord) {
                    echo Html::img(@$model->customer_img, ['style' => 'height:80px']);
                } ?>
                <?= $form->field($model, 'customer_img')->fileInput()->label(false) ?>

                <?= $form->field($model, 'character_type')->dropDownList($model->getCharaterType()) ?>

                <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-6">
                <div class="box-header">
                    <h6>Tình trạng bệnh nhân</h6>
                </div>
                <?= $form->field($model, 'customer_status_id', ['template' => '{input}{label}'])->checkboxList($model->getCustomerStatus())->label(false) ?>

                <?= $form->field($model, 'bl_pressure')->textInput() ?>

                <?= $form->field($model, 'current_medicine')->textInput() ?>

                <?= $form->field($model, 'current_treatment')->textInput() ?>

                <?= $form->field($model, 'level_treatment')->textInput() ?>

                <?= $form->field($model, 'other')->textInput() ?>

                <div class="box-header">
                    <h6>Hướng điều trị</h6>
                </div>
                <?= $form->field($model, 'treatment_direction')->textarea(['rows' => '3'])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <h6>Các đơn hàng của khách</h6>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="form-group row m-t-lg">
            <div class="col-sm-4 col-sm-offset-2">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
