<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_id')->dropDownList($model->getListService(), ['prompt'=>'Chọn Dịch vụ']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'Hoạt động', '0' => ' Đóng']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
