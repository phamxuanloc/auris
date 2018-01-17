<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Cập nhật đơn hàng : ' . $model->order_code;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">
    <div class="help-block"></div>

    <div class="box">
        <div class="box-header b-b">
            <h3><?= $this->title ?></h3>
        </div>

        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'layout' => 'horizontal',
            ]); ?>

            <div class="row">
                <div class="col-md-6">
                    <table style="width: 100%;">
                        <tr>
                            <td class="col-sm-3 control-label">Mã Số KH</td>
                            <td class="col-sm-9"><?= $model->customer_code ?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 control-label">Họ và tên</td>
                            <td class="col-sm-9"><?= $model->customer_name ?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 control-label">Số Điện Thoại</td>
                            <td class="col-sm-9"><?= $model->customer_phone ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table style="width: 100%">
                        <tr>
                            <td class="col-sm-3 control-label">Ekip Phục Vụ</td>
                            <td class="col-sm-9"><?= $model->ekip->ekip_name ?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 control-label">Direct Sale</td>
                            <td class="col-sm-9"><?= $model->sale->username ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div style="padding-top: 40px;"></div>
            <div class="row">
                <div class="col-md-7">
                    <?= $form->field($model, 'service_id')->dropDownList($model->getListService()) ?>

                    <?= $form->field($model, 'product_id')->dropDownList($model->getListProduct()) ?>

                    <?= $form->field($model, 'color_id')->dropDownList($model->getListColor()) ?>
                </div>
                <div class="col-md-5">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'quantiy')->dropDownList($model->getQuantity()) ?>

                    <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <?= $form->field($model, 'note')->textarea(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box-header">
                        <h6>Lịch sử điều trị</h6>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Lịch Khám (ghi chú)</th>
                            <th>Bắt Đầu</th>
                            <th>Kết Thúc</th>
                            <th>Thái Độ</th>
                            <th>Chuyên Môn</th>
                            <th>Thẩm Mỹ</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($model->treatmentHistory as $history) { ?>
                            <tr></tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group row m-t-lg">
                <div class="col-sm-4 col-sm-offset-2">
                    <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>
