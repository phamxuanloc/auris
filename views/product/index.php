<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = 'Quản lý sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<div class="product-form">

		<?php $form = ActiveForm::begin(); ?>
		<div class="col-sm-3">
			<?= $form->field($model, 'name')->textInput([
				'maxlength'   => true,
				'placeholder' => 'Tên sản phẩm',
			])->label(false) ?>
		</div>
		<div class="col-sm-3">
			<?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map($service, 'id', 'name'))->label(false) ?>
		</div>
		<div class="col-sm-3">
			<?= $form->field($model, 'price')->textInput([
				'maxlength'   => true,
				'placeholder' => 'Đơn giá',
			])->label(false) ?>
		</div>
		<div class="form-group col-sm-3">
			<?= Html::submitButton('Tạo sản phẩm', ['class' => 'btn btn-success']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		//		'filterModel'  => $searchModel,
		'columns'      => [
			[
				'class'  => 'yii\grid\SerialColumn',
				'header' => 'Id',
			],
			'name',
			'service_id',
			'price',
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
