<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_tingkat_kelas}}`.
 */
class m230211_093545_create_ref_tingkat_kelas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_tingkat_kelas}}', [
            'id' => $this->primaryKey(),
            'tingkat_kelas' => $this->string(5),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_tingkat_kelas}}');
    }
}
