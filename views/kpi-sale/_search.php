<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sale_id') ?>

    <?= $form->field($model, 'kpi') ?>

    <?= $form->field($model, 'created_date') ?>

    <?= $form->field($model, 'month') ?>

    <?php // echo $form->field($model, 'estimate_revenue') ?>

    <?php // echo $form->field($model, 'real_revenue') ?>

    <?php // echo $form->field($model, 'total_customer') ?>

    <?php // echo $form->field($model, 'att_point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
