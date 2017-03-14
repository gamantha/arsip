<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kendaraan;

/**
 * KendaraanSearch represents the model behind the search form of `app\models\Kendaraan`.
 */
class KendaraanSearch extends Kendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama', 'warna', 'merk', 'model', 'tahun', 'driver', 'nama_pemilik', 'alamat_pemilik', 'plat', 'catatan', 'image'], 'safe'],
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
        $query = Kendaraan::find();

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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'warna', $this->warna])
            ->andFilterWhere(['like', 'merk', $this->merk])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'tahun', $this->tahun])
            ->andFilterWhere(['like', 'driver', $this->driver])
            ->andFilterWhere(['like', 'nama_pemilik', $this->nama_pemilik])
            ->andFilterWhere(['like', 'alamat_pemilik', $this->alamat_pemilik])
            ->andFilterWhere(['like', 'plat', $this->plat])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
