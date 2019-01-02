<?php

use yii\db\Migration;

/**
 * Class m181229_141913_add_customer_step
 */
class m181229_141913_add_customer_step extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('customer', 'step', $this->integer());
        $this->addColumn('customer', 'sub-step', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181229_141913_add_customer_step cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181229_141913_add_customer_step cannot be reverted.\n";

        return false;
    }
    */
}
