<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TreatmentSchedule */
$this->title                   = 'Update Treatment Schedule: {nameAttribute}';
$this->params['breadcrumbs'][] = [
	'label' => 'Treatment Schedules',
	'url'   => ['index'],
];
$this->params['breadcrumbs'][] = [
	'label' => $model->id,
	'url'   => [
		'view',
		'id' => $model->id,
	],
];
$this->params['breadcrumbs'][] = 'Update';
$js                            = <<<JS
$('#chat-form').submit(function() {

     var form = $(this);

     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
               $("#message-field").val("");
          }
     });
     $(".chat-box").stop().animate({ scrollTop: $(".chat-box")[0].scrollHeight}, 1000);


     return false;
});



JS;
$this->registerJs($js, \yii\web\View::POS_READY)
?>
<div class="row">
	<div class="col-sm-8 col-xs-12 floatright">
		<div class="box box-success">
			<div class="box-header">
				<i class="fa fa-comments-o"></i>
				<h3 class="box-title">Chat</h3>
				<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
					<div class="btn-group" data-toggle="btn-toggle">
					</div>
				</div>
			</div>

			<?= Html::beginForm([
				'treatment-schedule/chat',
				'id' => $model->id,
			], 'POST', [
				'id' => 'chat-form',
			]) ?>

			<div class="box-body chat chat-box" id="chat-box">
				<!-- chat item -->
				<?php foreach($query as $chat):
					if($chat->user_id == Yii::$app->user->id) {
						$avatar = false;
						$class  = 'me';
					} else {
						$avatar = true;
						$class  = 'friend';
					}
					?>

					<div class="item">
						<div> &nbsp;</div>
						<div> &nbsp;</div>
						<?php if($avatar) { ?>
							<img src="<?= Yii::$app->avatar->show($chat->username, 32); ?>" alt="user image" class="online"/>
							<div class="message <?= $class; ?>">
								<a href="#" class="name">
									<?= $chat->username ?>
								</a>
								<?= $chat->message; ?>
							</div>
						<?php } else { ?>

							<div class="message <?= $class; ?>">
								<a href="#" class="name">
									<?= $chat->username ?>
								</a>
								<?= $chat->message; ?>
							</div>
						<?php } ?>

					</div>
				<?php endforeach ?>
				<div id="append"></div>
			</div><!-- /.chat -->
			<div class="box-footer">
				<div class="input-group">
					<?= Html::textInput('message', null, [
						'id'          => 'message-field',
						'class'       => 'form-control',
						'placeholder' => 'Text here..',
					]) ?>
					<div class="input-group-btn">
						<?= Html::submitButton('Send', [
							'class' => 'btn btn-block btn-success',
						]) ?>
					</div>
				</div>
			</div>
			<?= Html::endForm() ?>
		</div>
	</div>
</div><!-- /.box (chat box) -->
<div class="treatment-schedule-update">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>

<script type="text/javascript">
	// $(document).ready(function() {
		$(".chat-box").scrollTop(99999999);

		var socket = io.connect('http://quanly.auris.vn/socket.io/');

		socket.on('auris', function(data) {

			var message = JSON.parse(data);
			console.log(message);

			session = <?php print Yii::$app->user->id; ?>

			if(message.session == session) {
				$("#append").append(
					'<div class="item">' +
					'<div>&nbsp;</div>' +
					'<div>&nbsp;</div>' +
					'<p class="message me">' +
					'<a href="#" class="name">' +
					message.user +
					'</a>' +
					message.message +
					'</p>' +
					'</div>'
				);
			} else {
				$("#append").append(
					'<div class="item">' +
					'<img src="' + message.user_ava + '" alt="user image" class="online"/>' +
					'<p class="message friend">' +
					'<a href="#" class="name">' +
					message.user +
					'</a>' +
					message.message +
					'</p>' +
					'</div>'
				);
				notifyMe(message.user_ava);

			}

		});

	// });

	function notifyMe(ava) {
		if(Notification.permission !== "granted") {
			Notification.requestPermission();
		} else {
			var notification = new Notification('Notification title', {
				icon: ava,
				body: "Hey there! You've been notified!",
			});

			notification.onclick = function() {
				// window.open("http://localhost/yii2-realtime-chat-example/web/");
			};

		}

	}

</script>