<?php

use yii\db\Migration;

/**
 * Class m200107_082939_create_relationship_address_user
 */
class m200107_082939_create_relationship_address_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> createIndex(
            'user_id',
            'address',
            'user_id',
            false
        );
        $this -> addForeignKey('address_ibfk_1', 'address', 'user_id','user','id_user','SET NULL','SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropForeignKey('address_ibfk_1','address');
        $this -> dropIndex('user_id','address');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_082939_create_relationship_address_user cannot be reverted.\n";

        return false;
    }
    */
}
