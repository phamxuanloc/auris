<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KpiEkip */

$this->title = 'Thêm Kpi Ekip';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Ekips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-ekip-create">
    <div class="help-block"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title
    ]) ?>

</div>
