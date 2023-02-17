<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%siswa}}`.
 */
class m230210_073519_create_siswa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%siswa}}', [
            'id' => $this->primaryKey(),
            'nis' => $this->string(25),
            'nama' => $this->string(50),
            'tempat_lahir' => $this->string(25),
            'tanggal_lahir' => $this->date(),
            'alamat' => $this->text(),
            'id_kelas' => $this->integer(),
            'id_user' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%siswa}}');
    }
}
