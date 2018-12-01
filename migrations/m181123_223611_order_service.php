<?php

use yii\db\Schema;
use yii\db\Migration;

class m181123_223611_order_service extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%order_service}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'order_id'=> Schema::TYPE_INTEGER.'(11)',
                'service_id'=> Schema::TYPE_INTEGER.'(11)',
                'product_id'=> Schema::TYPE_INTEGER.'(11)',
                'color_id'=> Schema::TYPE_INTEGER.'(11)',
                'price'=> Schema::TYPE_DECIMAL.'(10)',
                'quantity'=> Schema::TYPE_INTEGER.'(11)',
                'total_price'=> Schema::TYPE_DECIMAL.'(10)',
                ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order_service}}');
    }
}
