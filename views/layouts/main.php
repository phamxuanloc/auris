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
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img style="height: 34px;" src="<?= Yii::$app->request->baseUrl ?>/images/logo.png"
                                     alt=""/></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item nc-al">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <span><i class="notika-icon notika-alarm"></i></span>
                                <div class="ntd-ctn"><span>2</span></div>
                            </a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>Notification</h2>
                                </div>
                                <div class="hd-message-info">
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
<!--                                                <img src="img/post/1.jpg" alt=""/>-->
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>David Belle</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
<!--                                                <img src="img/post/2.jpg" alt=""/>-->
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Jonathan Morris</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
<!--                                                <img src="img/post/4.jpg" alt=""/>-->
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Fredric Mitchell</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
<!--                                                <img src="img/post/1.jpg" alt=""/>-->
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>David Belle</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
<!--                                                <img src="img/post/2.jpg" alt=""/>-->
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Glenn Jecobs</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="hd-mg-va">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 13px;" href="<?= Yii::$app->urlManager->createUrl(['site/logout'])?>">Xin chào <?= Yii::$app->user->identity->username?> Thoát</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li>
                                <a data-toggle="collapse" data-target="#employees" href="#">Quản lý nhân viên</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.html">Dashboard One</a></li>
                                    <li><a href="index-2.html">Dashboard Two</a></li>
                                    <li><a href="index-3.html">Dashboard Three</a></li>
                                    <li><a href="index-4.html">Dashboard Four</a></li>
                                    <li><a href="analytics.html">Analytics</a></li>
                                    <li><a href="widgets.html">Widgets</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#customer" href="#">Email</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="inbox.html">Inbox</a></li>
                                    <li><a href="view-email.html">View Email</a></li>
                                    <li><a href="compose-email.html">Compose Email</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#service" href="#">Interface</a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li><a href="animations.html">Animations</a></li>
                                    <li><a href="google-map.html">Google Map</a></li>
                                    <li><a href="data-map.html">Data Maps</a></li>
                                    <li><a href="code-editor.html">Code Editor</a></li>
                                    <li><a href="image-cropper.html">Images Cropper</a></li>
                                    <li><a href="wizard.html">Wizard</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#order" href="#">Charts</a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li><a href="flot-charts.html">Flot Charts</a></li>
                                    <li><a href="bar-charts.html">Bar Charts</a></li>
                                    <li><a href="line-charts.html">Line Charts</a></li>
                                    <li><a href="area-charts.html">Area Charts</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" href="<?= Yii::$app->urlManager->createUrl(['calendar/index']) ?>">Tables</a></li>
                            <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                <ul id="demo" class="collapse dropdown-header-top">
                                    <li><a href="form-elements.html">Form Elements</a></li>
                                    <li><a href="form-components.html">Form Components</a></li>
                                    <li><a href="form-examples.html">Form Examples</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                    <li><a href="notification.html">Notifications</a>
                                    </li>
                                    <li><a href="alert.html">Alerts</a>
                                    </li>
                                    <li><a href="modals.html">Modals</a>
                                    </li>
                                    <li><a href="buttons.html">Buttons</a>
                                    </li>
                                    <li><a href="tabs.html">Tabs</a>
                                    </li>
                                    <li><a href="accordion.html">Accordion</a>
                                    </li>
                                    <li><a href="dialog.html">Dialogs</a>
                                    </li>
                                    <li><a href="popovers.html">Popovers</a>
                                    </li>
                                    <li><a href="tooltips.html">Tooltips</a>
                                    </li>
                                    <li><a href="dropdown.html">Dropdowns</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                <ul id="Pagemob" class="collapse dropdown-header-top">
                                    <li><a href="contact.html">Contact</a>
                                    </li>
                                    <li><a href="invoice.html">Invoice</a>
                                    </li>
                                    <li><a href="typography.html">Typography</a>
                                    </li>
                                    <li><a href="color.html">Color</a>
                                    </li>
                                    <li><a href="login-register.html">Login Register</a>
                                    </li>
                                    <li><a href="404.html">404 Page</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-menu-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="<?php if (Yii::$app->controller->id == 'clinic' || Yii::$app->controller->id == 'staff' || Yii::$app->controller->module->id == 'role') {
                        echo 'active';
                    } ?>">
                        <a data-toggle="tab" href="#employees"><i class="notika-icon notika-house"></i> Quản lý nhân
                            viên</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'schedule-advisory' || Yii::$app->controller->id == 'customer') {
                        echo 'active';
                    } ?>">
                        <a data-toggle="tab" href="#customer"><i class="notika-icon notika-support"></i> Quản lý khách
                            hàng</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'service' || Yii::$app->controller->id == 'product' || Yii::$app->controller->id == 'color') {
                        echo 'active';
                    } ?>">
                        <a data-toggle="tab" href="#service"><i class="notika-icon notika-app"></i> Quản lý dịch vụ</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'order' || Yii::$app->controller->id == 'treatment-schedule') {
                        echo 'active';
                    } ?>">
                        <a data-toggle="tab" href="#order"><i class="notika-icon notika-promos"></i> Quản lý đơn
                            hàng</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'calendar') {
                        echo 'active';
                    } ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl(['calendar/index']) ?>"><i
                                    class="notika-icon notika-edit"></i> Khung thời gian</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'report') {
                        echo 'active';
                    } ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl(['report/index']) ?>"><i
                                    class="notika-icon notika-bar-chart"></i> Doanh thu</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'kpi-sale' || Yii::$app->controller->id == 'kpi-ekip') {
                        echo 'active';
                    } ?>">
                        <a data-toggle="tab" href="#kpi"><i class="notika-icon notika-finance"></i> KPI</a>
                    </li>
                    <li class="<?php if (Yii::$app->controller->id == 'checkpoint') {
                        echo 'active';
                    } ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl(['checkpoint/index']) ?>"><i
                                    class="notika-icon notika-edit"></i> Check point</a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="employees"
                         class="tab-pane <?php if (Yii::$app->controller->id == 'clinic' || Yii::$app->controller->id == 'staff' || Yii::$app->controller->module->id == 'role') {
                             echo 'in active';
                         } ?> notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['clinic/index']) ?>">Quản lý phòng
                                    khám</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['staff/index']) ?>">Quản lý nhân viên</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['role']) ?>">Phân quyền</a>
                            </li>
                        </ul>
                    </div>
                    <div id="customer"
                         class="tab-pane <?php if (Yii::$app->controller->id == 'schedule-advisory' || Yii::$app->controller->id == 'customer') {
                             echo 'in active';
                         } ?> notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['schedule-advisory/index']) ?>">Lịch hẹn
                                    tư vấn mới</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['customer/index']) ?>">Danh sách khách
                                    hàng</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['customer/design']) ?>">Thiết kế nụ
                                    cười</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['customer/create']) ?>">Tạo khách
                                    hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div id="service"
                         class="tab-pane <?php if (Yii::$app->controller->id == 'service' || Yii::$app->controller->id == 'product' || Yii::$app->controller->id == 'color') {
                             echo 'in active';
                         } ?> notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['service/index']) ?>">Quản lý dịch vụ</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['product/index']) ?>">Quản lý sản
                                    phẩm</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['color/index']) ?>">Quản lý màu sắc</a>
                            </li>
                        </ul>
                    </div>
                    <div id="order"
                         class="tab-pane <?php if (Yii::$app->controller->id == 'order' || Yii::$app->controller->id == 'treatment-schedule') {
                             echo 'in active';
                         } ?> notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['order/create']) ?>">Tạo đơn hàng</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['order/index']) ?>">Quản lý đơn hàng</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['treatment-schedule/create']) ?>">Thêm
                                    lịch điều trị</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['treatment-schedule/index']) ?>">Quản lý
                                    lịch điều trị</a>
                            </li>
                        </ul>
                    </div>
                    <div id="kpi"
                         class="tab-pane <?php if (Yii::$app->controller->id == 'kpi-sale' || Yii::$app->controller->id == 'kpi-ekip') {
                             echo 'in active';
                         } ?> notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['kpi-sale/index']) ?>">KPI Sale</a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(['kpi-ekip/index']) ?>">KPI Ekip</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="app">
    <!-- ############ PAGE START-->
    <div class="padding">
        <?= $content ?>
    </div>
    <!-- ############ PAGE END-->
</div>
<!-- / -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
