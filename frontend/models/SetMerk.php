<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "set_merk".
 *
 * @property int $id
 * @property string $nama
 *
 * @property SetTipe[] $setTipes
 * @property SetWarna[] $setWarnas
 */
class SetMerk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'set_merk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
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
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[SetTipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSetTipes()
    {
        return $this->hasMany(SetTipe::className(), ['id_merk' => 'id']);
    }

    /**
     * Gets query for [[SetWarnas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSetWarnas()
    {
        return $this->hasMany(SetWarna::className(), ['id_merk' => 'id']);
    }
}
