<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScheduleAdvisorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-advisory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-lg-6 control-label'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <?= $form->field($model, 'sale_id', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->dropDownList($model->getListDirectSale(), ['prompt' => 'Tất cả'])->label("Lọc Theo DirectSale") ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'start_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ]
                ])->label("Từ ngày") ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'end_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ]
                ])->label("Đến ngày") ?>
            </div>

            <div class="col-md-1">
                <a class="btn btn-danger" href="<?= Yii::$app->urlManager->createUrl(['schedule-advisory/index', 'type' => 1])?>">Hôm qua</a>
            </div>
            <div class="col-md-1">
                <a class="btn btn-warning" href="<?= Yii::$app->urlManager->createUrl(['schedule-advisory/index', 'type' => 2])?>">Hôm nay</a>
            </div>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
