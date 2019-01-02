<?php

use yii\helpers\Html;
use yii\grid\GridView;
use navatech\role\helpers\RoleChecker;
use app\controllers\CustomerController;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index normal-table-list">
    <div class="help-block"></div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute' => 'customer_code',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->customer_code, Yii::$app->urlManager->createUrl(['customer/uploads', 'id' => $model->id]));
                }
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{uploads}'],
        ],
    ]); ?>
</div>
