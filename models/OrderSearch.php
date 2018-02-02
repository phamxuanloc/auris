<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'ekip_id', 'sale_id', 'service_id', 'product_id', 'color_id', 'quantiy', 'status', 'type', 'payment_status'], 'integer'],
            [['customer_code', 'customer_name', 'customer_phone', 'note', 'order_code', 'start_date', 'created_date', 'end_date'], 'safe'],
            [['price', 'total_price', 'total_payment', 'debt'], 'number'],
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
        $query = Order::find();

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
            'customer_id' => $this->customer_id,
            'ekip_id' => $this->ekip_id,
            'sale_id' => $this->sale_id,
            'service_id' => $this->service_id,
            'product_id' => $this->product_id,
            'color_id' => $this->color_id,
            'price' => $this->price,
            'quantiy' => $this->quantiy,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'type' => $this->type,
            'total_payment' => $this->total_payment,
            'debt' => $this->debt,
        ]);

//        $query->andFilterWhere(['>=', 'DATE(created_date)', date("Y-m-d", strtotime($this->start_date))]);
//        $query->andFilterWhere(['<=', 'DATE(created_date)', date("Y-m-d", strtotime($this->end_date))]);

        $start_date = \DateTime::createFromFormat('d/m/Y', $this->start_date);
        $end_date = \DateTime::createFromFormat('d/m/Y', $this->end_date);
        $query->andFilterWhere(['between', "DATE(created_date)", $start_date->format('Y-m-d'), $end_date->format('Y-m-d')]);

        $query->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'order_code', $this->order_code])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_phone', $this->customer_phone])
            ->andFilterWhere(['like', 'note', $this->note]);

        if($this->payment_status != "") {
            if ($this->payment_status == 1) {
                $query->andFilterCompare("`total_payment` - `total_price`", ">= 0");
            } elseif ($this->payment_status == 0) {
                $query->andFilterCompare("`total_payment` - `total_price`", "< 0");
            }
        }

        return $dataProvider;
    }
}
