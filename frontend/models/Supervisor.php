<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supervisor".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $hp1
 * @property string $hp2
 * @property string $tgl_simpan
 * @property int $aktif 0=tidak aktif,1=aktif
 * @property string $username
 * @property string $pass
 * @property string $os_id
 */
class Supervisor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supervisor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'hp1', 'hp2', 'tgl_simpan', 'username', 'pass', 'os_id'], 'required'],
            [['tgl_simpan'], 'safe'],
            [['aktif'], 'integer'],
            [['os_id'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 200],
            [['hp1', 'hp2', 'username', 'pass'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'hp1' => 'No. Telepon(1)',
            'hp2' => 'No. Telepon(2)',
            'tgl_simpan' => 'Tgl Simpan',
            'aktif' => 'Aktif',
            'username' => 'Username',
            'pass' => 'Pass',
            'os_id' => 'Os ID',
        ];
    }
}
