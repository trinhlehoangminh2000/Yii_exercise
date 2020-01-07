<?php

use yii\db\Migration;

/**
 * Class m200106_082515_create_tbl_contact
 */
class m200106_082515_create_tbl_contact extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact', [
            'id_contact' => $this->primaryKey(),
            'name'=> $this->string(50),
            'email'=> $this->string(50),
            'subject'=> $this->string(50),
            'sub_category_subject'=> $this->string(50),
            'created_at'=> $this ->integer(11),
            'message'=> $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('contact');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200106_082515_create_tbl_contact cannot be reverted.\n";

        return false;
    }
    */
}
