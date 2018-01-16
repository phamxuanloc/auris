<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'getfly_id', 'sex', 'customer_type', 'character_type', 'status', 'created_id', 'update_id', 'sale_id', 'customer_status_id'], 'integer'],
            [['name', 'customer_code', 'birthday', 'phone', 'note', 'customer_img', 'created_date', 'getfly_date', 'bl_pressure', 'current_medicine', 'current_treatment', 'level_treatment', 'other', 'disire', 'examination', 'treatment_direction'], 'safe'],
            [['debt'], 'number'],
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
        $query = Customer::find();

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
            'getfly_id' => $this->getfly_id,
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'customer_type' => $this->customer_type,
            'debt' => $this->debt,
            'character_type' => $this->character_type,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'getfly_date' => $this->getfly_date,
            'created_id' => $this->created_id,
            'update_id' => $this->update_id,
            'sale_id' => $this->sale_id,
            'customer_status_id' => $this->customer_status_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'customer_img', $this->customer_img])
            ->andFilterWhere(['like', 'bl_pressure', $this->bl_pressure])
            ->andFilterWhere(['like', 'current_medicine', $this->current_medicine])
            ->andFilterWhere(['like', 'current_treatment', $this->current_treatment])
            ->andFilterWhere(['like', 'level_treatment', $this->level_treatment])
            ->andFilterWhere(['like', 'other', $this->other])
            ->andFilterWhere(['like', 'disire', $this->disire])
            ->andFilterWhere(['like', 'examination', $this->examination])
            ->andFilterWhere(['like', 'treatment_direction', $this->treatment_direction]);

        return $dataProvider;
    }
}
