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
<div class="video-background">
	<div class="video-foreground">
		<iframe src="https://www.youtube.com/embed/rt6_XdkSYEw?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=rt6_XdkSYEw" frameborder="0" allowfullscreen></iframe>
	</div>
</div>

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