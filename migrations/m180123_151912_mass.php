<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_151912_mass extends Migration {
	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
					$this->createTable('{{%schedule_advisory}}',
			[
							'id'=> Schema::TYPE_PK.'',
							'customer_code'=> Schema::TYPE_STRING.'(255)',
							'full_name'=> Schema::TYPE_STRING.'(255)',
							'sex'=> Schema::TYPE_STRING.'(255)',
							'birthday'=> Schema::TYPE_DATE.'',
							'phone'=> Schema::TYPE_STRING.'(255)',
							'ap_date'=> Schema::TYPE_DATETIME.'',
							'sale_id'=> Schema::TYPE_INTEGER.'(11)',
							'status'=> Schema::TYPE_INTEGER.'(11)',
							'note'=> Schema::TYPE_TEXT.'',
							'customer_id'=> Schema::TYPE_INTEGER.'(11)',
						], $tableOptions);

																																											}

	public function safeDown() {
																			$this->dropTable('{{%schedule_advisory}}');
			}
}
