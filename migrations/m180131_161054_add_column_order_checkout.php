<?php

use yii\db\Migration;

/**
 * Class m180131_161054_add_column_order_checkout
 */
class m180131_161054_add_column_order_checkout extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order_checkout', 'cash_type', $this->integer(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180131_161054_add_column_order_checkout cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180131_161054_add_column_order_checkout cannot be reverted.\n";

        return false;
    }
    */
}
