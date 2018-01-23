<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KpiSale */

$this->title = 'Thêm Kpi Sale';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sale-create">
    <div class="help-block"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title
    ]) ?>

</div>
