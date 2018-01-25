<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ekip */

$this->title = 'Thêm mới Ekip';
$this->params['breadcrumbs'][] = ['label' => 'Ekips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ekip-create">
    <div class="help-block"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
