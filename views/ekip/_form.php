<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ekip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ekip_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList(['1' => 'Hoạt động', '0' => 'Không hoạt động']) ?>

        <?= $form->field($model, 'created_date')->textInput() ?>

        <?= $form->field($model, 'end_date')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
