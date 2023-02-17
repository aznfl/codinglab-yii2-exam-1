<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wali}}`.
 */
class m230212_031145_create_wali_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wali}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(50),
            'alamat' => $this->text(),
            'no_hp' => $this->string(25),
            'id_status_wali' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wali}}');
    }
}
