<?php

use yii\db\Migration;

/**
 * Class m180118_024631_add_column_treatment_history
 */
class m180118_024631_add_column_treatment_history extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('treatment_history', 'order_code', $this->string(30));
        $this->addColumn('treatment_history', 'note', $this->text());
        $this->addColumn('treatment_history', 'is_finish', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180118_024631_add_column_treatment_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180118_024631_add_column_treatment_history cannot be reverted.\n";

        return false;
    }
    */
}
