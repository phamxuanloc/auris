<?php

namespace app\editable;

use app\models\Order;
use app\models\ScheduleAdvisory;
use yii2mod\editable\EditableAction;

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 1/27/2018
 * Time: 10:53 PM
 */
class EditableController extends \yii\web\Controller {

	public function actions() {
		return [
			'change-sale'   => [
				'class'      => EditableAction::class,
				'modelClass' => ScheduleAdvisory::class,
			],
			'change-note'   => [
				'class'      => EditableAction::class,
				'modelClass' => ScheduleAdvisory::class,
			],
			'change-status' => [
				'class'      => EditableAction::class,
				'modelClass' => ScheduleAdvisory::class,
			],
            'change-type' => [
				'class'      => EditableAction::class,
				'modelClass' => Order::class,
			],
            'change-note-direct' => [
                'class'      => EditableAction::class,
                'modelClass' => ScheduleAdvisory::class,
            ],
		];
	}
}