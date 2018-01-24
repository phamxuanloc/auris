<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ekip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ekips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ekip-view">

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
            'ekip_name',
            'status',
            'created_date',
            'created_user',
            'update_date',
            'update_user',
            'end_date',
        ],
    ]) ?>

</div>
