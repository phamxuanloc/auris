<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "kpi_sale".
 *
 * @property int $id
 * @property int $sale_id
 * @property string $kpi
 * @property string $created_date
 * @property string $month
 * @property string $estimate_revenue
 * @property string $real_revenue
 * @property int $total_customer
 * @property int $att_point
 */
class KpiSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_id', 'kpi'], 'required'],
            [['sale_id', 'total_customer', 'att_point', 'month', 'year'], 'integer'],
            [['kpi', 'estimate_revenue', 'real_revenue'], 'number'],
            [['created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sale_id' => 'DirectSale',
            'kpi' => 'KPI',
            'created_date' => 'Created Date',
            'month' => 'Tháng',
            'estimate_revenue' => 'Doanh Thu Ước Tính',
            'real_revenue' => 'Doanh Thu Thực Tế',
            'total_customer' => 'Tổng Số Khách Hàng',
            'att_point' => 'Thái Độ Phục Vụ',
        ];
    }

    public function getListDirectSale()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'username');
    }

    public function getMonth()
    {
        return [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
        ];
    }
}
