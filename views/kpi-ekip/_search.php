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
        <div class="col-md-6">
            <?= $form->field($model, 'ekip_id')->dropDownList($model->getListEkip(), ['prompt'=>'Tất cả'])->label("Lọc Theo Ekip") ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'month')->dropDownList($model->getMonth(), ['prompt' => 'Vui lòng chọn']) ?>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm', ['class' => 'btn btn-info']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
