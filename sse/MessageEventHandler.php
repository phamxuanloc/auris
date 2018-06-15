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
		$history        = TreatmentHistory::find()->where(['is_finish' => 1])->where([
			'not',
			['real_end' => null],
		])->andWhere([
			'or',
			['att_point' => null],
			['spect_point' => null],
			['ae_point' => null],
		])->one();
		$history_finish = TreatmentHistory::find()->where(['is_finish' => 0])->andWhere([
			'not',
			['real_end' => null],
		])->andWhere([
			'or',
			['att_point' => null],
		])->one();
		$tracking       = false;
		if($history || $history_finish) {
			$tracking = true;
		}
		return true;
	}

	public function update() {
		$history = TreatmentHistory::find()->where(['is_vote' => 1])->andWhere([
			'not',
			['real_end' => null],
		])->andWhere([
			'or',
			[
				'att_point' => null,
				'is_finish' => 0,
			],
			[
				'att_point' => null,
			],
			[
				'spect_point' => null,
				'is_finish'   => 1,
			],
			[
				'ae_point'  => null,
				'is_finish' => 1,
			],
		])->one();
		$title   = 'Xin cảm ơn';
		$type    = null;
		if($history->att_point == null) {
			$title = TreatmentHistory::VOTE_TYPE[TreatmentHistory::ATT_POINT];
			$type  = TreatmentHistory::ATT_POINT;
		} elseif($history->spect_point == null && $history->is_finish == 1) {
			$title = TreatmentHistory::VOTE_TYPE[TreatmentHistory::SPECT_POINT];
			$type  = TreatmentHistory::SPECT_POINT;
		} elseif($history->ae_point == null && $history->is_finish == 1) {
			$title = TreatmentHistory::VOTE_TYPE[TreatmentHistory::AE_POINT];
			$type  = TreatmentHistory::AE_POINT;
		}
		//		$customer = $history->customer;
		$data = [
			'name'  => $history->customer_name,
			'title' => $title,
			'id'    => $history->id,
			'type'  => $type,
		];
		return json_encode($data);
	}
}