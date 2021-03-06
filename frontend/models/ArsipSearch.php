<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Arsip;

/**
 * ArsipSearch represents the model behind the search form about `app\models\Arsip`.
 */
class ArsipSearch extends Arsip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['id','divisi_id',  'jabatan_id','penyimpanan_id'], 'integer'],
           // [['no_surat', 'tanggal_simpan','tema', 'perusahaan_id','jenis'], 'safe'],
           [['id', 'perusahaan_id', 'divisi_id', 'jabatan_id','penyimpanan_id'], 'integer'],
           [['no_surat', 'tema', 'detail', 'tanggal_simpan', 'jenis', 'dikirim_ke', 'created_at', 'modified_at', 'receipt'], 'safe'],
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
        $query = Arsip::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
           'id' => $this->id,
           'detail' => $this->detail,
           'tema' => $this->tema,
           //'tanggal_simpan' => $this->tanggal_simpan,
           'perusahaan_id' => $this->perusahaan_id,
           'divisi_id' => $this->divisi_id,
           'dikirim_ke' => $this->dikirim_ke,
           'jabatan_id' => $this->jabatan_id,
           'penyimpanan_id' => $this->penyimpanan_id,
            'jenis' => $this->jenis,
           //'created_at' => $this->created_at,
           'modified_at' => $this->modified_at,
       ]);
        

        $query->andFilterWhere(['like', 'no_surat', $this->no_surat])
->andFilterWhere(['like', 'jenis', $this->jenis])
->andFilterWhere(['between', 'created_at', $this->created_at, (isset(explode(' ',$this->created_at)[2]) ? explode(' ',$this->created_at)[2] : $this->created_at)])
->andFilterWhere(['between', 'tanggal_simpan', $this->tanggal_simpan, (isset(explode(' ',$this->tanggal_simpan)[2]) ? explode(' ',$this->tanggal_simpan)[2] : $this->tanggal_simpan)])
->andFilterWhere(['like', 'dikirim_ke', $this->dikirim_ke])
->andFilterWhere(['like', 'receipt', $this->receipt]);



        return $dataProvider;
    }
}
