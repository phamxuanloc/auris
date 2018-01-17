<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TreatmentHistory */

$this->title = 'Create Treatment History';
$this->params['breadcrumbs'][] = ['label' => 'Treatment Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
