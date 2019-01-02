<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DirectSale */

$this->title = 'Cập nhật: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Direct Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="direct-sale-update normal-table-list">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
