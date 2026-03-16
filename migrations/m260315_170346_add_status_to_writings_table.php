<?php

use yii\db\Migration;

class m260315_170346_add_status_to_writings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%writings}}', 'status', $this->string()->notNull()->defaultValue('draft'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%writings}}', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260315_170346_add_status_to_writings_table cannot be reverted.\n";

        return false;
    }
    */
}
