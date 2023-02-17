<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guru}}`.
 */
class m230212_032731_create_guru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guru}}', [
            'id' => $this->primaryKey(),
            'nama_guru' => $this->string(50),
            'id_user' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guru}}');
    }
}
