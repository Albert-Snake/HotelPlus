<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estadias".
 *
 * @property int $id
 * @property string $dataPedido
 * @property int $idCliente
 * @property int $idQuarto
 * @property string $dataInicio
 * @property string $dataTermo
 * @property int $duracao
 * @property int $lotacao
 * @property float $valorTotal
 *
 * @property Checkins[] $checkins
 * @property User $idCliente0
 * @property Quartos $idQuarto0
 */
class Estadias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estadias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dataPedido', 'idCliente', 'idQuarto', 'dataInicio', 'dataTermo', 'duracao', 'lotacao', 'valorTotal'], 'required'],
            [['dataPedido', 'dataInicio', 'dataTermo'], 'safe'],
            [['idCliente', 'idQuarto', 'duracao', 'lotacao'], 'integer'],
            [['valorTotal'], 'number'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idCliente' => 'id']],
            [['idQuarto'], 'exist', 'skipOnError' => true, 'targetClass' => Quartos::class, 'targetAttribute' => ['idQuarto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dataPedido' => 'Data Pedido',
            'idCliente' => 'Id Cliente',
            'idQuarto' => 'Id Quarto',
            'dataInicio' => 'Data Inicio',
            'dataTermo' => 'Data Termo',
            'duracao' => 'Duracao',
            'lotacao' => 'Lotacao',
            'valorTotal' => 'Valor Total',
        ];
    }

    /**
     * Gets query for [[Checkins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheckins()
    {
        return $this->hasMany(Checkins::class, ['idEstadia' => 'id']);
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
     * Gets query for [[IdQuarto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdQuarto0()
    {
        return $this->hasOne(Quartos::class, ['id' => 'idQuarto']);
    }
}
