<?php

use yii\db\Migration;

/**
 * Class m200107_072410_create_tbl_address
 */
class m200107_072410_create_tbl_address extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('address', [
            'id_address'=> $this -> primaryKey(),
            'street' => $this-> string(50) ->notNull() ,
            'number' => $this->string(10),
            'city' => $this-> string(30),
            'zip' => $this ->string(10),
            'country' => $this ->string(20),
            'created_at'=> $this -> integer(11),
            'updated_at'=> $this ->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('address');
    }


}
