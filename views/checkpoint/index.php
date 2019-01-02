<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clinics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkpoint-index normal-table-list">
    <div class="row">
        <?php foreach ($model as $item) { ?>
            <div style="line-height: 68px;" class="user col-md-2">
                <?= $item->name ?>
            </div>
            <div class="block-status-order col-md-10">
                <div class="box-status status0">
                    <div class="step1 col-md-2 col-sm-2">
                        <i class="fa fa-fw fa-check"></i>
                        <span>Tạo khách hàng</span>
                    </div>
                    <div class="step2 <?= $item->step >= 2 ? 'step-active' : '';?> col-md-2 col-sm-2">
                        <i class="fa fa-fw fa-check"></i>
                        <span>Thiết kế nụ cười</span>
                    </div>
                    <div class="step3 <?= $item->step >= 3 ? 'step-active' : '';?> col-md-2 col-sm-2">
                        <i class="fa fa-fw fa-check"></i>
                        <span>Tư vấn</span>
                    </div>
                    <div class="step4 <?= $item->step >= 4 ? 'step-active' : '';?> col-md-2 col-sm-2">
                        <i class="fa fa-fw fa-check"></i>
                        <span>Tạo đơn hàng</span>
                    </div>
                    <div class="step5 <?= $item->step >= 5 ? 'step-active' : '';?> col-md-2 col-sm-2">
                        <i class="fa fa-fw fa-check"></i>
                        <span>Lịch điều trị</span>
                    </div>
                    <div class="step6 <?= $item->step >= 6 ? 'step-active' : '';?> col-md-2 col-sm-2">
                        <i class="fa fa-fw fa-check"></i>
                        <span>Hoàn thành</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
        <?php } ?>
    </div>
</div>
