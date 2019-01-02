<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Quản lý dịch vụ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index normal-table-list row">
    <div class="col-md-12">
        <div class="service-form col-sm-12">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-sm-3">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Tên dịch vụ'])->label(false) ?>
            </div>
            <div class="form-group col-sm-3">
                <?= Html::submitButton('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo dịch vụ', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div class="col-sm-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{pager}",
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'Id',
                    ],
                    'name',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
