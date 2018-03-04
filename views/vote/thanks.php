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
<!--<div class="video-background">-->
<!--	<div class="video-foreground">-->
<!--		<iframe src="https://www.youtube.com/embed/rt6_XdkSYEw?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=rt6_XdkSYEw" frameborder="0" allowfullscreen></iframe>-->
<!--		<iframe width='500' height='294' src="https://www.youtube.com/embed/rt6_XdkSYEw?&theme=dark&autoplay=1&keyboard=1&autohide=1&playlist=rt6_XdkSYEw&iv_load_policy=3"  frameborder="0" class="youtube-player" type="text/html"></iframe>-->
<div class="videoContainer">
	<video loop autoplay id="myVideo">
		<source src="uploads/Cover%20-%20Auris%20Dental%20-%20Viện%20Nha%20Khoa%20Thẩm%20Mỹ.mp4">
		Your browser does not support the video tag.
	</video>
</div>
<!--	</div>-->
<!--</div>-->

<!--<div id="vidtop-content">-->
<!--	<div class="vid-info">-->
<!--		Test-->
<!--	</div>-->
<!--</div>-->
<script>
	var sse = new EventSource("<?=Url::to(['realtime'])?>");
	sse.addEventListener('message', function(e) {
		sse.close();
		setTimeout(function() {
			window.location.href = "<?=Url::to(['index'])?>";
		}, 3000);
	}, false);
</script>