<?php

use yii\db\Schema;
use yii\db\Migration;

class m181124_074311_customer_media extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%customer_media}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'customer_id'=> Schema::TYPE_INTEGER.'(11)',
                'url'=> Schema::TYPE_STRING.'(255)',
                ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%customer_media}}');
    }
}
