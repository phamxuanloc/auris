<?php

use yii\db\Migration;

/**
 * Class m180202_073203_update_schedule_advisory
 */
class m180202_073203_update_schedule_advisory extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('schedule_advisory', 'created_date', $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP']));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180202_073203_update_schedule_advisory cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180202_073203_update_schedule_advisory cannot be reverted.\n";

        return false;
    }
    */
}
