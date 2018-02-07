<?php

namespace app\models;

use app\controllers\KpiEkipController;
use navatech\role\helpers\RoleChecker;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KpiEkip;

/**
 * KpiEkipSearch represents the model behind the search form of `app\models\KpiEkip`.
 */
class KpiEkipSearch extends KpiEkip
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ekip_id', 'spect_point', 'ae_point', 'total_time'], 'integer'],
            [['ekip_name', 'month', 'created_date'], 'safe'],
            [['estimate_revenue', 'real_revenue', 'total_customer', 'kpi'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = KpiEkip::find();
        $query->select("month, sum(kpi) as kpi, sum(estimate_revenue) as estimate_revenue, sum(real_revenue) as real_revenue, sum(total_customer) as total_customer, sum(spect_point) as spect_point, sum(ae_point) as ae_point, sum(total_time) as total_time, ekip_id");

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
	    $boolean = RoleChecker::isAuth(KpiEkipController::className(), 'view-all', Yii::$app->user->identity->getRoleId());

	    if(!$boolean) {
		    $this->ekip_id = $this->user->id;
	    }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ekip_id' => $this->ekip_id,
            'estimate_revenue' => $this->estimate_revenue,
            'real_revenue' => $this->real_revenue,
            'total_customer' => $this->total_customer,
            'spect_point' => $this->spect_point,
            'ae_point' => $this->ae_point,
            'total_time' => $this->total_time,
            'month' => $this->month,
            'created_date' => $this->created_date,
            'kpi' => $this->kpi,
        ]);

        $query->andFilterWhere(['like', 'ekip_name', $this->ekip_name]);
        $query->orderBy("id DESC");

        return $dataProvider;
    }
}
