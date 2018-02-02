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
        <div class="col-md-3">
            <?= $form->field($model, 'customer_code')->textInput(['placeholder' => 'Mã khách hàng'])->label(false) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Họ và tên đầy đủ'])->label(false) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Số điện thoại'])->label(false) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm khách hàng', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
