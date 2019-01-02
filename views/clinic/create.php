<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Clinic */

$this->title = 'Phòng khám';
$this->params['breadcrumbs'][] = ['label' => 'Clinics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinic-create normal-table-list">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
