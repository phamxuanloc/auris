<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Color */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Deactive']) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
