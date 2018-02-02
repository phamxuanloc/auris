<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = 'Vote';
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
						<h2 id="vote-title" style="text-transform: uppercase"></h2>
						<div class="row vote-icon">
							<div class="col-md-4">
								<div class="embarrassed" id="vote-bad" point="-3">
									<img src="<?= Yii::$app->request->baseUrl ?>/images/embarrassed.png"/>
									<p>Không hài lòng</p>
									<span>Lựa chọn</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="embarrassed" id="vote-good" point="1">
									<img src="<?= Yii::$app->request->baseUrl ?>/images/thumbs-up.png"/>
									<p>Tốt</p>
									<span>Lựa chọn</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="embarrassed" id="vote-excellent" point="2">
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

<script>
	var sse  = new EventSource("<?=Url::to(['realtime'])?>");
	var id   = null;
	var type = null;
	sse.addEventListener('message', function(e) {
		const data = $.parseJSON(e.data);
		$('#customer-name').html(data.name);
		$('#vote-title').html(data.title);
		id   = data.id;
		type = data.type;
		if(id !== null) {
			$('.vote-icon').show();
		}

	}, false);
	if(id === null) {
		$('.vote-icon').hide();
	} else {
		$('.vote-icon').show();
	}
	$('.embarrassed').click(function() {
		sse.close();
		var point;
		point = parseInt($(this).attr('point'));
		$.ajax({
			type    : 'POST',
			url     : "<?=\yii\helpers\Url::to([
				'vote',
			])?>",
			async   : true,
			data    : {
				id   : id,
				type : type,
				point: point
			}
			,
			dataType: 'json',
			success : function(data) {
				if(data === 0) {
					window.location.href = "<?=Url::to(['thanks'])?>"
				} else {
					window.location.href = "<?=Url::to(['index'])?>"
				}
			}
		});
	})
</script>
