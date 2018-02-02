<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <div class="help-block"></div>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <?= $form->field($modelSearch, 'start_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ]
                ])->label("Từ ngày") ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($modelSearch, 'end_date', ['template' => '{label} <div class="col-sm-6">{input}</div>'])->widget(\kartik\date\DatePicker::className(), [
                    'type' => \kartik\date\DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ]
                ])->label("Đến ngày") ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h6>Doanh thu tổng quan</h6>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Số Lượng Khách Hàng</th>
                    <th>Doanh Thu Ước Tính</th>
                    <th>Doanh Thu Thực Tế</th>
                    <th>Doanh Thu Ước Tính 1 KH</th>
                    <th>Doanh Thu Thực Tế 1 KH</th>
                </tr>
                </thead>
                <?php
                $totalCustomer = 0;
                $totalPrice = 0;
                $totalPayment = 0;
                foreach ($model as $history) {
                    $totalCustomer += $history->id;
                    $totalPrice += $history->total_price;
                    $totalPayment += $history->total_payment;
                }?>

                <tbody>
                <tr>
                    <td style="font-size: 20px;font-weight: 600">Tổng cộng</td>
                    <td style="font-size: 20px;font-weight: 600"><?= number_format($totalCustomer, '0', ',', '.')?></td>
                    <td style="color:red;font-size: 20px;font-weight: 600"><?= number_format($totalPrice, '0', ',', '.')?></td>
                    <td style="color: green;font-size: 20px;font-weight: 600"><?= number_format($totalPayment, '0', ',', '.')?></td>
                    <td style="color:red;font-size: 20px;font-weight: 600"><?= $totalCustomer != 0 ? number_format( $totalPrice / $totalCustomer, '0', ',', '.') : 0?></td>
                    <td style="color: green;font-size: 20px;font-weight: 600"><?= $totalCustomer != 0 ? number_format($totalPayment / $totalCustomer, '0', ',', '.') : 0?></td>
                </tr>
                <?php foreach ($model as $history) { ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($history->created_date))?></td>
                        <td><?= number_format($history->id)?></td>
                        <td style="color:red"><?= $history->total_price?></td>
                        <td style="color: green;"><?= number_format($history->total_payment, '0', ',', '.')?></td>
                        <td style="color:red"><?= number_format($history->total_price / $history->id, '0', ',', '.')?></td>
                        <td style="color: green;"><?= number_format($history->total_payment / $history->id, '0', ',', '.')?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
