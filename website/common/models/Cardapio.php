<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cardapio".
 *
 * @property int $id
 * @property string $categoria
 * @property string $nome
 * @property string $descricao
 * @property float $valor
 */
class Cardapio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cardapio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria', 'nome', 'descricao', 'valor'], 'required'],
            [['categoria'], 'string'],
            [['valor'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
        ];
    }
}
