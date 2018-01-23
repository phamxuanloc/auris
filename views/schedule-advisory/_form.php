<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScheduleAdvisory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">

    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'birthday')->textInput() ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'ap_date')->textInput() ?>

                <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale()) ?>

                <?= $form->field($model, 'status')->dropDownList(['0' => 'Chưa đến', '1' => 'Thành công', '2' => 'Không làm']) ?>

                <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
            </div>

            <div class="form-group row m-t-lg">
                <div class="col-sm-4 col-sm-offset-2">
                    <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
