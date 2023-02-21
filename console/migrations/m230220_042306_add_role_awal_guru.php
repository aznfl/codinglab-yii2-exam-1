<?php

use yii\db\Migration;

/**
 * Class m230220_042306_add_role_awal_guru
 */
class m230220_042306_add_role_awal_guru extends Migration
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
                    'Guru', 1, NULL, NULL, NULL, time(), time()
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230220_042306_add_role_awal_guru cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230220_042306_add_role_awal_guru cannot be reverted.\n";

        return false;
    }
    */
}
