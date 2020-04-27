<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
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
 * @property int $id_supervisor
 *
 * @property Pelanggan[] $pelanggans
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'hp1', 'hp2', 'tgl_simpan', 'username', 'pass', 'os_id', 'id_supervisor'], 'required'],
            [['tgl_simpan'], 'safe'],
            [['aktif', 'id_supervisor'], 'integer'],
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
            'hp1' => 'Hp1',
            'hp2' => 'Hp2',
            'tgl_simpan' => 'Tgl Simpan',
            'aktif' => 'Aktif',
            'username' => 'Username',
            'pass' => 'Pass',
            'os_id' => 'Os ID',
            'id_supervisor' => 'Id Supervisor',
        ];
    }

    /**
     * Gets query for [[Pelanggans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggans()
    {
        return $this->hasMany(Pelanggan::className(), ['id_sales' => 'id']);
    }
}
