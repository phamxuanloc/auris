<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DirectSale */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Direct Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direct-sale-view">

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
            'username',
            'email:email',
            'password_hash',
            'auth_key',
            'confirmed_at',
            'unconfirmed_email:email',
            'blocked_at',
            'registration_ip',
            'created_at',
            'updated_at',
            'flags',
            'role_id',
            'last_login_at',
        ],
    ]) ?>

</div>
