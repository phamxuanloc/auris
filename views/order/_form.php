<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
$url = Yii::$app->urlManager->createUrl(['customer/get-info']);
?>

<div class="box">
    <div class="box-header b-b">
        <h3><?= $title?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <input id="url" value="<?= $url?>" type="hidden">
                <input id="order-customer_id" name="Order[customer_id]" type="hidden">

                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'quantiy')->textInput() ?>

                <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'total_payment')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'ekip_id')->dropDownList($model->getListEkip()) ?>

                <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale()) ?>

                <?= $form->field($model, 'service_id')->dropDownList($model->getListService()) ?>

                <?= $form->field($model, 'product_id')->dropDownList($model->getListProduct()) ?>

                <?= $form->field($model, 'color_id')->dropDownList($model->getListColor()) ?>
            </div>
        </div>

        <div class="form-group row m-t-lg">
            <div class="col-sm-4 col-sm-offset-2">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
