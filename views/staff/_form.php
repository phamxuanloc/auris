<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DirectSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
	<div class="box-header b-b">
	</div>

	<div class="box-body">
		<?php $form = ActiveForm::begin([
			'layout'                 => 'horizontal',
			'enableAjaxValidation'   => true,
			'enableClientValidation' => true,
		]); ?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Tên đăng nhập') ?>

		<?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label('Họ và tên') ?>
		<?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Số điện thoại') ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'role_id')->dropDownList(\app\models\Role::getRoleArray())->label('Loại tài khoản') ?>

		<?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('Mật khẩu') ?>
		<div class="form-group">
			<?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>
