<?php

namespace app\models;

use app\components\Model;
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
class KpiSale extends Model
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

    public function getSuccess($sale_id)
    {
        $total = ScheduleAdvisory::find()->where(['sale_id' => $sale_id])->count();
        $success = ScheduleAdvisory::find()->where(['sale_id' => $sale_id, 'status' => 5])->count();
        $notsuccess = ScheduleAdvisory::find()->where(['sale_id' => $sale_id, 'status' => 4])->count();
        if($notsuccess == 0 && $success == 0){
            return 0;
        }else {
            return $success / ($notsuccess + $success) * 100;
        }
    }
}
