<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property int $id
 * @property string|null $nama_guru
 * @property int|null $id_user
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'default', 'value' => null],
            [['id_user'], 'integer'],
            [['nama_guru'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_guru' => 'Nama Guru',
            'id_user' => 'Id User',
        ];
    }

    public function getUsername()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function cekStatusMapel($id_mapel)
    {
        return $this->hasOne(GuruMataPelajaran::className(), ['id_guru' => 'id'])->andOnCondition(['id_mata_pelajaran' => $id_mapel])->exists();
    }
}
