<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = 'Thanks';
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
								<h3 id="customer-name"></h3>
							</div>
						</div>
					</div>
					<div class="content-content">
						<p>Rất mong Quý khách dánh ít thời gian để đánh giá quá trình phục vụ của dịch vụ của nha khoa
							Auris!</p>
						<h2 id="vote-title" style="text-transform: uppercase">Xin cảm ơn và hẹn gặp lại</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var sse = new EventSource("<?=Url::to(['realtime'])?>");
	sse.addEventListener('message', function(e) {
		setTimeout(function() {
			window.location.href = "<?=Url::to(['index'])?>";
		}, 3000);
	}, false);
</script>