<?php

use yii\db\Migration;

/**
 * Class m180122_100949_update_kpi_sale
 */
class m180122_100949_update_kpi_sale extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
//        $this->addColumn('kpi_sale', 'year', $this->integer(4));
        $this->dropColumn('kpi_sale', 'month');
        $this->dropColumn('kpi_sale', 'year');
        $this->addColumn('kpi_sale', 'month', $this->dateTime());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180122_100949_update_kpi_sale cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180122_100949_update_kpi_sale cannot be reverted.\n";

        return false;
    }
    */
}
