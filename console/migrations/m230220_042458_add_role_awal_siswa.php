<?php

use yii\db\Migration;

/**
 * Class m230220_042458_add_role_awal_siswa
 */
class m230220_042458_add_role_awal_siswa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'auth_item',
            [
                'name',
                'type',
                'description',
                'rule_name',
                'data',
                'created_at',
                'updated_at'
            ],
            [
                [
                    'Siswa', 1, NULL, NULL, NULL, time(), time()
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230220_042458_add_role_awal_siswa cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230220_042458_add_role_awal_siswa cannot be reverted.\n";

        return false;
    }
    */
}
