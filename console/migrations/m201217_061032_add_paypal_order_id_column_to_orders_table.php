<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%orders}}`.
 */
class m201217_061032_add_paypal_order_id_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // No 'after()' in PostgreSQL
        $this->addColumn('{{%orders}}', 'paypal_order_id', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%orders}}', 'paypal_order_id');
    }
}
