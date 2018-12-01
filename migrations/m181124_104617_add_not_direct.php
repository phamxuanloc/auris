<?php

use yii\db\Migration;

/**
 * Class m181124_104617_add_not_direct
 */
class m181124_104617_add_not_direct extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('schedule_advisory', 'note_direct', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181124_104617_add_not_direct cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181124_104617_add_not_direct cannot be reverted.\n";

        return false;
    }
    */
}
