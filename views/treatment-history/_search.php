<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TreatmentHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'customer_code') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?php // echo $form->field($model, 'customer_phone') ?>

    <?php // echo $form->field($model, 'ap_date') ?>

    <?php // echo $form->field($model, 'real_start') ?>

    <?php // echo $form->field($model, 'real_end') ?>

    <?php // echo $form->field($model, 'att_point') ?>

    <?php // echo $form->field($model, 'spect_point') ?>

    <?php // echo $form->field($model, 'ae_point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
