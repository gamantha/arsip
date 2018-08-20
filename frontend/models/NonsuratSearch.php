<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nonsurat;

/**
 * NonsuratSearch represents the model behind the search form about `app\models\Nonsurat`.
 */
class NonsuratSearch extends Nonsurat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'perusahaan_id', 'divisi_id', 'penyimpanan_id','year'], 'integer'],
               [['no_surat', 'judul', 'tipe', 'tanggal_simpan', 'tema', 'deskripsi', 'status', 'expire_date', 'created_at', 'modified_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Nonsurat::find();

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
            'tanggal_simpan' => $this->tanggal_simpan,
            'perusahaan_id' => $this->perusahaan_id,
            'divisi_id' => $this->divisi_id,
            'tema' => $this->tema,
            'penyimpanan_id' => $this->penyimpanan_id,
           'year' => $this->year,
            //'created_at' => $this->created_at,
               'expire_date' => $this->expire_date,
           'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['between', 'created_at', $this->created_at, (isset(explode(' ',$this->created_at)[2]) ? explode(' ',$this->created_at)[2] : $this->created_at)])
                   ->andFilterWhere(['like', 'judul', $this->judul])
           ->andFilterWhere(['like', 'tipe', $this->tipe])
           ->andFilterWhere(['like', 'tema', $this->tema])
           ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])

            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
