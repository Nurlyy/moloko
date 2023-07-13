<?php

use yii\db\Migration;

/**
 * Class m230125_042005_guest_like_is_read
 */
class m230125_042005_guest_like_is_read extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230125_042005_guest_like_is_read cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230125_042005_guest_like_is_read cannot be reverted.\n";

        return false;
    }
    */
}
