<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "cutomer_status".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class CutomerStatus extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cutomer_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
}
