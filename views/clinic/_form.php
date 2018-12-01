<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clinic */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="help-block"></div>
<div class="box">
    <div class="box-header b-b">
        <h3>Thêm mới / Cập nhật phòng khám</h3>
    </div>
    <div class="box-body">

        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'status')->dropDownList(['0' => 'Đóng', '1' => 'Mở']) ?>

                <div class="col-sm-4 col-sm-offset-2">
                    <div class="form-group">
                        <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Lưu', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>