<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KpiSale;

/**
 * KpiSaleSearch represents the model behind the search form of `app\models\KpiSale`.
 */
class KpiSaleSearch extends KpiSale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sale_id', 'total_customer', 'att_point'], 'integer'],
            [['kpi', 'estimate_revenue', 'real_revenue'], 'number'],
            [['created_date', 'month'], 'safe'],
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
        $query = KpiSale::find();
        $query->select("month, sum(kpi) as kpi, sum(estimate_revenue) as estimate_revenue, sum(real_revenue) as real_revenue, sum(total_customer) as total_customer, sum(att_point) as att_point, sale_id");

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
            'kpi' => $this->kpi,
            'sale_id' => $this->sale_id,
            'created_date' => $this->created_date,
            'month' => $this->month,
            'estimate_revenue' => $this->estimate_revenue,
            'real_revenue' => $this->real_revenue,
            'total_customer' => $this->total_customer,
            'att_point' => $this->att_point,
        ]);

        $query->orderBy("date(month) DESC");
        $query->groupBy("date(month)");

        return $dataProvider;
    }
}
