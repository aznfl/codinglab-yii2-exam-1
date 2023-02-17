<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%siswa_rw_kelas}}`.
 */
class m230212_031455_create_siswa_rw_kelas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%siswa_rw_kelas}}', [
            'id' => $this->primaryKey(),
            'id_siswa' => $this->integer(),
            'id_kelas' => $this->integer(),
            'id_tahun_ajaran' => $this->integer(),
            'nama_kelas' => $this->string(),
            'id_tingkat' => $this->integer(),
            'id_wali_kelas' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%siswa_rw_kelas}}');
    }
}
