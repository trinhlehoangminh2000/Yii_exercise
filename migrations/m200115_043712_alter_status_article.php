<?php

use yii\db\Migration;

/**
 * Class m200115_043712_alter_status_article
 */
class m200115_043712_alter_status_article extends Migration
{
    public function up()
    {
        $this -> alterColumn('article','status','string(100)');
    }

    public function down()
    {
        $this -> alterColumn('article','status','string(20)');
    }

}
