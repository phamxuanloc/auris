<?php
use yii\db\Migration;

/**
 * Class m180125_055646_add_user_column
 */
class m180125_055646_add_user_column extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('user', 'full_name', $this->string(100));
		$this->addColumn('user', 'phone', $this->string(100));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m180125_055646_add_user_column cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180125_055646_add_user_column cannot be reverted.\n";

		return false;
	}
	*/
}
