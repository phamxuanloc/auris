<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-index">
    <div class="header">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="content-header">
                        <div class="col-md-3">
                            <img class="img-responsive" src="<?= Yii::$app->request->baseUrl ?>/images/logo-vote.png"/>
                        </div>
                        <div class="col-md-9">
                            <div class="right">
                                <p>VIỆN CÔNG NGHỆ NHA KHOA AURIS XIN CẢM ƠN QUÝ KHÁCH HÀNG!</p>
                                <h3>Lê Thị B</h3>
                            </div>
                        </div>
                    </div>
                    <div class="content-content">
                        <p>Rất mong Quý khách dánh ít thời gian để đánh giá quá trình phục vụ của dịch vụ của nha khoa
                            Auris!</p>
                        <h2>TÍNH THẨM MỸ</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="embarrassed">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/images/embarrassed.png"/>
                                    <p>Không hài lòng</p>
                                    <span>Lựa chọn</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="embarrassed">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/images/thumbs-up.png"/>
                                    <p>Tốt</p>
                                    <span>Lựa chọn</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="embarrassed">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/images/happy.png"/>
                                    <p>Rất hài lòng</p>
                                    <span>Lựa chọn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
