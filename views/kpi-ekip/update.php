<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KpiEkip */

$this->title = 'Update Kpi Ekip: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Ekips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-ekip-update normal-table-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
