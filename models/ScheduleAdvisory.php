<?php

namespace app\models;

use app\components\Model;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "schedule_advisory".
 *
 * @property int $id
 * @property string $customer_code
 * @property string $full_name
 * @property string $sex
 * @property string $birthday
 * @property string $phone
 * @property string $ap_date
 * @property int $sale_id
 * @property int $status
 * @property string $note
 * @property int $customer_id
 * @property int $advisory_id
 * @property int $designer_id
 */
class ScheduleAdvisory extends Model
{
    public $start_date, $end_date;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule_advisory';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->ap_date = str_replace('/', '-', $this->ap_date);
            $this->ap_date = date('Y-m-d H:i:s', strtotime($this->ap_date));
            $this->birthday = str_replace('/', '-', $this->birthday);
            $this->birthday = date('Y-m-d', strtotime($this->birthday));
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
//        $this->ap_date = date('H, d-m-Y', strtotime($this->ap_date));
        $this->birthday = date('d-m-Y', strtotime($this->birthday));
//
        parent::afterFind();
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'ap_date'], 'required'],
            [['birthday', 'ap_date', 'start_date', 'end_date'], 'safe'],
            [['sale_id', 'status', 'customer_id', 'advisory_id', 'designer_id'], 'integer'],
            [['note', 'note_direct'], 'string'],
            [['customer_code', 'full_name', 'sex', 'phone'], 'string', 'max' => 255],
        ];
    }

    public function getSale()
    {
        return $this->hasOne(User::className(), ['id' => 'sale_id']);
    }

    public function getAdvisory()
    {
        return $this->hasOne(User::className(), ['id' => 'advisory_id']);
    }

    public function getDesigner()
    {
        return $this->hasOne(User::className(), ['id' => 'designer_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_code' => 'MSKH',
            'full_name' => 'Họ và Tên',
            'sex' => 'Giới Tính',
            'birthday' => 'Ngày Sinh',
            'phone' => 'Số Điện Thoại',
            'ap_date' => 'Ngày Hẹn',
            'sale_id' => 'DirectSale',
            'status' => 'Tình Trạng',
            'note' => 'Ghi Chú',
            'customer_id' => 'Customer ID',
            'note_direct' => 'Ghi chú Direct',
            'advisory_id' => 'Tư vấn Online',
            'designer_id' => 'Designer',
        ];
    }

    public function getListCustomer()
    {
        $data = Customer::find()
            ->select(['customer_code as value'])
            ->asArray()
            ->all();
        return $data;
    }

    public function getListDirectSale(){
        return ArrayHelper::map(User::find()->where('role_id = 3')->all(), 'id', 'full_name');
    }
    public function getListAdvisory(){
        return ArrayHelper::map(User::find()->where('role_id = 9')->all(), 'id', 'full_name');
    }
    public function getListDesigner(){
        return ArrayHelper::map(User::find()->where('role_id = 10')->all(), 'id', 'full_name');
    }
}
