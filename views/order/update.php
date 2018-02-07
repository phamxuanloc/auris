<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
$this->title = 'Cập nhật đơn hàng : ' . $model->order_code;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .control-label").each(function(index) {
        jQuery(this).html("Lần thanh toán: " + (index + 1))
    });
});';

$this->registerJs($js);
?>
<div class="order-update">
    <div class="help-block"></div>

    <div class="box">
        <div class="box-header b-b" style="display: flex;">
            <h3><?= $this->title ?></h3>
            <a class="btn btn-primary" style="position: absolute;right: 20px;top: 7px;"
               href="<?= Yii::$app->urlManager->createUrl(['treatment-schedule/create', 'order_id' => $model->id]) ?>">Tạo
                lịch điều trị</a>
        </div>

        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'id' => 'dynamic-form',
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
                            <td class="col-sm-9"><?= @$model->ekip->full_name ?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-3 control-label">Direct Sale</td>
                            <td class="col-sm-9"><?= @$model->sale->full_name ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div style="padding-top: 40px;"></div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'service_id')->dropDownList($model->getListService()) ?>

                    <?= $form->field($model, 'product_id')->dropDownList($model->getListProduct()) ?>

                    <?= $form->field($model, 'color_id')->dropDownList($model->getListColor()) ?>

                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'quantiy')->dropDownList($model->getQuantity()) ?>

                    <?= $form->field($model, 'discount')->textInput() ?>

                    <?= $form->field($model, 'total_price')->textInput() ?>

                </div>
                <div class="clearfix"></div>
                <div class="help-block"></div>
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsCheckouts[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'money',
                        'cash_type',
                    ],
                ]); ?>

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsCheckouts as $index => $modelCheckout): ?>
                        <div class="item clearfix"><!-- widgetBody -->
                            <?php
                            if (!$modelCheckout->isNewRecord) {
                                echo Html::activeHiddenInput($modelCheckout, "[{$index}]id");
                            }
                            ?>
                            <div class="col-md-6">
                                <?= $form->field($modelCheckout, "[{$index}]money", ['template' => "{label}\n<div class=\"col-lg-6\">{input}</div>"])->textInput(['maxlength' => true])->label("Lần thanh toán " . ($index + 1)) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($modelCheckout, "[{$index}]cash_type", ['template' => "<div class=\"col-lg-12\">{input}</div>"])->radioList(['1' => 'Tiền mặt', '2' => 'Thẻ'])->label(false) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-offset-6">
                    <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i>
                        Thêm
                        thanh toán
                    </button>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, "type")->radioList(['0' => 'Đang làm', '1' => 'Đã xong'])->label('Trạng thái') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
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
                            <tr>
                                <td><?= $history->note ?></td>
                                <td><?= $history->real_start ?></td>
                                <td><?= $history->real_end ?></td>
                                <td><?= $history->att_point ?></td>
                                <td><?= $history->spect_point ?></td>
                                <td><?= $history->ae_point ?></td>
                            </tr>
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
