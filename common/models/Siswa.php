<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property int $id
 * @property string|null $nis
 * @property string|null $nama
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $alamat
 * @property int|null $id_kelas
 * @property int|null $id_user
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['id_kelas', 'id_user'], 'default', 'value' => null],
            [['id_kelas', 'id_user'], 'integer'],
            [['nis', 'tempat_lahir'], 'string', 'max' => 25],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nis' => 'Nis',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'id_kelas' => 'Id Kelas',
            'id_user' => 'Id User',
        ];
    }
    
    public function getUsername()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    
    public function getNamaKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'id_kelas']);
    }
}
