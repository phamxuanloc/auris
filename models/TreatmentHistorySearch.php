<?php

namespace app\models;

use app\controllers\TreatmentScheduleController;
use navatech\role\helpers\RoleChecker;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TreatmentHistory;

/**
 * TreatmentHistorySearch represents the model behind the search form of `app\models\TreatmentHistory`.
 */
class TreatmentHistorySearch extends TreatmentHistory {

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[
				[
					'id',
					'order_id',
					'customer_id',
					'att_point',
					'spect_point',
					'ae_point',
					'sale_id',
					'ekip_id',
				],
				'integer',
			],
			[
				[
					'customer_code',
					'customer_name',
					'customer_phone',
					'ap_date',
					'real_start',
					'real_end',
					'created_date',
					'start_date',
					'end_date',
				],
				'safe',
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query   = TreatmentHistory::find();
		$boolean = RoleChecker::isAuth(TreatmentScheduleController::className(), 'view-all', Yii::$app->user->identity->getRoleId());
		// add conditions that should always apply here
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		$this->load($params);
		if(!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}
		if($this->user->role_id == $this::ROLE_SALE) {
			$this->sale_id = $this->user->id;
		} elseif($this->user->role_id == $this::ROLE_EKIP) {
			$this->ekip_id = $this->user->id;
		}
		// grid filtering conditions
		$query->andFilterWhere([
			'id'          => $this->id,
			'order_id'    => $this->order_id,
			'sale_id'     => $this->sale_id,
			'ekip_id'     => $this->ekip_id,
			'customer_id' => $this->customer_id,
			'ap_date'     => $this->ap_date,
			'real_start'  => $this->real_start,
			'real_end'    => $this->real_end,
			'att_point'   => $this->att_point,
			'spect_point' => $this->spect_point,
			'ae_point'    => $this->ae_point,
		]);
		if(!$this->start_date) {
			$this->start_date = date("d/m/Y", strtotime("-1 month"));
		}
		if(!$this->end_date) {
			$this->end_date = date("d/m/Y");
		}
		$start_date = \DateTime::createFromFormat('d/m/Y', $this->start_date);
		$end_date   = \DateTime::createFromFormat('d/m/Y', $this->end_date);

        if (isset($_GET['type']) && $_GET['type'] == 1) {
            $date = date("d/m/Y", strtotime("-1 day"));
            $query->andFilterWhere(['=', 'DATE_FORMAT(ap_date,\'%d/%m/%Y\')', $date]);
        } else if (isset($_GET['type']) && $_GET['type'] == 2) {
            $query->andFilterWhere(['=', 'DATE_FORMAT(ap_date,\'%d/%m/%Y\')', date('d/m/Y')]);
        } else {
            $query->andFilterWhere([
                'between',
                "DATE(ap_date)",
                $start_date->format('Y-m-d'),
                $end_date->format('Y-m-d'),
            ]);
        }
		$query->andFilterWhere([
			'like',
			'customer_code',
			$this->customer_code,
		])->andFilterWhere([
			'like',
			'customer_name',
			$this->customer_name,
		])->andFilterWhere([
			'like',
			'customer_phone',
			$this->customer_phone,
		]);
		return $dataProvider;
	}
}
