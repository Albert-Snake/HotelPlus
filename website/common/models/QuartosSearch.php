<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Quartos;

/**
 * QuartosSearch represents the model behind the search form of `common\models\Quartos`.
 */
class QuartosSearch extends Quartos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lotacao', 'nrCamas', 'nrCasasBanho'], 'integer'],
            [['acessoDef'], 'safe'],
            [['valorNoite'], 'number'],
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
        $query = Quartos::find();

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
            'lotacao' => $this->lotacao,
            'nrCamas' => $this->nrCamas,
            'nrCasasBanho' => $this->nrCasasBanho,
            'valorNoite' => $this->valorNoite,
        ]);

        $query->andFilterWhere(['like', 'acessoDef', $this->acessoDef]);

        return $dataProvider;
    }
}
