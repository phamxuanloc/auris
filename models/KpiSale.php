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
            [['sale_id', 'total_customer', 'att_point'], 'integer'],
            [['kpi', 'estimate_revenue', 'real_revenue'], 'number'],
            [['created_date', 'month'], 'safe'],
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
        return ArrayHelper::map(User::find()->where('role_id = 3')->all(), 'id', 'full_name');
    }

    public function getMonth()
    {
        return [
            '2018/01/01' => '01',
            '2018/02/01' => '02',
            '2018/03/01' => '03',
            '2018/04/01' => '04',
            '2018/05/01' => '05',
            '2018/06/01' => '06',
            '2018/07/01' => '07',
            '2018/08/01' => '08',
            '2018/09/01' => '09',
            '2018/10/01' => '10',
            '2018/11/01' => '11',
            '2018/12/01' => '12',
        ];
    }
}
