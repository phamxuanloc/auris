<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\helpers\Html;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 */
$this->title                   = Yii::t('user', 'Create a staff account');
$this->params['breadcrumbs'][] = [
	'label' => Yii::t('user', 'Staff'),
	'url'   => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', [
	'module' => Yii::$app->getModule('user'),
]) ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php $form = ActiveForm::begin([
					'layout'                 => 'horizontal',
					'enableAjaxValidation'   => true,
					'enableClientValidation' => false,
					'options'                => [
						'enctype' => 'multipart/form-data',
					],
					'fieldConfig'            => [
						'horizontalCssClasses' => [
							'wrapper' => 'col-sm-6',
						],
					],
				]); ?>

				<?= $this->render('_staff', [
					'form' => $form,
					'user' => $user,
				]) ?>

				<div class="form-group">
					<div class="col-lg-offset-3 col-lg-9">
						<?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
					</div>
				</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
