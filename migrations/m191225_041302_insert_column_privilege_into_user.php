<?php

use yii\db\Migration;

/**
 * Class m191225_041302_insert_column_privilege_into_user
 */
class m191225_041302_insert_column_privilege_into_user extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this -> addColumn('user','privilege','BOOLEAN');
    }

    public function down()
    {
        $this -> dropColumn('user','privilege');
    }
}
