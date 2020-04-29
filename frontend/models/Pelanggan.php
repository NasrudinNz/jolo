<?php

namespace app\models;

use Yii;

class Pelanggan extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pelanggan';
    }

    public function rules()
    {
        return [
            [['jenis_pel', 'pic', 'nama', 'id_kota', 'id_kec', 'id_kelurahan', 'alamat', 'rt', 'rw', 'hp1', 'hp2', 'id_tipe', 'id_merk', 'id_warna', 'id_kategori', 'id_kategori_baru', 'id_sales', 'tgl_simpan', 'tgl_kategori'], 'required'],
            [['jenis_pel', 'id_tipe', 'id_merk', 'id_warna', 'id_kategori', 'id_kategori_baru', 'id_sales'], 'integer'],
            [['tgl_simpan', 'tgl_kategori'], 'safe'],
            [['pic', 'hp1', 'hp2'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 100],
            [['id_kota', 'id_kec', 'id_kelurahan'], 'string', 'max' => 11],
            [['alamat'], 'string', 'max' => 200],
            [['rt', 'rw'], 'string', 'max' => 10],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriPel::className(), 'targetAttribute' => ['id_kategori' => 'id']],
            [['id_sales'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::className(), 'targetAttribute' => ['id_sales' => 'id']],
            [['id_kategori_baru'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriPel::className(), 'targetAttribute' => ['id_kategori_baru' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_pel' => 'Jenis Pel',
            'pic' => 'Pic',
            'nama' => 'Nama',
            'id_kota' => 'Id Kota',
            'id_kec' => 'Id Kec',
            'id_kelurahan' => 'Id Kelurahan',
            'alamat' => 'Alamat',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'hp1' => 'Hp1',
            'hp2' => 'Hp2',
            'id_tipe' => 'Id Tipe',
            'id_merk' => 'Id Merk',
            'id_warna' => 'Id Warna',
            'id_kategori' => 'Id Kategori',
            'id_kategori_baru' => 'Id Kategori Baru',
            'id_sales' => 'Id Sales',
            'tgl_simpan' => 'Tgl Simpan',
            'tgl_kategori' => 'Tgl Kategori',
        ];
    }

    public function getKategori()
    {
        return $this->hasOne(KategoriPel::className(), ['id' => 'id_kategori']);
    }

    public function getKategoriName()
    {
        if($this->kategori) {return $this->kategori->nama;}
    }

    public function getSales()
    {
        return $this->hasOne(Sales::className(), ['id' => 'id_sales']);
    }

    public function getSalesName()
    {
        if($this->sales){return $this->sales->nama;}
    }

    public function getKategoriBaru()
    {
        return $this->hasOne(KategoriPel::className(), ['id' => 'id_kategori_baru']);
    }

    public function getKota()
    {
        return $this->hasOne(SetKota::className(),['id'=>'id_kota']);
    }

    public function getKotaName()
    {
       if ($this->kota){ return $this->kota->nama; }
    }

    public function getKec()
    {
        return $this->hasOne(SetKec::className(),['id' => 'id_kec']);
    }

    public function getKecName()
    {
        if ($this->kec) {return $this->kec->nama;}
    }

    public function getDesa()
    {
        return $this->hasOne(SetDesa::className(),['id'=>'id_kelurahan']);
    }

    public function getDesaName()
    {
       if ($this->desa) {return $this->desa->nama;}
    }

    public function getMerk()
    {
        return $this->hasOne(SetMerk::className(),['id'=>'id_merk']);
    }

    public function getMerkName()
    {
        if ($this->merk) {return $this->merk->nama;}
    }

    public function getTipe()
    {
        return $this->hasOne(SetTipe::className(),['id'=>'id_tipe']);
    }

    public function getTipeName()
    {
        if ($this->tipe) {return $this->tipe->nama;}
    }

    public function getWarna()
    {
        return $this->hasOne(SetWarna::className(),['id'=>'id_warna']);
    }

    public function getWarnaName()
    {
       if ($this->warna) {return $this->warna->nama;}
    }
}
