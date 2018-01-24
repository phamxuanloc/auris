<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSale */

$this->title = 'Update Kpi Sale: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-sale-update">
    <div class="help-block"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title
    ]) ?>

</div>
