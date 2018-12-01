<?php

use yii\db\Schema;
use yii\db\Migration;

class m181123_154912_mass extends Migration {
	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
					$this->createTable('{{%clinic}}',
			[
							'id'=> Schema::TYPE_PK.'',
							'name'=> Schema::TYPE_STRING.'(255)',
							'prefix'=> Schema::TYPE_STRING.'(255)',
							'status'=> Schema::TYPE_INTEGER.'(1)',
						], $tableOptions);

																																											}

	public function safeDown() {
																			$this->dropTable('{{%clinic}}');
			}
}
