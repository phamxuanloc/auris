<?php
/**
 * Created by PhpStorm.
 * User: luong
 * Date: 03/02/2017
 * Time: 11:12 AM
 */
use yii\widgets\Menu;

?>

<?php
echo Menu::widget([
    'items' => [
        [
            'label' => 'Lịch hẹn tư vấn',
            'url' => ['/order/index'],
            'template' => '<a href="{url}"><span class="nav-icon">
                      <i class="material-icons">
                        <img src="'.Yii::$app->request->baseUrl.'/images/ic-home.png"/>
                      </i>
                    </span><span class="nav-text"> {label}</span></a>',
        ],
        [
            'label' => 'Device',
            'url' => ['/device/index'],
            'template' => '<a href="{url}"><span class="nav-icon">
                      <i class="material-icons">
                           <img src="'.Yii::$app->request->baseUrl.'/images/icon-strikethrough.png"/>
                      </i>
                    </span><span class="nav-text"> {label}</span></a>',
        ],
        [
            'label' => 'Khách hàng',
            'url' => ['/customer/index'],
            'template' => '<a href="{url}"><span class="nav-icon">
                      <i class="material-icons">
                        <img src="'.Yii::$app->request->baseUrl.'/images/ic-coppy.png"/>
                      </i>
                    </span><span class="nav-text"> {label}</span></a>',
        ],
        [
            'label' => 'Quản lý quảng cáo',
            'url' => ['ads/index'],
            'template' => '<a href="{url}"><span class="nav-icon">
                      <i class="material-icons">
                           <img src="'.Yii::$app->request->baseUrl.'/images/ic-evelope.png"/>
                      </i>
                    </span><span class="nav-text"> {label}</span></a>',
        ],
        [
            'label' => 'Thống kê',
            'url' => ['site/report'],
            'template' => '<a href="{url}"><span class="nav-icon">
                      <i class="material-icons">
                        <img src="'.Yii::$app->request->baseUrl.'/images/ic-plus.png"/>
                      </i>
                    </span><span class="nav-text"> {label}</span></a>',
        ],
        [
            'label' => 'Thống kê',
            'url' => ['site/report'],
            'template' => '<a href="{url}"><span class="nav-icon">
                      <i class="material-icons">
                        <img src="'.Yii::$app->request->baseUrl.'/images/ic-report.png"/>
                      </i>
                    </span><span class="nav-text"> {label}</span></a>',
        ],
    ],
    'options' => ['class' => 'nav'],
    'encodeLabels' => false,
    'activateParents' => true,
    'activeCssClass' => 'open active',
    'submenuTemplate' => '<ul class="submenu">{items}</ul>',
]);
?>
