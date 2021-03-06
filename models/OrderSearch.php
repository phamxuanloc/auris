<?php

namespace app\models;

use app\controllers\OrderController;
use navatech\role\helpers\RoleChecker;
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
            [['id', 'customer_id', 'ekip_id', 'sale_id', 'service_id', 'product_id', 'color_id', 'quantity', 'status', 'type', 'payment_status', 'advisory_id'], 'integer'],
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
	    $boolean = RoleChecker::isAuth(OrderController::className(), 'view-all', Yii::$app->user->identity->getRoleId());
	    if(!$boolean) {
		    $this->sale_id = $this->user->id;
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
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'type' => $this->type,
            'total_payment' => $this->total_payment,
            'debt' => $this->debt,
        ]);

        if(isset($this->advisory_id) && !empty($this->advisory_id)){
            $query->andFilterWhere([
                'advisory_id' => $this->advisory_id,
            ]);
            $query->andFilterWhere(['or', ['status' => 4], ['status' => 5]]);
        }

        if(!$this->start_date){
            $this->start_date = date("d/m/Y");
        }
        if(!$this->end_date){
            $this->end_date = date("d/m/Y");
        }
        $start_date = \DateTime::createFromFormat('d/m/Y', $this->start_date);
        $end_date = \DateTime::createFromFormat('d/m/Y', $this->end_date);

        if (isset($_GET['type']) && $_GET['type'] == 1) {
            $date = date("d/m/Y", strtotime("-1 day"));
            $query->andFilterWhere(['=', 'DATE_FORMAT(created_date,\'%d/%m/%Y\')', $date]);
        } else if (isset($_GET['type']) && $_GET['type'] == 2) {
            $query->andFilterWhere(['=', 'DATE_FORMAT(created_date,\'%d/%m/%Y\')', date('d/m/Y')]);
        }else{
            $query->andFilterWhere(['between', "DATE(created_date)", $start_date->format('Y-m-d'), $end_date->format('Y-m-d')]);
        }

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
