<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Tạo lịch hẹn - điều trị";
?>
<div class="help-block"></div>
<div class="box">
    <div class="box-header b-b">
        <h3>Tạo lịch hẹn - điều trị</h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'ap_date')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="form-group row m-t-lg">
            <div class="col-sm-4 col-sm-offset-2">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Tạo lịch điều trị', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
