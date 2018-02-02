<?php

use yii\db\Migration;

/**
 * Class m180202_042210_update_treatment_history
 */
class m180202_042210_update_treatment_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('treatment_history', 'sale_id', $this->integer());
        $this->addColumn('treatment_history', 'ekip_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180202_042210_update_treatment_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_042210_update_treatment_history cannot be reverted.\n";

        return false;
    }
    */
}
