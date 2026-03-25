<?php

use yii\db\Migration;

class m260325_143535_add_url_tag_to_church_groups extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%church_groups}}', 'url_tag', $this->string()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%church_groups}}', 'url_tag');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260325_143535_add_url_tag_to_church_groups cannot be reverted.\n";

        return false;
    }
    */
}
