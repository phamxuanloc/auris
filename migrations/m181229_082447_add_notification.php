<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181229_082447_add_notification
 */
class m181229_082447_add_notification extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%notification}}', [
			'id'      => Schema::TYPE_PK . '',
			'user_id' => Schema::TYPE_INTEGER . '(11)',
			'url'     => Schema::TYPE_STRING . '(255)',
			'content' => Schema::TYPE_STRING . '(255)',
			'status'  => Schema::TYPE_INTEGER,
		], $tableOptions);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181229_082447_add_notification cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181229_082447_add_notification cannot be reverted.\n";

		return false;
	}
	*/
}
