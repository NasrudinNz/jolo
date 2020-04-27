<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property int $id
 * @property int $id_sales
 * @property string $lat
 * @property string $lang
 * @property string $tgl
 * @property string $alamat
 * @property string $app_version
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sales', 'lat', 'lang', 'tgl', 'alamat', 'app_version'], 'required'],
            [['id_sales'], 'integer'],
            [['tgl'], 'safe'],
            [['alamat'], 'string'],
            [['lat', 'lang'], 'string', 'max' => 50],
            [['app_version'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sales' => 'Nama Sales',
            'lat' => 'Lat',
            'lang' => 'Lang',
            'tgl' => 'Tgl',
            'alamat' => 'Alamat',
            'app_version' => 'App Version',
        ];
    }
}
