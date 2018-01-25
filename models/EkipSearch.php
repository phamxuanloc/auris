<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ekip;

/**
 * EkipSearch represents the model behind the search form of `app\models\Ekip`.
 */
class EkipSearch extends Ekip {

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[
				[
					'id',
					'status',
					'created_user',
					'update_user',
				],
				'integer',
			],
			[
				[
					'ekip_name',
					'created_date',
					'update_date',
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
		$query = Ekip::find();
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
		// grid filtering conditions
		$query->andFilterWhere([
			'id'           => $this->id,
			'status'       => $this::STATUS_DELETE,
			'created_date' => $this->created_date,
			'created_user' => $this->created_user,
			'update_date'  => $this->update_date,
			'update_user'  => $this->update_user,
			'end_date'     => $this->end_date,
		]);
		$query->andFilterWhere([
			'like',
			'ekip_name',
			$this->ekip_name,
		]);
		return $dataProvider;
	}
}
