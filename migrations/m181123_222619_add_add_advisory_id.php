<?php
use yii\db\Migration;

/**
 * Class m181123_222619_add_add_advisory_id
 */
class m181123_222619_add_add_advisory_id extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->renameColumn('order', 'quantiy', 'quantity');
		$this->addColumn('order', 'advisory_id', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181123_222619_add_add_advisory_id cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181123_222619_add_add_advisory_id cannot be reverted.\n";

		return false;
	}
	*/
}
