<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "set_desa".
 *
 * @property string $id
 * @property string $kec_id
 * @property string $nama
 *
 * @property SetKec $kec
 */
class SetDesa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'set_desa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kec_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['kec_id'], 'string', 'max' => 7],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['kec_id'], 'exist', 'skipOnError' => true, 'targetClass' => SetKec::className(), 'targetAttribute' => ['kec_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kec_id' => 'Kec ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * Gets query for [[Kec]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKec()
    {
        return $this->hasOne(SetKec::className(), ['id' => 'kec_id']);
    }
}
