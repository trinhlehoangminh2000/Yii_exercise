<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191225_034747_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id_user' => $this->primaryKey(),
            'username'=> $this->string(50),
            'password'=> $this->string(16),
            'created_at'=> $this ->dateTime(null),
            'updated_at'=>$this ->dateTime(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
