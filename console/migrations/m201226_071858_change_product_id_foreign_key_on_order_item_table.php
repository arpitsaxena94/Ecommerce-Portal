<?php

use yii\db\Migration;

/**
 * Handles updating foreign key for table `order_items`.
 */
class m201226_071858_change_product_id_foreign_key_on_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Drop the existing foreign key
        $this->dropForeignKey(
            '{{%fk-order_items-product_id}}',
            '{{%order_items}}'
        );

        // Add a new foreign key to products table with ON DELETE CASCADE
        $this->addForeignKey(
            '{{%fk-order_items-product_id}}',
            '{{%order_items}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the modified foreign key
        $this->dropForeignKey(
            '{{%fk-order_items-product_id}}',
            '{{%order_items}}'
        );

        // Re-add the original foreign key without ON DELETE CASCADE
        $this->addForeignKey(
            '{{%fk-order_items-product_id}}',
            '{{%order_items}}',
            'product_id',
            '{{%products}}',
            'id'
        // You can also specify 'RESTRICT' or 'NO ACTION' here if needed
        );
    }
}
