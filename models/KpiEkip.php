<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "kpi_ekip".
 *
 * @property int $id
 * @property int $ekip_id
 * @property string $ekip_name
 * @property string $estimate_revenue
 * @property string $real_revenue
 * @property string $total_customer
 * @property int $spect_point
 * @property int $ae_point
 * @property int $total_time
 * @property string $month
 * @property string $created_date
 * @property string $kpi
 */
class KpiEkip extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kpi_ekip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ekip_id', 'spect_point', 'ae_point', 'total_time'], 'integer'],
            [['estimate_revenue', 'real_revenue', 'total_customer', 'kpi'], 'number'],
            [['month', 'created_date'], 'safe'],
            [['ekip_name'], 'string', 'max' => 255],
        ];
    }

    public function getEkip(){
        return $this->hasOne(User::className(), ['id' => 'ekip_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ekip_id' => 'Danh sách bác sỹ',
            'ekip_name' => 'Ekip Name',
            'estimate_revenue' => 'Doanh Thu Ước Tính',
            'real_revenue' => 'Doanh Thu Thực Tế',
            'total_customer' => 'Tổng Số Khách Hàng',
            'spect_point' => 'Chuyên Môn',
            'ae_point' => 'Thẩm Mỹ',
            'total_time' => 'Tổng số giờ làm việc',
            'month' => 'Tháng',
            'created_date' => 'Created Date',
            'kpi' => 'Kpi',
        ];
    }
}
