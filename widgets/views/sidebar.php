<?php
/**
 * Created by PhpStorm.
 * User: luong
 * Date: 03/02/2017
 * Time: 11:12 AM
 */

use app\controllers\ColorController;
use app\controllers\CustomerController;
use app\controllers\KpiEkipController;
use app\controllers\KpiSaleController;
use app\controllers\OrderController;
use app\controllers\ProductController;
use app\controllers\ReportController;
use app\controllers\ScheduleAdvisoryController;
use app\controllers\ServiceController;
use app\controllers\TreatmentScheduleController;
use navatech\role\controllers\DefaultController;
use navatech\role\helpers\RoleChecker;
use yii\widgets\Menu;

?>

<?php
if(!Yii::$app->user->isGuest) {
	echo Menu::widget([
		'items'           => [
			[
				'label'   => '<span class="nav-icon">
                      <i class="material-icons">
                        <img style="width: 18px;" src="' . Yii::$app->request->baseUrl . '/images/message.png"/>
                      </i>
                    </span>',
				'url'     => '#',
				'items'   => [
					[
						'label' => 'Quản lý nhân viên',
						'url'   => ['/staff/index'],
					],
					[
						'label' => 'Phân quyền',
						'url'   => \yii\helpers\Url::to(['/role']),
					],
				],
				'visible' => RoleChecker::isAuth(DefaultController::className(), 'index', Yii::$app->user->identity->getRoleId()),
			],
			[
				'label' => '<span class="nav-icon">
                      <i class="material-icons">
                        <img style="width: 18px;" src="' . Yii::$app->request->baseUrl . '/images/ic-home.png"/>
                      </i>
                    </span>',
				'url'   => '#',
				'items' => [
					[
						'label'   => 'Lịch hẹn tư vấn mới',
						'url'     => ['/schedule-advisory/index'],
						'visible' => RoleChecker::isAuth(ScheduleAdvisoryController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Danh sách khách hàng',
						'url'     => ['/customer/index'],
						'visible' => RoleChecker::isAuth(CustomerController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Tạo khách hàng',
						'url'     => ['/customer/create'],
						'visible' => RoleChecker::isAuth(CustomerController::className(), 'create', Yii::$app->user->identity->getRoleId()),
					],
				],
			],
			[
				'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img style="width: 18px;" src="' . Yii::$app->request->baseUrl . '/images/icon-strikethrough.png"/>
                      </i>
                    </span>',
				'url'   => '#',
				'items' => [
					[
						'label'   => 'Quản lý dịch vụ',
						'url'     => ['/service/index'],
						'visible' => RoleChecker::isAuth(ServiceController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Quản lý sản phẩm',
						'url'     => ['/product/index'],
						'visible' => RoleChecker::isAuth(ProductController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Quản lý màu sắc',
						'url'     => ['/color/index'],
						'visible' => RoleChecker::isAuth(ColorController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
				],
			],
			//        [
			//            'label' => '<span class="nav-icon">
			//                      <i class="material-icons">
			//                           <img src="' . Yii::$app->request->baseUrl . '/images/ic-plus.png"/>
			//                      </i>
			//                    </span>',
			//            'url' => '#',
			//            'items' => [
			//                [
			//                    'label' => 'Quản lý ekip',
			//                    'url' => ['ekip/index']
			//                ],
			//                [
			//                    'label' => 'Quản lý nhân viên',
			//                    'url' => ['user/admin']
			//                ],
			////                [
			////                    'label' => 'Quản lý quyền hạn',
			////                    'url' => ['color/index']
			////                ],
			//            ]
			//        ],
			[
				'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img style="width: 18px;" src="' . Yii::$app->request->baseUrl . '/images/ic-coppy.png"/>
                      </i>
                    </span>',
				'url'   => '#',
				'items' => [
					[
						'label'   => 'Tạo đợn hàng',
						'url'     => ['/order/create'],
						'visible' => RoleChecker::isAuth(OrderController::className(), 'create', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Quản lý đơn hàng',
						'url'     => ['/order/index'],
						'visible' => RoleChecker::isAuth(OrderController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Thêm lịch điều trị',
						'url'     => ['/treatment-schedule/create'],
						'visible' => RoleChecker::isAuth(TreatmentScheduleController::className(), 'create', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Quản lý lịch điều trị',
						'url'     => ['/treatment-schedule/index'],
						'visible' => RoleChecker::isAuth(TreatmentScheduleController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
				],
			],
			[
				'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img style="width: 18px;" src="' . Yii::$app->request->baseUrl . '/images/ic-plus.png"/>
                      </i>
                    </span>',
				'url'   => '#',
				'items' => [
					[
						'label'   => 'Doanh thu tổng quan',
						'url'     => ['/report/index'],
						'visible' => RoleChecker::isAuth(ReportController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
				],
			],
			[
				'label' => '<span class="nav-icon">
                      <i class="material-icons">
                           <img style="width: 18px;" src="' . Yii::$app->request->baseUrl . '/images/ic-report.png"/>
                      </i>
                    </span>',
				'url'   => '#',
				'items' => [
					[
						'label'   => 'Kpi Sale',
						'url'     => ['/kpi-sale/index'],
						'visible' => RoleChecker::isAuth(KpiSaleController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
					[
						'label'   => 'Kpi Ekip',
						'url'     => ['/kpi-ekip/index'],
						'visible' => RoleChecker::isAuth(KpiEkipController::className(), 'index', Yii::$app->user->identity->getRoleId()),
					],
				],
			],
		],
		'options'         => ['class' => 'nav'],
		'encodeLabels'    => false,
		'activateParents' => true,
		'activeCssClass'  => 'open active',
		'submenuTemplate' => '<ul class="submenu">{items}</ul>',
	]);
}
?>
