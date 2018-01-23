<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sale-form box">
    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale()) ?>

        <?= $form->field($model, 'kpi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'month')->dropDownList($model->getMonth()) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
