<?php

use yii\db\Migration;

/**
 * Class m181229_084126_cash_type
 */
class m181229_084126_cash_type extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('order_checkout', 'cash_type', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181229_084126_cash_type cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181229_084126_cash_type cannot be reverted.\n";

		return false;
	}
	*/
}
