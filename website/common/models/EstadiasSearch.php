<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Estadias;

/**
 * EstadiasSearch represents the model behind the search form of `common\models\Estadias`.
 */
class EstadiasSearch extends Estadias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idCliente', 'idQuarto', 'duracao', 'lotacao'], 'integer'],
            [['dataPedido', 'dataInicio', 'dataTermo'], 'safe'],
            [['valorTotal'], 'number'],
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
        $query = Estadias::find();

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
            'dataPedido' => $this->dataPedido,
            'idCliente' => $this->idCliente,
            'idQuarto' => $this->idQuarto,
            'dataInicio' => $this->dataInicio,
            'dataTermo' => $this->dataTermo,
            'duracao' => $this->duracao,
            'lotacao' => $this->lotacao,
            'valorTotal' => $this->valorTotal,
        ]);

        return $dataProvider;
    }
}
