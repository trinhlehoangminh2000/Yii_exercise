<?php

use yii\db\Migration;

/**
 * Class m191226_015737_add_column_status_to_db
 */
class m191226_015737_add_column_status_to_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> addColumn('article','status','BOOLEAN');
        $this -> addColumn('user','status','BOOLEAN');
        $this -> addColumn('category','status','BOOLEAN');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {   
        $this -> dropColumn('category','status');
        $this -> dropColumn('user','status');
        $this -> dropColumn('article','status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191226_015737_add_column_status_to_db cannot be reverted.\n";

        return false;
    }
    */
}
