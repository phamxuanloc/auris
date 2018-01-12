<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_100911_color extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%color}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> Schema::TYPE_SMALLINT.'(4)',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%color}}');
    }
}
