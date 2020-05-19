<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_pel".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Pelanggan[] $pelanggans
 * @property Pelanggan[] $pelanggans0
 */
class KategoriPel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_pel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * Gets query for [[Pelanggans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggans()
    {
        return $this->hasMany(Pelanggan::className(), ['id_kategori' => 'id']);
    }

    /**
     * Gets query for [[Pelanggans0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggans0()
    {
        return $this->hasMany(Pelanggan::className(), ['id_kategori_baru' => 'id']);
    }
}
