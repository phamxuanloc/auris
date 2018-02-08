<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiEkipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-ekip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'id' => 'kpi-ekip-search-form'
    ]); ?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'ekip_id')->dropDownList($model->getListEkip(), ['prompt'=>'Tất cả'])->label("Lọc Theo Ekip") ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'start_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                'type' => \kartik\date\DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'mm/yyyy',
                ]
            ])->label("Từ tháng") ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'end_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                'type' => \kartik\date\DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'mm/yyyy',
                ]
            ])->label("Đến tháng") ?>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm', ['class' => 'btn btn-info']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
