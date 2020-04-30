<?php

namespace frontend\models;

use DateInterval;
use DateTime;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Absensi;

/**
 * AbsensiSearch represents the model behind the search form of `frontend\models\Absensi`.
 */
class AbsensiSearch extends Absensi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_sales'], 'integer'],
            [['lat', 'lang', 'tgl', 'alamat', 'app_version'], 'safe'],
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
        $query = Absensi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20, 
            ], 
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
            'id_sales' => $this->id_sales,
            'tgl' => $this->tgl,
        ]);

        $query
            ->andFilterWhere(['>', 'tgl' , date('Y-m-d 00:00:00')])
            ->andFilterWhere(['<>', 'id_sales','46'])
            ->orderBy(['tgl'=>SORT_ASC]);

        return $dataProvider;
    }
}
