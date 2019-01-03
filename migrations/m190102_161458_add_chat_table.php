<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190102_161458_add_chat_table
 */
class m190102_161458_add_chat_table extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%chat}}', [
			'id'                    => Schema::TYPE_PK . '',
			'customer_id'           => Schema::TYPE_INTEGER . '(11)',
			'username'              => Schema::TYPE_STRING . '(255)',
			'user_id'               => Schema::TYPE_INTEGER . '(11)',
			'treatment_schedule_id' => Schema::TYPE_INTEGER . '(11)',
			'message'               => Schema::TYPE_TEXT,
			'created_at'            => Schema::TYPE_DATETIME,
		], $tableOptions);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m190102_161458_add_chat_table cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m190102_161458_add_chat_table cannot be reverted.\n";

		return false;
	}
	*/
}
