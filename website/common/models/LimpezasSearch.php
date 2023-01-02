<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Limpezas;

/**
 * LimpezasSearch represents the model behind the search form of `common\models\Limpezas`.
 */
class LimpezasSearch extends Limpezas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idColaborador', 'idCliente', 'idQuarto'], 'integer'],
            [['data', 'estado', 'perturbar'], 'safe'],
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
        $query = Limpezas::find();

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
            'idColaborador' => $this->idColaborador,
            'idCliente' => $this->idCliente,
            'idQuarto' => $this->idQuarto,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'perturbar', $this->perturbar]);

        return $dataProvider;
    }
}
