<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $customer_code
 * @property int $getfly_id
 * @property int $sex
 * @property string $birthday
 * @property string $phone
 * @property int $customer_type
 * @property string $debt
 * @property string $note
 * @property string $customer_img
 * @property int $character_type
 * @property int $status
 * @property string $created_date
 * @property string $getfly_date
 * @property int $created_id
 * @property int $update_id
 * @property int $sale_id
 * @property int $customer_status_id
 * @property string $bl_pressure
 * @property string $current_medicine
 * @property string $current_treatment
 * @property string $level_treatment
 * @property string $other
 * @property string $disire
 * @property string $examination
 * @property string $treatment_direction
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['getfly_id', 'sex', 'customer_type', 'character_type', 'status', 'created_id', 'update_id', 'sale_id'], 'integer'],
            [['birthday', 'created_date', 'getfly_date'], 'safe'],
            [['debt'], 'number'],
            [['customer_img'], 'file'],
            [['note'], 'string'],
            [['name', 'customer_code', 'phone', 'bl_pressure', 'current_medicine', 'current_treatment', 'level_treatment', 'other', 'disire', 'examination', 'treatment_direction', 'address', 'email', 'customer_status_id'], 'string', 'max' => 255],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if ($this->customer_img) {
                $this->customer_img->saveAs('uploads/' . $this->customer_img->baseName . '.' . $this->customer_img->extension);
                $this->customer_img = 'uploads/' . $this->customer_img->baseName . '.' . $this->customer_img->extension;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Họ tên',
            'customer_code' => 'Mã khách hàng',
            'getfly_id' => 'Getfly ID',
            'sex' => 'Giới tính',
            'birthday' => 'Ngày sinh',
            'phone' => 'Số điện thoại',
            'customer_type' => 'Loại khách hàng',
            'debt' => 'Còn nợ',
            'note' => 'Ghi chú',
            'customer_img' => 'Hình ảnh',
            'character_type' => 'Nhóm tính cách',
            'status' => 'Trạng thái',
            'created_date' => 'Ngày tạo',
            'getfly_date' => 'Getfly Date',
            'created_id' => 'Người tạo',
            'update_id' => 'Người cập nhật',
            'sale_id' => 'Sale',
            'customer_status_id' => 'Customer Status ID',
            'bl_pressure' => 'Huyết áp',
            'current_medicine' => 'Thuốc đang dùng hiện tại',
            'current_treatment' => 'Bệnh đang điều trị',
            'level_treatment' => 'Cấp độ điều trị',
            'other' => 'Khác',
            'disire' => 'Mong muốn khách hàng',
            'examination' => 'Thăm khám',
            'treatment_direction' => 'Hướng điều trị',
            'address' => 'Địa chỉ',
            'email' => 'Email',
        ];
    }

    public function getCustomerStatus()
    {
        return ArrayHelper::map(CustomerStatus::find()->all(), 'id', 'name');
    }

    public function getCharaterType()
    {
        return [
            '1' => 'Khách từ từ cần kiên nhẫn',
            '2' => 'Khách có tiền, cần cho họ thấy sự cao quý',
            '3' => 'Khách it tiền, cần cho họ thấy sự thực tế',
            '4' => 'Khách theo mốt, bán cho họ sự thời thượng',
            '5' => 'Khách chuyên nghiệp, bán cho họ sự chuyên nghiệp',
            '6' => 'Khách hào phóng, bán sự trượng nghĩa',
            '7' => 'Khách keo kiệt, bán sự lợi ích',
            '8' => 'Khách thích hư vinh, bán sự danh dự',
            '9' => 'Khách hiền lành, bán sự đồng cảm',
            '10' => 'Khách do dự, bán sự đảm bảo',
        ];
    }

    public function characterType($character)
    {
        switch ($character) {
            case 1:
                return 'Khách từ từ cần kiên nhẫn';
                break;
            case 2:
                return 'Khách có tiền, cần cho họ thấy sự cao quý';
                break;
            case 3:
                return 'Khách it tiền, cần cho họ thấy sự thực tế';
                break;
            case 4:
                return 'Khách theo mốt, bán cho họ sự thời thượng';
                break;
            case 5:
                return 'Khách chuyên nghiệp, bán cho họ sự chuyên nghiệp';
                break;
            case 6:
                return 'Khách hào phóng, bán sự trượng nghĩa';
                break;
            case 7:
                return 'Khách keo kiệt, bán sự lợi ích';
                break;
            case 8:
                return 'Khách thích hư vinh, bán sự danh dự';
                break;
            case 9:
                return 'Khách hiền lành, bán sự đồng cảm';
                break;
            case 10:
                return 'Khách do dự, bán sự đảm bảo';
                break;
            default:
                return "";
                break;
        }
    }
}
