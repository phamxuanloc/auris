<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = 'Quản lý dịch vụ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="service-form col-sm-12">

		<?php $form = ActiveForm::begin(); ?>
		<div class="col-sm-3">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
		</div>
		<div class="form-group col-sm-3">
			<?= Html::submitButton('Tạo dịch vụ', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
	<div class="col-sm-6">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			//		'filterModel'  => $searchModel,
			'columns'      => [
				[
					'class'  => 'yii\grid\SerialColumn',
					'header' => 'Id',
				],
				'name',
				[
					'class'    => 'yii\grid\ActionColumn',
					'template' => '{delete}',
				],
			],
		]); ?>
	</div>
</div>
