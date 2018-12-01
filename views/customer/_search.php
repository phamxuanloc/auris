<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'customer_code')->textInput(['placeholder' => 'Mã khách hàng'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Họ và tên đầy đủ'])->label(false) ?>
        </div>

        <div class="form-group col-md-2">
            <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
