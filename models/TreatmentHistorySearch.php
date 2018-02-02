<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TreatmentHistory;

/**
 * TreatmentHistorySearch represents the model behind the search form of `app\models\TreatmentHistory`.
 */
class TreatmentHistorySearch extends TreatmentHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'customer_id', 'att_point', 'spect_point', 'ae_point', 'sale_id', 'ekip_id',], 'integer'],
            [['customer_code', 'customer_name', 'customer_phone', 'ap_date', 'real_start', 'real_end'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = TreatmentHistory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'order_id' => $this->order_id,
            'customer_id' => $this->customer_id,
            'ap_date' => $this->ap_date,
            'real_start' => $this->real_start,
            'real_end' => $this->real_end,
            'att_point' => $this->att_point,
            'spect_point' => $this->spect_point,
            'ae_point' => $this->ae_point,
        ]);

        $query->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_phone', $this->customer_phone]);

        return $dataProvider;
    }
}
