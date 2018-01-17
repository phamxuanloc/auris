<?php

use yii\db\Migration;

/**
 * Class m180117_081540_add_column_order
 */
class m180117_081540_add_column_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('order', 'order_code', $this->string(30));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180117_081540_add_column_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180117_081540_add_column_order cannot be reverted.\n";

        return false;
    }
    */
}
