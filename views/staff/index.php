<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = 'Direct Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direct-sale-index normal-table-list">
	<div class="help-block"></div>

	<p>
		<?= Html::a('<i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'layout'       => "{items}\n{pager}",
		'columns'      => [
			['class' => 'yii\grid\SerialColumn'],
			'username',
			'full_name',
			'email:email',
			[
				'attribute' => 'role_id',
				'value'     => function (\app\models\User $data) {
					return $data->role->name;
				},
			],
			[
				'class'    => 'yii\grid\ActionColumn',
				'template' => '{update}{delete}',
			],
		],
	]); ?>
</div>
