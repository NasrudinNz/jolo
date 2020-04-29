<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelanggan;

class PelangganSearch extends Pelanggan
{

    public function rules()
    {
        return [
            [['id', 'jenis_pel', 'id_tipe', 'id_merk', 'id_warna', 'id_kategori', 'id_kategori_baru', 'id_sales'], 'integer'],
            [['pic', 'nama', 'id_kota', 'id_kec', 'id_kelurahan', 'alamat', 'rt', 'rw', 'hp1', 'hp2', 'tgl_simpan', 'tgl_kategori'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Pelanggan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,   
            
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jenis_pel' => $this->jenis_pel,
            'id_tipe' => $this->id_tipe,
            'id_merk' => $this->id_merk,
            'id_warna' => $this->id_warna,
            'id_kategori' => $this->id_kategori,
            'id_kategori_baru' => $this->id_kategori_baru,
            'id_sales' => $this->id_sales,
            'tgl_simpan' => $this->tgl_simpan,
            'tgl_kategori' => $this->tgl_kategori,
        ]);

        $query->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'id_kota', $this->id_kota])
            ->andFilterWhere(['like', 'id_kec', $this->id_kec])
            ->andFilterWhere(['like', 'id_kelurahan', $this->id_kelurahan])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'hp1', $this->hp1])
            ->andFilterWhere(['like', 'hp2', $this->hp2])
            ->orderBy(['nama'=>SORT_ASC]);

        return $dataProvider;
    }
}
