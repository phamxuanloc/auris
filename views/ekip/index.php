<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EkipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = 'Quản lý Ekips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ekip-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="ekip-form col-sm-12">

		<?php $form = ActiveForm::begin(); ?>
		<div class="col-sm-4">
			<?= $form->field($model, 'ekip_name')->textInput(['maxlength' => true])->label(false) ?>
		</div>
		<div class="form-group col-sm-3">
			<?= Html::submitButton('Tạo ekip', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		//		'filterModel'  => $searchModel,
		'columns'      => [
			[
				'class'  => 'yii\grid\SerialColumn',
				'header' => 'ID',
			],
			'ekip_name',
			'created_date',
			//'update_date',
			//'update_user',
			//'end_date',
			['class'    => 'yii\grid\ActionColumn',
			 'template' => '{delete}',
			],
		],
	]); ?>
</div>
