<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m201212_081304_add_firstname_lastname_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // PostgreSQL doesn't support column order with 'after'
        $this->addColumn('{{%user}}', 'firstname', $this->string(255)->notNull());
        $this->addColumn('{{%user}}', 'lastname', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'lastname');
        $this->dropColumn('{{%user}}', 'firstname');
    }
}
