<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScheduleAdvisory */
/* @var $form yii\widgets\ActiveForm */
$url = Yii::$app->urlManager->createUrl(['customer/get-info']);
//print_r($model->getListCustomer());exit;
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
                <input id="url" value="<?= $url ?>" type="hidden">
                <input id="scheduleadvisory-customer_id" name="ScheduleAdvisory[customer_id]" type="hidden">

<!--                --><?php //= $form->field($model, 'customer_code')->widget(\yii\jui\AutoComplete::classname(), [
//                    'options' => ['class' => 'form-control'],
//                    'clientOptions' => [
//                        'source' => $model->getListCustomer(),
//                    ],
//                ]) ?>

                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sex')->dropDownList(['2' => 'Nữ', '1' => 'Nam']) ?>

                <?= $form->field($model, 'birthday')->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
//                        'format' => 'dd/mm/yyyy'
                    ]
                ]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'ap_date')->widget(\kartik\datetime\DateTimePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
//                        'format' => 'dd/mm/yyyy H:i:s',
                        'startDate' => date('Y-m-d')
                    ]
                ]) ?>

                <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale()) ?>

                <?= $form->field($model, 'status')->dropDownList(['1' => 'Chưa đến', '2' => 'Đã nhắc', '3' => 'Không đến', '4' => 'Không làm', '5' => 'Đồng ý']) ?>

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
</div>
