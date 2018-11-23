<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Tạo lịch hẹn - điều trị";
$url = Yii::$app->urlManager->createUrl(['order/get-info'])
?>
<div class="help-block"></div>
<div class="box">
    <div class="box-header b-b">
        <h3>Cập nhật lịch hẹn - điều trị</h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <input id="url" value="<?= $url?>" type="hidden">
                <input id="treatmenthistory-order_id" name="TreatmentHistory[order_id]" type="hidden">
                <input id="treatmenthistory-customer_id" name="TreatmentHistory[customer_id]" type="hidden">

                <?= $form->field($model, 'order_code')->widget(\yii\jui\AutoComplete::classname(), [
                    'options' => ['class' => 'form-control'],
                    'clientOptions' => [
                        'source' => $model->getListOrder(),
                    ],
                ]) ?>

                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <?= $form->field($model, 'ekip_id', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->dropDownList($model->getListEkip(), ['prompt' => 'Tất cả'])->label("Ekip") ?>

                <?= $form->field($model, 'ap_date')->widget(DateTimePicker::className(),[
                    'name' => 'ap_date',
                    'type' => DateTimePicker::TYPE_INPUT,
                    'removeButton' => true,
                    'size' => 'lg',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'hh:ii:ss dd/mm/yyyy',
//                        'minView' => 1,
                        'startDate' => date('Y-m-d H:i:s')
                    ]
                ]) ?>

                <?= $form->field($model, 'note')->textarea(['rows' => '5']) ?>
                <?= $form->field($model, 'is_finish')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'treatment_direction')->textarea(['rows' => '5', 'readonly' => true]) ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4 col-sm-offset-2">
                <?= Html::a('<i class="fa fa-arrow-circle-o-left"></i> Quay lại', Yii::$app->urlManager->createUrl(['treatment-schedule/index']), ['class' => 'btn btn-success']) ?>
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Cập nhật', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
