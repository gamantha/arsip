<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Divisi;

/**
 * DivisiSearch represents the model behind the search form about `app\models\Divisi`.
 */
class DivisiSearch extends Divisi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['divisi_id'], 'integer'],
            [['nama_divisi'], 'safe'],
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
        $query = Divisi::find();

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
            'divisi_id' => $this->divisi_id,
        ]);

        $query->andFilterWhere(['like', 'nama_divisi', $this->nama_divisi]);

        return $dataProvider;
    }
}
