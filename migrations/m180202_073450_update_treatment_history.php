<?php

use yii\db\Migration;

/**
 * Class m180202_073450_update_treatment_history
 */
class m180202_073450_update_treatment_history extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('treatment_history', 'created_date', $this->timestamp()->defaultValue(['expression' => 'CURRENT_TIMESTAMP']));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m180202_073450_update_treatment_history cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180202_073450_update_treatment_history cannot be reverted.\n";

		return false;
	}
	*/
}
