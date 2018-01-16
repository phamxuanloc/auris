<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_100711_customer extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%customer}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'customer_code'=> Schema::TYPE_STRING.'(255)',
                'getfly_id'=> Schema::TYPE_INTEGER.'(11)',
                'sex'=> Schema::TYPE_SMALLINT.'(4)',
                'birthday'=> Schema::TYPE_DATETIME.'',
                'phone'=> Schema::TYPE_STRING.'(255)',
                'address'=> Schema::TYPE_STRING.'(255)',
                'email'=> Schema::TYPE_STRING.'(100)',
                'customer_type'=> Schema::TYPE_INTEGER.'(11)',
                'debt'=> Schema::TYPE_DECIMAL.'(10)',
                'note'=> Schema::TYPE_TEXT.'',
                'customer_img'=> Schema::TYPE_STRING.'(255)',
                'character_type'=> Schema::TYPE_INTEGER.'(11)',
                'status'=> Schema::TYPE_SMALLINT.'(4)',
                'created_date'=> Schema::TYPE_DATETIME.'',
                'getfly_date'=> Schema::TYPE_DATETIME.'',
                'created_id'=> Schema::TYPE_INTEGER.'(11)',
                'update_id'=> Schema::TYPE_INTEGER.'(11)',
                'sale_id'=> Schema::TYPE_INTEGER.'(11)',
                'customer_status_id'=> Schema::TYPE_INTEGER.'(11)',
                'bl_pressure'=> Schema::TYPE_STRING.'(255)',
                'current_medicine'=> Schema::TYPE_STRING.'(255)',
                'current_treatment'=> Schema::TYPE_STRING.'(255)',
                'level_treatment'=> Schema::TYPE_STRING.'(255)',
                'other'=> Schema::TYPE_STRING.'(255)',
                'disire'=> Schema::TYPE_STRING.'(255)',
                'examination'=> Schema::TYPE_STRING.'(255)',
                'treatment_direction'=> Schema::TYPE_STRING.'(255)',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%customer}}');
    }
}
