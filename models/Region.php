<?php

namespace app\models;

use app\components\Model;
use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property int $region_id
 * @property string $region_name
 */
class Region extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'integer'],
            [['region_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'region_name' => 'Region Name',
        ];
    }
}
