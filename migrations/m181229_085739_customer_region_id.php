<?php

use yii\db\Migration;

/**
 * Class m181229_085739_customer_region_id
 */
class m181229_085739_customer_region_id extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('customer', 'region_id', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181229_085739_customer_region_id cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181229_085739_customer_region_id cannot be reverted.\n";

		return false;
	}
	*/
}
