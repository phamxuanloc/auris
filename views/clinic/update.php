<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clinic */

$this->title = 'Cập nhật phòng khám: ' . $model->name;
$this->params['breadcrumbs'][] = 'Phòng khám';
?>
<div class="clinic-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
