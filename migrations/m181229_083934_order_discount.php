<?php

use yii\db\Migration;

/**
 * Class m181229_083934_order_discount
 */
class m181229_083934_order_discount extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('order', 'discount', $this->decimal());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181229_083934_order_discount cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181229_083934_order_discount cannot be reverted.\n";

		return false;
	}
	*/
}
