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
    $this->insert('{{%order_service}}',['id'=>'1','order_id'=>'33','service_id'=>'6','product_id'=>'6','color_id'=>'1','price'=>'4000000','quantity'=>'2','total_price'=>'8000000']);
$this->insert('{{%order_service}}',['id'=>'2','order_id'=>'34','service_id'=>'6','product_id'=>'4','color_id'=>'','price'=>'4000000','quantity'=>'1','total_price'=>'4000000']);
$this->insert('{{%order_service}}',['id'=>'3','order_id'=>'34','service_id'=>'7','product_id'=>'5','color_id'=>'1','price'=>'1000000','quantity'=>'2','total_price'=>'2000000']);
$this->insert('{{%order_service}}',['id'=>'4','order_id'=>'34','service_id'=>'6','product_id'=>'4','color_id'=>'','price'=>'4000000','quantity'=>'1','total_price'=>'4000000']);

    }

    public function safeDown()
    {
        $this->dropTable('{{%order_service}}');
    }
}
