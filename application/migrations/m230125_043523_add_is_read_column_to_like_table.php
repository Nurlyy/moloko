<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%like}}`.
 */
class m230125_043523_add_is_read_column_to_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%like}}', 'is_read', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%like}}', 'is_read');
    }
}
