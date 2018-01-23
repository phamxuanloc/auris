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
            'label' => '<span class="nav-icon">
                      <i class="material-icons">
                        <img src="' . Yii::$app->request->baseUrl . '/images/ic-home.png"/>
                      </i>
                    </span>',
            'url' => '#',
            'items' => [
                [
                    'label' => 'Lịch hẹn tư vấn mới',
                    'url' => ['schedule-advisory/index']
                ],
                [
                    'label' => 'Danh sách khách hàng',
                    'url' => ['customer/index']
                ],
                [
                    'label' => 'Tạo khách hàng',
                    'url' => ['customer/create']
                ],
            ]
        ],
        [
            'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img src="' . Yii::$app->request->baseUrl . '/images/icon-strikethrough.png"/>
                      </i>
                    </span>',
            'url' => '#',
            'items' => [
                [
                    'label' => 'Quản lý dịch vụ',
                    'url' => ['service/index']
                ],
                [
                    'label' => 'Quản lý sản phẩm',
                    'url' => ['product/index']
                ],
                [
                    'label' => 'Quản lý màu sắc',
                    'url' => ['color/create']
                ],
            ]
        ],
        [
            'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img src="' . Yii::$app->request->baseUrl . '/images/ic-coppy.png"/>
                      </i>
                    </span>',
            'url' => '#',
            'items' => [
                [
                    'label' => 'Tạo đợn hàng',
                    'url' => ['order/create']
                ],
                [
                    'label' => 'Quản lý đơn hàng',
                    'url' => ['order/index']
                ],
                [
                    'label' => 'Thêm lịch điều trị',
                    'url' => ['treatment-schedule/create']
                ],
                [
                    'label' => 'Quản lý lịch điều trị',
                    'url' => ['treatment-schedule/index']
                ],
            ]
        ],
        [
            'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img src="' . Yii::$app->request->baseUrl . '/images/ic-plus.png"/>
                      </i>
                    </span>',
            'url' => '#',
            'items' => [
                [
                    'label' => 'Doanh thu tổng quan',
                    'url' => ['report/index']
                ],
            ]
        ],
        [
            'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img src="' . Yii::$app->request->baseUrl . '/images/ic-report.png"/>
                      </i>
                    </span>',
            'url' => '#',
            'items' => [
                [
                    'label' => 'Kpi Sale',
                    'url' => ['kpi-sale/index']
                ],
                [
                    'label' => 'Kpi Ekip',
                    'url' => ['kpi-ekip/index']
                ],
            ]
        ],
    ],
    'options' => ['class' => 'nav'],
    'encodeLabels' => false,
    'activateParents' => true,
    'activeCssClass' => 'open active',
    'submenuTemplate' => '<ul class="submenu">{items}</ul>',
]);
?>
