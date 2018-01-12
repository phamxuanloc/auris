<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_101011_kpi_sale extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%kpi_sale}}',
            [
                'id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'sale_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'kpi'=> Schema::TYPE_DECIMAL.'(10) NOT NULL',
                'created_date'=> Schema::TYPE_DATETIME.'',
                'month'=> Schema::TYPE_DATETIME.'',
                'estimate_revenue'=> Schema::TYPE_DECIMAL.'(10)',
                'real_revenue'=> Schema::TYPE_DECIMAL.'(10)',
                'total_customer'=> Schema::TYPE_INTEGER.'(11)',
                'att_point'=> Schema::TYPE_INTEGER.'(11)',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%kpi_sale}}');
    }
}
