<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
$url = Yii::$app->urlManager->createUrl(['customer/get-info']);
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .control-label").each(function(index) {
        jQuery(this).html("Lần thanh toán: " + (index + 1))
    });
});';

$this->registerJs($js);
?>

<div class="box">
    <div class="box-header b-b">
        <h3><?= $title ?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'dynamic-form',
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <input id="url" value="<?= $url ?>" type="hidden">
                <input id="order-customer_id" name="Order[customer_id]" type="hidden">

                <?= $form->field($model, 'customer_code')->widget(\yii\jui\AutoComplete::classname(), [
                    'options' => ['class' => 'form-control'],
                    'clientOptions' => [
                        'source' => $model->getListCustomer(),
                    ],
                ]) ?>

                <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true, 'readonly' => true]) ?>
            </div>
            <div class="col-md-6">

                <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale(), ['prompt' => 'Vui Lòng Chọn']) ?>

                <?= $form->field($model, 'advisory_id')->dropDownList($model->getListAdvisory(), ['prompt' => 'Vui Lòng Chọn']) ?>
            </div>
        </div>

        <div class="help-block"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix"></div>
                <div class="help-block"></div>
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper_service', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items_service', // required: css class selector
                    'widgetItem' => '.item_service', // required: css class
                    'limit' => 4, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item_service', // css class
                    'deleteButton' => '.remove-item_service', // css class
                    'model' => $modelServices[0],
                    'formId' => 'dynamic-form',
                    'id' => 'service-form',
                    'formFields' => [
                        'money',
                    ],
                ]); ?>


                <div class="container-items_service"><!-- widgetContainer -->
                    <?php foreach ($modelServices as $index => $modelService): ?>
                        <div class="item_service clearfix"><!-- widgetBody -->
                            <?php
                            // necessary for update action.
                            if (!$modelService->isNewRecord) {
                                echo Html::activeHiddenInput($modelService, "[{$index}]id");
                            }
                            ?>
                            <?php $districtList = [];
                            if (!empty($model->service_id)) {
                                $districtList = ArrayHelper::map(\app\models\Product::find()->where(['service_id' => $model->service_id])->all(), 'id', 'name');
                            } ?>

                            <?= $form->field($modelService, "[{$index}]service_id")->dropDownList($model->getListService(), ['prompt' => 'Vui Lòng Chọn'])->label("Dịch vụ") ?>

                            <?= $form->field($modelService, "[{$index}]product_id")->widget(DepDrop::classname(), [
                                'data' => $districtList,
                                'options' => ['id' => "order-{$index}-product_id", 'prompt' => 'Vui Lòng Chọn', "onchange" => "changeProduct(this.id)"],
                                'pluginOptions' => [
                                    'depends' => ["orderservice-{$index}-service_id"],
                                    'placeholder' => 'Vui Lòng Chọn',
                                    'url' => Yii::$app->urlManager->createUrl(['order/product'])
                                ]
                            ])->label("Sản phẩm") ?>

                            <?= $form->field($modelService, "[{$index}]color_id")->dropDownList($model->getListColor(), ['prompt' => 'Vui Lòng Chọn'])->label("Màu sắc") ?>

                            <?= $form->field($modelService, "[{$index}]price", ['inputOptions' => ['value' => Yii::$app->formatter->asDecimal($model->price)]])->textInput(['maxlength' => true, 'readonly' => true])->label("Đơn giá") ?>

                            <?= $form->field($modelService, "[{$index}]quantity")->textInput(['onchange' => "changeQuantity(this.id)"])->label("Số lượng") ?>

                            <div style="border-top:1px solid #ccc"></div>
                            <div class="help-block"></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="clearfix"></div>
                <div class="col-lg-offset-9">
                    <button type="button" class="add-item_service btn btn-success btn-xs"><i class="fa fa-plus"></i>
                        Thêm dịch vụ
                    </button>
                </div>
                <?php DynamicFormWidget::end(); ?>
                <div class="help-block"></div>

                <?= $form->field($model, "discount")->textInput() ?>

                <?= $form->field($model, "total_price")->textInput(['maxlength' => true, 'readonly' => true]) ?>
            </div>

            <div class="clearfix"></div>
            <div class="help-block"></div>
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelCheckouts[0],
                'formId' => 'dynamic-form',
                'id' => 'dynamic-form_checkout',
                'formFields' => [
                    'money',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelCheckouts as $index => $modelCheckout): ?>
                    <div class="item clearfix"><!-- widgetBody -->
                        <?php
                        // necessary for update action.
                        if (!$modelCheckout->isNewRecord) {
                            echo Html::activeHiddenInput($modelCheckout, "[{$index}]id");
                        }
                        ?>
                        <div class="col-md-6">
                            <?= $form->field($modelCheckout, "[{$index}]money")->textInput(['maxlength' => true, "onkeyup" => "changeValue(this.value, this)"])->label("Lần thanh toán " . ($index + 1)) ?>
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
    </div>

    <div class="form-group row m-t-lg">
        <div class="col-sm-4 col-sm-offset-2">
            <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Tạo đơn hàng', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
