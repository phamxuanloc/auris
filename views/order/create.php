<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Thêm mới đơn hàng';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create normal-table-list">
    <div class="help-block"></div>
    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
        'is_role'=>$is_role,
        'modelCheckouts' => $modelCheckouts,
        'modelServices' => $modelServices,
    ]) ?>

</div>
