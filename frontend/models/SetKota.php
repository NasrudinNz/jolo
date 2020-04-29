<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "set_kota".
 *
 * @property string $id
 * @property string $provinsi_id
 * @property string $nama
 *
 * @property SetKec[] $setKecs
 * @property SetProvinsi $provinsi
 */
class SetKota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'set_kota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provinsi_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 4],
            [['provinsi_id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => SetProvinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi_id' => 'Provinsi ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[SetKecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSetKecs()
    {
        return $this->hasMany(SetKec::className(), ['kota_id' => 'id']);
    }

    /**
     * Gets query for [[Provinsi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(SetProvinsi::className(), ['id' => 'provinsi_id']);
    }
}
