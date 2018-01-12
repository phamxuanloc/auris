<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_101011_order extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%order}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'customer_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'customer_code'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'customer_name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'customer_phone'=> Schema::TYPE_STRING.'(255)',
                'ekip_id'=> Schema::TYPE_INTEGER.'(11)',
                'sale_id'=> Schema::TYPE_INTEGER.'(11)',
                'service_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'product_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'color_id'=> Schema::TYPE_INTEGER.'(11)',
                'price'=> Schema::TYPE_DECIMAL.'(10) NOT NULL',
                'quantiy'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'total_price'=> Schema::TYPE_DECIMAL.'(10) NOT NULL',
                'status'=> Schema::TYPE_SMALLINT.'(4) NOT NULL DEFAULT "0"',
                'type'=> Schema::TYPE_SMALLINT.'(4) NOT NULL',
                'total_payment'=> Schema::TYPE_DECIMAL.'(10) NOT NULL',
                'debt'=> Schema::TYPE_DECIMAL.'(10)',
                'note'=> Schema::TYPE_TEXT.'',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
