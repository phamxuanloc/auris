<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
/**
 * @var yii\widgets\ActiveForm    $form
 * @var app\models\form\StaffForm $user
 */
use app\components\Model;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<?php if(!isset($_GET['id'])) { ?>
	<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>
<?php } ?>
<?= $form->field($user, 'password')->passwordInput() ?>

<?= $form->field($user, 're_pass')->passwordInput() ?>

<?= $form->field($user, 'avatar')->widget(FileInput::className(), [
	'options'       => ['accept' => 'image/*'],
	'pluginOptions' => [
		'allowedFileExtensions' => [
			'jpg',
			'gif',
			'png',
		],
		'showUpload'            => false,
		'initialPreview'        => Html::img(Yii::$app->urlManager->baseUrl . '/uploads/no_image_thumb.gif', ['class' => 'file-preview-image']),
	],
]); ?>
<?= $form->field($user, 'id_number')->textInput() ?>

<?= $form->field($user, 'front_id')->widget(FileInput::className(), [
	'options'       => ['accept' => 'image/*'],
	'pluginOptions' => [
		'allowedFileExtensions' => [
			'jpg',
			'gif',
			'png',
		],
		'showUpload'            => false,
		'initialPreview'        => Html::img(Yii::$app->urlManager->baseUrl . '/uploads/no_image_thumb.gif', ['class' => 'file-preview-image']),
	],
])->label('Mặt trước cmt'); ?>
<?= $form->field($user, 'back_id')->widget(FileInput::className(), [
	'options'       => ['accept' => 'image/*'],
	'pluginOptions' => [
		'allowedFileExtensions' => [
			'jpg',
			'gif',
			'png',
		],
		'showUpload'            => false,
		'initialPreview'        => Html::img(Yii::$app->urlManager->baseUrl . '/uploads/no_image_thumb.gif', ['class' => 'file-preview-image']),
	],
])->label('Mặt sau cmt'); ?>
<?= $form->field($user, 'phone')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'address')->textInput() ?>
