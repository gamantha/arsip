<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penyimpanan;

/**
 * PenyimpananSearch represents the model behind the search form about `app\models\Penyimpanan`.
 */
class PenyimpananSearch extends Penyimpanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['penyimpanan_id'], 'integer'],
            [['tempat_penyimpanan'], 'safe'],
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
        $query = Penyimpanan::find();

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
            'penyimpanan_id' => $this->penyimpanan_id,
        ]);

        $query->andFilterWhere(['like', 'tempat_penyimpanan', $this->tempat_penyimpanan]);

        return $dataProvider;
    }
}
