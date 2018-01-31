<?php

use yii\db\Migration;

/**
 * Class m180131_160502_add_column_order
 */
class m180131_160502_add_column_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'discount', $this->decimal(11));
        $this->addColumn('order', 'created_date', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180131_160502_add_column_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180131_160502_add_column_order cannot be reverted.\n";

        return false;
    }
    */
}
