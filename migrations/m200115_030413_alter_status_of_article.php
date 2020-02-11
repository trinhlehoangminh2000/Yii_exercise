<?php

use yii\db\Migration;

/**
 * Class m200115_030413_alter_status_of_article
 */
class m200115_030413_alter_status_of_article extends Migration
{
    public function up()
    {
        $this -> alterColumn('article','status','string(20)');
    }

    public function down()
    {
        $this -> alterColumn('article','status','tinyint(1)');
    }

}
