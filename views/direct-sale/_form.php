<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DirectSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header b-b">
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
