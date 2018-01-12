<?php

use yii\db\Schema;
use yii\db\Migration;

class m180112_100811_user_ekip extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%user_ekip}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'user_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'username'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'ekip_id'=> Schema::TYPE_INTEGER.'(11) NOT NULL',
                'ekip_name'=> Schema::TYPE_STRING.'(255)',
                'created_date'=> Schema::TYPE_DATETIME.'',
                ],
            $tableOptions
        );
    
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_ekip}}');
    }
}
