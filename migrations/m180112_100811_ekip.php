<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_100811_ekip extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%ekip}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'ekip_name'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> Schema::TYPE_SMALLINT.'(4)',
                'created_date'=> Schema::TYPE_DATETIME.'',
                'created_user'=> Schema::TYPE_INTEGER.'(11)',
                'update_date'=> Schema::TYPE_DATETIME.'',
                'update_user'=> Schema::TYPE_INTEGER.'(11)',
                'end_date'=> Schema::TYPE_DATETIME.'',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%ekip}}');
    }
}
