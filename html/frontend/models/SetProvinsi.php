<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "set_provinsi".
 *
 * @property string $id
 * @property string $nama
 *
 * @property SetKota[] $setKotas
 */
class SetProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'set_provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
     * Gets query for [[SetKotas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSetKotas()
    {
        return $this->hasMany(SetKota::className(), ['provinsi_id' => 'id']);
    }
}
