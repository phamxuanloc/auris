<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TreatmentHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ap_date')->textInput() ?>

    <?= $form->field($model, 'real_start')->textInput() ?>

    <?= $form->field($model, 'real_end')->textInput() ?>

    <?= $form->field($model, 'att_point')->textInput() ?>

    <?= $form->field($model, 'spect_point')->textInput() ?>

    <?= $form->field($model, 'ae_point')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
