<?php

namespace app\models;

use app\controllers\ScheduleAdvisoryController;
use navatech\role\helpers\RoleChecker;
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
        $boolean = RoleChecker::isAuth(ScheduleAdvisoryController::className(), 'view-all', Yii::$app->user->identity->getRoleId());

        if (!$boolean) {
            $this->sale_id = $this->user->id;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'sale_id' => $this->sale_id,
            'status' => $this->status,
            'customer_id' => $this->customer_id,
        ]);
        if (isset($_GET['type']) && $_GET['type'] == 1) {
            $date = date("d/m/Y", strtotime("-1 day"));
            $query->andFilterWhere(['=', 'DATE_FORMAT(ap_date,\'%d/%m/%Y\')', $date]);
        } else if (isset($_GET['type']) && $_GET['type'] == 2) {
            $query->andFilterWhere(['=', 'DATE_FORMAT(ap_date,\'%d/%m/%Y\')', date('d/m/Y')]);
        } else {
            if(!empty($this->start_date) && !empty($this->start_date)){
                $start_date = str_replace('/', '-', $this->start_date);
                $start_date = date("Y/m/d", strtotime($start_date));
                $end_date = str_replace('/', '-', $this->end_date);
                $end_date = date("Y/m/d", strtotime($end_date));
                $query->andFilterWhere(['between', 'DATE_FORMAT(ap_date,\'%Y/%m/%d\')', $start_date, $end_date]);
            }else {
                if(!empty($this->full_name) || !empty($this->phone)){
                    $query->andFilterWhere(['like', 'full_name', $this->full_name]);
                    $query->andFilterWhere(['like', 'phone', $this->phone]);
                }else {
                    $query->andFilterWhere(['=', 'DATE_FORMAT(ap_date,\'%d/%m/%Y\')', date('d/m/Y')]);
                }
            }
        }

        $query->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
