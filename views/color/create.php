<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Color */

$this->title = 'Thêm mới Color';
$this->params['breadcrumbs'][] = ['label' => 'Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-create">
    <div class="help-block"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
