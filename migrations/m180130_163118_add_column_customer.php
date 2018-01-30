<?php

use yii\db\Migration;

/**
 * Class m180130_163118_add_column_customer
 */
class m180130_163118_add_column_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('customer', 'region_id', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180130_163118_add_column_customer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180130_163118_add_column_customer cannot be reverted.\n";

        return false;
    }
    */
}
