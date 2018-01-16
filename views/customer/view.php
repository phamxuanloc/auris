<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'customer_code',
            'getfly_id',
            'sex',
            'birthday',
            'phone',
            'customer_type',
            'debt',
            'note:ntext',
            'customer_img',
            'character_type',
            'status',
            'created_date',
            'getfly_date',
            'created_id',
            'update_id',
            'sale_id',
            'customer_status_id',
            'bl_pressure',
            'current_medicine',
            'current_treatment',
            'level_treatment',
            'other',
            'disire',
            'examination',
            'treatment_direction',
        ],
    ]) ?>

</div>
