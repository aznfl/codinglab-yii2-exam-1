<?php

use yii\db\Migration;

/**
 * Class m230211_094540_add_data_ref_status_wali
 */
class m230211_094540_add_data_ref_status_wali extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->batchInsert(
            'ref_status_wali',
            [
                'status_wali',
            ],
            [
                ['Ayah Kandung'],
                ['Ibu Kandung'],
                ['Keluarga'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230211_094540_add_data_ref_status_wali cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230211_094540_add_data_ref_status_wali cannot be reverted.\n";

        return false;
    }
    */
}
