<?php

use yii\db\Migration;

/**
 * Class m181229_082046_add_clinic_id_to_db
 */
class m181229_082046_add_clinic_id_to_db extends Migration {

	/**
	 * {@inheritdoc}
	 */
	public function safeUp() {
		$this->addColumn('customer', 'clinic_id', $this->integer());
		$this->addColumn('kpi_ekip', 'clinic_id', $this->integer());
		$this->addColumn('kpi_sale', 'clinic_id', $this->integer());
		$this->addColumn('order', 'clinic_id', $this->integer());
		$this->addColumn('product', 'clinic_id', $this->integer());
		$this->addColumn('schedule_advisory', 'clinic_id', $this->integer());
		$this->addColumn('service', 'clinic_id', $this->integer());
		$this->addColumn('treatment_history', 'clinic_id', $this->integer());
		$this->addColumn('user', 'clinic_id', $this->integer());
		$this->addColumn('user', 'step', $this->integer());
		$this->addColumn('user', 'sub_step', $this->integer());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown() {
		echo "m181229_082046_add_clinic_id_to_db cannot be reverted.\n";
		return false;
	}
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m181229_082046_add_clinic_id_to_db cannot be reverted.\n";

		return false;
	}
	*/
}
