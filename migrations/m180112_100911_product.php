<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_100911_product extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%product}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'service_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> Schema::TYPE_SMALLINT.'(4)',
                'price'=> Schema::TYPE_DECIMAL.'(10)',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
