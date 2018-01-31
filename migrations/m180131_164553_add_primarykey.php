<?php
use yii\db\Migration;

/**
 * Class m180131_164553_add_primarykey
 */
class m180131_164553_add_primarykey extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->alterColumn('kpi_sale', 'id', $this->primaryKey());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m180131_164553_add_primarykey cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180131_164553_add_primarykey cannot be reverted.\n";

		return false;
	}
	*/
}
