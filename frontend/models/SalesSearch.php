<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sales;

/**
 * SalesSearch represents the model behind the search form of `app\models\Sales`.
 */
class SalesSearch extends Sales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aktif', 'id_supervisor'], 'integer'],
            [['nama', 'alamat', 'hp1', 'hp2', 'tgl_simpan', 'username', 'pass', 'os_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Sales::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'tgl_simpan' => $this->tgl_simpan,
            'aktif' => $this->aktif,
            'id_supervisor' => $this->id_supervisor,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'hp1', $this->hp1])
            ->andFilterWhere(['like', 'hp2', $this->hp2])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['<>', 'nama', 'dsi'])
            ->andFilterWhere(['<>', 'nama', 'DSI SALES'])
            ->andFilterWhere(['<>', 'nama', 'DSI SALES2'])
            ->andFilterWhere(['like', 'os_id', $this->os_id]);

        return $dataProvider;
    }
}
