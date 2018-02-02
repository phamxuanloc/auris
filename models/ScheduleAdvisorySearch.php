<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ScheduleAdvisory;

/**
 * ScheduleAdvisorySearch represents the model behind the search form of `app\models\ScheduleAdvisory`.
 */
class ScheduleAdvisorySearch extends ScheduleAdvisory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sale_id', 'status', 'customer_id'], 'integer'],
            [['customer_code', 'full_name', 'sex', 'birthday', 'phone', 'ap_date', 'note', 'start_date', 'end_date', 'created_date'], 'safe'],
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
        $query = ScheduleAdvisory::find();

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
            'birthday' => $this->birthday,
            'sale_id' => $this->sale_id,
            'status' => $this->status,
            'customer_id' => $this->customer_id,
        ]);
        $query->andFilterWhere(['between', 'DATE_FORMAT(created_date,\'%d/%m/%Y\')', $this->start_date, $this->end_date]);

        $query->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
