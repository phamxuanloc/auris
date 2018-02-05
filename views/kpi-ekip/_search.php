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
            <?= $form->field($model, 'ekip_id')->dropDownList($model->getListEkip(), ['prompt'=>'Tất cả'])->label("Lọc Theo DirectSale") ?>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
