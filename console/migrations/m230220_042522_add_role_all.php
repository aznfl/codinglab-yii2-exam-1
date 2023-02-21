<?php

use yii\db\Migration;

/**
 * Class m230220_042522_add_role_all
 */
class m230220_042522_add_role_all extends Migration
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
                    '/biodata/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/riwayat-kelas/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/list-siswa/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/list-kelas/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/list-pelajaran/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/guru-pelajaran/*', 2, NULL, NULL, NULL, time(), time()
                ],
                [
                    '/wali/*', 2, NULL, NULL, NULL, time(), time()
                ],
            ]
        );

        $this->batchInsert(
            'auth_item_child',
            [
                'parent',
                'child'
            ],
            [
                [
                    'Admin', '/guru-pelajaran/*'
                ],
                [
                    'Siswa', '/biodata/*'
                ],
                [
                    'Siswa', '/riwayat-kelas/*'
                ],
                [
                    'Siswa', '/wali/*'
                ],
                [
                    'Guru', '/list-siswa/*'
                ],
                [
                    'Guru', '/list-pelajaran/*'
                ],
                [
                    'Guru', '/list-kelas/*'
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230220_042522_add_role_all cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230220_042522_add_role_all cannot be reverted.\n";

        return false;
    }
    */
}
