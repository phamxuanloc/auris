<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_101011_order_checkout extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%order_checkout}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'customer_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'order_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'money'=> Schema::TYPE_DECIMAL.'(10) NOT NULL',
                'created_date'=> Schema::TYPE_DATETIME.'',
                'payment_date'=> Schema::TYPE_DATETIME.'',
                'casher'=> Schema::TYPE_INTEGER.'(11)',
                'status'=> Schema::TYPE_SMALLINT.'(4)',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%order_checkout}}');
    }
}
