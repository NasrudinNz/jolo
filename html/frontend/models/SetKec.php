<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;

/**
 * This is the model class for table "set_kec".
 *
 * @property string $id
 * @property string $kota_id
 * @property string $nama
 *
 * @property SetDesa[] $setDesas
 * @property SetKota $kota
 */
class SetKec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'set_kec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kota_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 7],
            [['kota_id'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => SetKota::className(), 'targetAttribute' => ['kota_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kota_id' => 'Kota ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[SetDesas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSetDesas()
    {
        return $this->hasMany(SetDesa::className(), ['kec_id' => 'id']);
    }

    /**
     * Gets query for [[Kota]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKota()
    {
        return $this->hasOne(SetKota::className(), ['id' => 'kota_id']);
    }
}
