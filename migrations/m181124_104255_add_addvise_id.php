<?php
use yii\db\Migration;

/**
 * Class m181124_104255_add_addvise_id
 */
class m181124_104255_add_addvise_id extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('schedule_advisory', 'advisory_id', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181124_104255_add_addvise_id cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181124_104255_add_addvise_id cannot be reverted.\n";

		return false;
	}
	*/
}
