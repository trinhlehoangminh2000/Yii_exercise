<?php

use yii\db\Migration;

/**
 * Class m200107_082742_add_column_user_to_address
 */
class m200107_082742_add_column_user_to_address extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> addColumn('address','user_id','integer(11)');
    }

    public function safeDown()
    {
        $this -> dropColumn('address','user_id');
    }

}
