<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m201124_064907_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'total_price' => $this->decimal(10,2)->notNull(),
            'status' => $this->smallInteger()->notNull(), // updated from tinyInteger
            'firstname' => $this->string()->notNull(),    // length removed
            'lastname' => $this->string()->notNull(),     // length removed
            'email' => $this->string()->notNull(),
            'transaction_id' => $this->string(),
            'created_at' => $this->integer(),             // still fine for Unix timestamp
            'created_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}'
        );

        $this->dropIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
