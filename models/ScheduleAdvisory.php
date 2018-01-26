<?php

namespace app\models;

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
 */
class ScheduleAdvisory extends \yii\db\ActiveRecord
{
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
            $this->ap_date = date('Y-m-d H:i:s', strtotime($this->ap_date));
            $this->birthday = date('Y-m-d', strtotime($this->birthday));
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        $this->ap_date = date('d-m-Y H:i:s', strtotime($this->ap_date));
        $this->birthday = date('d-m-Y', strtotime($this->birthday));

        parent::afterFind();
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday', 'ap_date'], 'safe'],
            [['sale_id', 'status', 'customer_id'], 'integer'],
            [['note'], 'string'],
            [['customer_code', 'full_name', 'sex', 'phone'], 'string', 'max' => 255],
        ];
    }

    public function getSale()
    {
        return $this->hasOne(User::className(), ['id' => 'sale_id']);
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
        return ArrayHelper::map(User::find()->all(), 'id', 'username');
    }
}
