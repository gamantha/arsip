<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsipKendaraan;

/**
 * ArsipkendaraanSearch represents the model behind the search form of `app\models\ArsipKendaraan`.
 */
class ArsipkendaraanSearch extends ArsipKendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kendaraan_id', 'biaya', 'penyimpanan_id'], 'integer'],
            [['tanggal', 'keterangan', 'tempat', 'pic', 'tipe', 'no_surat', 'expire_date', 'status', 'created_at', 'modified_at'], 'safe'],
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
        $query = ArsipKendaraan::find();

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
            'tanggal' => $this->tanggal,
            'kendaraan_id' => $this->kendaraan_id,
            'biaya' => $this->biaya,
            'penyimpanan_id' => $this->penyimpanan_id,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'tempat', $this->tempat])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'tipe', $this->tipe])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'expire_date', $this->expire_date])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
