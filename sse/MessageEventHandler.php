<?php
/**
 * Created by PhpStorm.
 * User: locpx
 * Date: 18/01/2018
 * Time: 09:17
 */

namespace app\sse;

use app\models\TreatmentHistory;
use odannyc\Yii2SSE\SSEBase;

class MessageEventHandler extends SSEBase {

	public function check() {

		$history = TreatmentHistory::find()->where(['is_finish' => 1])->andWhere([
			'or',
			['att_point' => null],
			['spect_point' => null],
			['ae_point' => null],
		])->one();
		return $history;
	}

	public function update() {
		$history = TreatmentHistory::find()->where(['is_finish' => 1])->andWhere([
			'or',
			['att_point' => null],
			['spect_point' => null],
			['ae_point' => null],
		])->one();
		$title   = 'Xin cảm ơn';
		$type    = null;
		if($history->att_point == null) {
			$title = TreatmentHistory::VOTE_TYPE[TreatmentHistory::ATT_POINT];
			$type  = TreatmentHistory::ATT_POINT;
		} elseif($history->spect_point == null) {
			$title = TreatmentHistory::VOTE_TYPE[TreatmentHistory::SPECT_POINT];
			$type  = TreatmentHistory::SPECT_POINT;
		} elseif($history->ae_point == null) {
			$title = TreatmentHistory::VOTE_TYPE[TreatmentHistory::AE_POINT];
			$type  = TreatmentHistory::AE_POINT;
		}
		$customer = $history->customer;
		$data     = [
			'name'  => $customer->name,
			'title' => $title,
			'id'    => $history->id,
			'type'  => $type,
		];
		return json_encode($data);
	}
}