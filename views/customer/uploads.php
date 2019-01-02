<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\Model;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Thiết kế nụ cười"

?>

<div class="box normal-table-list">
    <div class="box-header b-b">
        <h3>Thiết kế nụ cười - <?= $model->clinic->name?></h3>
    </div>

    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="box-header">
                    <h6>Thông tin khách hàng</h6>
                </div>

                <?= $form->field($model, 'customer_code')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['readonly' => true]) ?>
            </div>
            <div class="col-md-6">
                <div class="box-header">
                    <h6>Upload ảnh</h6>
                </div>
                <?= $form->field($model, 'listImage', ['wrapperOptions' => ['class' => 'col-md-12 col-sm-offset-0']])->widget(
                    \trntv\filekit\widget\Upload::className(),
                    [
                        'url' => ['/file-storage/upload'],
                        'sortable' => true,
                        'maxFileSize' => 10000000, // 10 MiB
                        'maxNumberOfFiles' => 10
                    ])->label(false) ?>

                <ul id="lightSlider" style="text-align: center;">
                    <?php if (!empty($model->media)) { ?>
                        <?php foreach ($model->media as $item) { ?>
                            <li data-thumb="<?= Yii::$app->params['urlImage'] . $item->url ?>">
                                <img width="400"
                                     src="<?= Yii::$app->params['urlImage'] . $item->url ?>"/>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row m-t-lg">
            <div class="col-sm-4 col-md-offset-2">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thông tin', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
