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
                <?= $form->field($model, 'ekip_id')->dropDownList($model->getListEkip(), ['prompt' => 'Vui Lòng Chọn']) ?>

                <?= $form->field($model, 'sale_id')->dropDownList($model->getListDirectSale(), ['prompt' => 'Vui Lòng Chọn']) ?>
            </div>
        </div>

        <div class="help-block"></div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'service_id')->dropDownList($model->getListService(), ['prompt' => 'Vui Lòng Chọn']) ?>

                <?php $districtList = [];
                if (!empty($model->service_id)) {
                    $districtList = ArrayHelper::map(\app\models\Product::find()->where(['service_id' => $model->service_id])->all(), 'id', 'name');
                } ?>

                <?= $form->field($model, 'product_id')->widget(DepDrop::classname(), [
                    'data' => $districtList,
                    'options' => ['id' => 'order-product_id', 'prompt' => 'Vui Lòng Chọn'],
                    'pluginOptions' => [
                        'depends' => ['order-service_id'],
                        'placeholder' => 'Vui Lòng Chọn',
                        'url' => Yii::$app->urlManager->createUrl(['order/product'])
                    ]
                ])?>

                <?= $form->field($model, 'color_id')->dropDownList($model->getListColor(), ['prompt' => 'Vui Lòng Chọn']) ?>

                <?= $form->field($model, 'price', ['inputOptions' => ['value' => Yii::$app->formatter->asDecimal($model->price)]])->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <?= $form->field($model, 'quantiy')->textInput() ?>

                <?= $form->field($model, 'discount')->textInput() ?>

                <?= $form->field($model, 'total_price')->textInput(['maxlength' => true, 'readonly' => true]) ?>

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
                    'formFields' => [
                        'money',
                    ],
                ]); ?>

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelCheckouts as $index => $modelCheckout): ?>
                        <div class="item"><!-- widgetBody -->
                            <?php
                            // necessary for update action.
                            if (!$modelCheckout->isNewRecord) {
                                echo Html::activeHiddenInput($modelCheckout, "[{$index}]id");
                            }
                            ?>
                            <?= $form->field($modelCheckout, "[{$index}]money")->textInput(['maxlength' => true])->label("Lần thanh toán " . ($index + 1)) ?>
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

</div>
