<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_100911_cutomer_status extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%cutomer_status}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> Schema::TYPE_SMALLINT.'(4) DEFAULT "0"',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%cutomer_status}}');
    }
}
