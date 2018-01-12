<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_101011_treatment_history extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%treatment_history}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'order_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'customer_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'customer_code'=> Schema::TYPE_STRING.'(255)',
                'customer_name'=> Schema::TYPE_STRING.'(255)',
                'customer_phone'=> Schema::TYPE_STRING.'(255)',
                'ap_date'=> Schema::TYPE_DATETIME.'',
                'real_start'=> Schema::TYPE_DATETIME.'',
                'real_end'=> Schema::TYPE_DATETIME.'',
                'att_point'=> Schema::TYPE_INTEGER.'(11)',
                'spect_point'=> Schema::TYPE_INTEGER.'(11)',
                'ae_point'=> Schema::TYPE_INTEGER.'(11)',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%treatment_history}}');
    }
}
