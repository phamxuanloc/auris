<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header b-b">
        <h3>Thêm đơn hàng</h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'service_id')->textInput() ?>

                <?= $form->field($model, 'product_id')->textInput() ?>

                <?= $form->field($model, 'color_id')->textInput() ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'quantiy')->textInput() ?>

                <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'status')->textInput() ?>

                <?= $form->field($model, 'type')->textInput() ?>

                <?= $form->field($model, 'total_payment')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'debt')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'ekip_id')->textInput() ?>

                <?= $form->field($model, 'sale_id')->textInput() ?>
            </div>
        </div>

        <div class="form-group row m-t-lg">
            <div class="col-sm-4 col-sm-offset-2">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
