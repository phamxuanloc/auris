<?php

use yii\db\Schema;
use yii\db\Migration;

class m180205_081612_mass extends Migration {
	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
					$this->createTable('{{%kpi_ekip}}',
			[
							'id'=> Schema::TYPE_PK.'',
							'ekip_id'=> Schema::TYPE_INTEGER.'(11)',
							'ekip_name'=> Schema::TYPE_STRING.'(255)',
							'estimate_revenue'=> Schema::TYPE_DECIMAL.'(10)',
							'real_revenue'=> Schema::TYPE_DECIMAL.'(10)',
							'total_customer'=> Schema::TYPE_DECIMAL.'(10)',
							'spect_point'=> Schema::TYPE_INTEGER.'(11)',
							'ae_point'=> Schema::TYPE_INTEGER.'(11)',
							'total_time'=> Schema::TYPE_INTEGER.'(11)',
							'month'=> Schema::TYPE_DATETIME.'',
							'created_date'=> Schema::TYPE_DATETIME.'',
							'kpi'=> Schema::TYPE_DECIMAL.'(10)',
						], $tableOptions);

																																											}

	public function safeDown() {
																			$this->dropTable('{{%kpi_ekip}}');
			}
}
