<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use dektrium\user\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View               $this
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch         $searchModel
 */
$this->title                   = Yii::t('user', 'Danh sách Nhân viên');
$this->params['breadcrumbs'][] = $this->title;
?>
<?//= $this->render('/admin/_menu') ?>

<?php Pjax::begin() ?>

<?= GridView::widget([
	'dataProvider' => $dataProvider,
	//	'filterModel'  => $searchModel,
	'layout'       => "{items}\n{pager}",
	'columns'      => [
		[
			'class' => 'yii\grid\SerialColumn',
			//			'header' => 'STT',
		],
		[
			'attribute' => 'avatar',
			'filter'    => false,
			'format'    => 'html',
			'value'     => function (\app\models\User $data) {
				return Html::img($data->getPictureUrl('avatar'), [
					'width'  => '100px',
					'height' => '70px',
				]);
			},
		],
		'username',
		[
			'attribute' => 'created_at',
			'filter'    => false,
			'value'     => function ($model) {
				if(extension_loaded('intl')) {
					return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
				} else {
					return date('Y-m-d G:i:s', $model->created_at);
				}
			},
		],
		//		[
		//			'attribute' => 'role_id',
		//			'value'     => function (\app\models\User $data) {
		//				return $data->role->name;
		//			},
		//			'filter'    => \app\components\Model::ROLE,
		//			'header'    => 'Loại tài khoản',
		//		],
		[
			'header'  => Yii::t('user', 'Confirmation'),
			'value'   => function ($model) {
				if($model->isConfirmed) {
					return '<div class="text-center">
                                <span class="text-success">' . Yii::t('user', 'Confirmed') . '</span>
                            </div>';
				} else {
					return Html::a(Yii::t('user', 'Confirm'), [
						'confirm',
						'id' => $model->id,
					], [
						'class'        => 'btn btn-xs btn-success btn-block',
						'data-method'  => 'post',
						'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
					]);
				}
			},
			'format'  => 'raw',
			'visible' => Yii::$app->getModule('user')->enableConfirmation,
		],
		[
			'header' => Yii::t('user', 'Block status'),
			'value'  => function ($model) {
				if($model->isBlocked) {
					return Html::a(Yii::t('user', 'Unblock'), [
						'block',
						'id' => $model->id,
					], [
						'class'        => 'btn btn-xs btn-success btn-block',
						'data-method'  => 'post',
						'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
					]);
				} else {
					return Html::a(Yii::t('user', 'Block'), [
						'block',
						'id' => $model->id,
					], [
						'class'        => 'btn btn-xs btn-danger btn-block',
						'data-method'  => 'post',
						'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
					]);
				}
			},
			'format' => 'raw',
		],
		[
			'class'    => 'yii\grid\ActionColumn',
			'template' => '{delete}',
		],
	],
]); ?>

<?php Pjax::end() ?>
