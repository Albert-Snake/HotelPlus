<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mesasmarcacoes".
 *
 * @property int $id
 * @property int $idCliente
 * @property int $idMesa
 * @property int $nrPessoas
 * @property string $data
 * @property string $estado
 *
 * @property User $idCliente0
 * @property Mesas $idMesa0
 */
class Mesasmarcacoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesasmarcacoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'idMesa', 'nrPessoas', 'data', 'estado'], 'required'],
            [['idCliente', 'idMesa', 'nrPessoas'], 'integer'],
            [['data'], 'safe'],
            [['estado'], 'string'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idCliente' => 'id']],
            [['idMesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesas::class, 'targetAttribute' => ['idMesa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCliente' => 'Id Cliente',
            'idMesa' => 'Id Mesa',
            'nrPessoas' => 'Nr Pessoas',
            'data' => 'Data',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(User::class, ['id' => 'idCliente']);
    }

    /**
     * Gets query for [[IdMesa0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMesa0()
    {
        return $this->hasOne(Mesas::class, ['id' => 'idMesa']);
    }
}
