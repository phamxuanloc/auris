<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiEkip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-ekip-form box">

    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ekip_id')->dropDownList($model->getListEkip(), ['prompt'=>'Chọn Ekip']) ?>

        <?= $form->field($model, 'kpi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'month')->dropDownList($model->getMonth()) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
