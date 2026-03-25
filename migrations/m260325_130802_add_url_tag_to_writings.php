<?php

use yii\db\Migration;

class m260325_130802_add_url_tag_to_writings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('writings', 'url_tag', $this->string()->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('writings', 'url_tag');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260325_130802_add_url_tag_to_writings cannot be reverted.\n";

        return false;
    }
    */
}
