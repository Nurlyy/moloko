<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%guest}}`.
 */
class m230125_042653_add_is_read_column_to_guest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%guest}}', 'is_read', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%guest}}', 'is_read');
    }
}
