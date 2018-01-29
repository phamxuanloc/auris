<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DirectSale */

$this->title = 'Thêm mới Direct Sale';
$this->params['breadcrumbs'][] = ['label' => 'Direct Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direct-sale-create">
    <div class="help-block"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
