<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TreatmentSchedule */

$this->title = 'Update Treatment Schedule: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Treatment Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treatment-schedule-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
