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
<!--<iframe onload="loadImage()" src="https://www.youtube.com/embed/rt6_XdkSYEw" frameborder="0" allowfullscreen></iframe>-->
<!--		<iframe width='500' height='294' src="https://www.youtube.com/embed/rt6_XdkSYEw?&theme=dark&autoplay=1&keyboard=1&autohide=1&playlist=rt6_XdkSYEw&iv_load_policy=3"  frameborder="0" class="youtube-player" type="text/html"></iframe>-->
<!--<div class="videoContainer">-->
<!--<video id="myVideo" autoplay muted loop playsinline>-->
<!--	<source src="uploads/Cover%20-%20Auris%20Dental%20-%20Viện%20Nha%20Khoa%20Thẩm%20Mỹ.mp4">-->
<!--	Your browser does not support the video tag.-->
<!--</video>-->
<img class="full-gif" src="uploads/test.gif">
<!--<button onclick="abc()">play</button>-->
<!--</div>-->
<!--	</div>-->
<!--</div>-->

<!--<div id="vidtop-content">-->
<!--	<div class="vid-info">-->
<!--		Test-->
<!--	</div>-->
<!--</div>-->
<script>
	var vid = document.getElementById("myVideo");
	function abc() {
		$('#myVideo').get(0).play()
	}
	//	$(document).ready(function() {
	//		$("button").trigger("click");
	//	});
	var sse = new EventSource("<?=Url::to(['realtime'])?>");
	sse.addEventListener('message', function(e) {
		sse.close();
		setTimeout(function() {
			window.location.href = "<?=Url::to(['index'])?>";
		}, 3000);
	}, false);
</script>