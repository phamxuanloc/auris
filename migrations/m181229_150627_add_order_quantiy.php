<?php

use yii\db\Migration;

/**
 * Class m181229_150627_add_order_quantiy
 */
class m181229_150627_add_order_quantiy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'quantiy', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181229_150627_add_order_quantiy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181229_150627_add_order_quantiy cannot be reverted.\n";

        return false;
    }
    */
}
