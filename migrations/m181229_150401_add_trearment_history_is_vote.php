<?php

use yii\db\Migration;

/**
 * Class m181229_150401_add_trearment_history_is_vote
 */
class m181229_150401_add_trearment_history_is_vote extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('treatment_history', 'is_vote', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181229_150401_add_trearment_history_is_vote cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181229_150401_add_trearment_history_is_vote cannot be reverted.\n";

        return false;
    }
    */
}
