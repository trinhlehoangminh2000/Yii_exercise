<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m191224_072209_create_db
 */
class m191224_072209_create_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*
    public function safeUp()
    {
    }
    */
    /**
     * {@inheritdoc}
     */
    /* -> dropTa
    public function safeDown()
    {
        echo "m191224_072209_create_db cannot be reverted.\n";
        return false;
    }
    */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('article', [
            'id'=> $this -> primaryKey(),
            'title' => $this-> string(50) ->notNull() ,
            'content' => $this->text(),
        ]);
    }

    public function down()
    {
        $this -> dropTable('article');
    }

}
