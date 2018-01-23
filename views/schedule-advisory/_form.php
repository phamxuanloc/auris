<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScheduleAdvisory */
/* @var $form yii\widgets\ActiveForm */
$url = Yii::$app->urlManager->createUrl(['customer/get-info']);
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
                <input id="url" value="<?= $url?>" type="hidden">
                <input id="scheduleadvisory-customer_id" name="ScheduleAdvisory[customer_id]" type="hidden">
                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sex')->dropDownList(['1' => 'Nam', '2' => 'Nữ']) ?>

                <?= $form->field($model, 'birthday')->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy/mm/dd'
                    ]
                ]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'ap_date')->widget(\kartik\datetime\DateTimePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy/mm/dd H:i:s'
                    ]
                ]) ?>

                <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale()) ?>

                <?= $form->field($model, 'status')->dropDownList(['3' => 'Chưa đến', '1' => 'Thành công', '2' => 'Không làm']) ?>

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
