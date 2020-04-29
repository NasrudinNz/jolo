<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "set_warna".
 *
 * @property int $id
 * @property int $id_merk
 * @property string $nama
 *
 * @property SetMerk $merk
 */
class SetWarna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'set_warna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_merk', 'nama'], 'required'],
            [['id_merk'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['id_merk'], 'exist', 'skipOnError' => true, 'targetClass' => SetMerk::className(), 'targetAttribute' => ['id_merk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_merk' => 'Id Merk',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[Merk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerk()
    {
        return $this->hasOne(SetMerk::className(), ['id' => 'id_merk']);
    }
}
