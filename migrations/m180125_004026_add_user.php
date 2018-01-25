<?php
use yii\db\Migration;

/**
 * Class m180125_004026_add_user
 */
class m180125_004026_add_user extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->insert('{{%user}}', [
			'id'            => '1',
			'role_id'       => '1',
			'username'      => 'admin',
			'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
			'email'         => 'admin@gmail.com',
			'confirmed_at'  => 1456114858,
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m180125_004026_add_user cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180125_004026_add_user cannot be reverted.\n";

		return false;
	}
	*/
}
