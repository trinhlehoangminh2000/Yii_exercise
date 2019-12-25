<?php

use yii\db\Migration;

/**
 * Class m191225_071456_add_column_updated_by_in_article
 */
class m191225_071456_add_column_updated_by_in_article extends Migration
{
    public function up()
    {
        $this -> addColumn('article','updated_by','string(50)');
    }

    public function down()
    {
        $this -> dropColumn('article','updated_by');
    }
}
