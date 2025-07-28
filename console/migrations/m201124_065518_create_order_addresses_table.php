<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_addresses}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 */
class m201124_065518_create_order_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_addresses}}', [
            'order_id' => $this->integer()->notNull(),
            'address' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'state' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'zipcode' => $this->string(),
        ]);

        // Add primary key on order_id
        $this->addPrimaryKey('PK_order_addresses', '{{%order_addresses}}', 'order_id');

        // Creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_addresses-order_id}}',
            '{{%order_addresses}}',
            'order_id'
        );

        // Add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-order_id}}',
            '{{%order_addresses}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-order_id}}',
            '{{%order_addresses}}'
        );

        // Drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_addresses-order_id}}',
            '{{%order_addresses}}'
        );

        // Drop table
        $this->dropTable('{{%order_addresses}}');
    }
}
