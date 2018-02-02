<?php

use yii\db\Migration;

/**
 * Class m180202_091345_update_order
 */
class m180202_091345_update_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('order', 'created_date', $this->timestamp()->defaultExpression( 'CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180202_091345_update_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_091345_update_order cannot be reverted.\n";

        return false;
    }
    */
}
