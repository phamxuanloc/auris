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
        <h3>Tạo lịch hẹn - điều trị</h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <div class="row">
            <div class="col-md-9">
                <input id="url" value="<?= $url?>" type="hidden">

                <?= $form->field($model, 'order_code')->textInput(['maxlength' => true, ]) ?>

                <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'treatment_time')->widget(DateTimePicker::className(),[
                    'name' => 'treatment_time',
                    'type' => DateTimePicker::TYPE_INPUT,
                    'removeButton' => true,
                    'size' => 'lg',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy/mm/dd hh:ii'
                    ]
                ]) ?>

                <?= $form->field($model, 'note')->textarea(['rows' => '5']) ?>
            </div>
        </div>

        <div class="form-group row m-t-lg">
            <div class="col-sm-4 col-sm-offset-2">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Tạo lịch điều trị', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
