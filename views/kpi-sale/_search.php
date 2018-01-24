<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'id' => 'kpi-search-form'
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale(), ['prompt'=>'Tất cả'])->label("Lọc Theo DirectSale") ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
