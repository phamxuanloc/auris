<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\SidebarWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="app">

	<!-- ############ LAYOUT START-->

	<!-- aside -->
	<div class="app-aside modal fade folded md nav-dropdown">
		<!-- fluid app aside -->
		<div class="left navside dark dk indigo-900" layout="column">
			<div class="navbar no-radius">
				<!-- brand -->
				<a class="navbar-brand">
					<img src="<?= Yii::$app->request->baseUrl ?>/images/logo.png" alt=".">
				</a>
				<!-- / brand -->
			</div>
			<div flex class="hide-scroll">
			</div>
		</div>
	</div>
	<!-- / -->

	<!-- content -->
	<div id="content" class="app-content box-shadow-z0" role="main">
		<div class="app-header white box-shadow">
			<div class="navbar">
				<!-- Open side - Naviation on mobile -->
				<a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
					<i class="material-icons">&#xe5d2;</i>
				</a>
				<!-- / -->
				<!-- Page title - Bind to $state's title -->
				<div class="navbar-item pull-left" id="pageTitle">
					<!-- navbar collapse -->
					<!-- / navbar collapse -->
				</div>

				<!-- navbar right -->
				<ul class="nav navbar-nav pull-right">
					<li class="nav-item dropdown">


					</li>
					<li class="nav-item hidden-md-up">
						<a class="nav-link" data-toggle="collapse" data-target="#collapse">
							<i class="material-icons">&#xe5d4;</i>
						</a>
					</li>
				</ul>
				<!-- / navbar right -->
			</div>
		</div>
		<div ui-view class="app-body" id="view">

			<!-- ############ PAGE START-->
			<div class="padding">
				<?= $content ?>
			</div>

			<!-- ############ PAGE END-->

		</div>
	</div>
	<!-- / -->

	<!-- ############ LAYOUT END-->

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
