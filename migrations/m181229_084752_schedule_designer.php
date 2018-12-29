<?php

use yii\db\Migration;

/**
 * Class m181229_084752_schedule_designer
 */
class m181229_084752_schedule_designer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('schedule_advisory', 'designer_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181229_084752_schedule_designer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181229_084752_schedule_designer cannot be reverted.\n";

        return false;
    }
    */
}
