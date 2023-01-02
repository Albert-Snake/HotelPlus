<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "limpezas".
 *
 * @property int $id
 * @property int $idColaborador
 * @property int $idCliente
 * @property int $idQuarto
 * @property string $data
 * @property string $estado
 * @property string $perturbar
 *
 * @property User $idCliente0
 * @property User $idColaborador0
 * @property Quartos $idQuarto0
 */
class Limpezas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'limpezas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idColaborador', 'idCliente', 'idQuarto', 'data', 'estado', 'perturbar'], 'required'],
            [['idColaborador', 'idCliente', 'idQuarto'], 'integer'],
            [['data'], 'safe'],
            [['estado', 'perturbar'], 'string'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idCliente' => 'id']],
            [['idColaborador'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idColaborador' => 'id']],
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
            'idColaborador' => 'Id Colaborador',
            'idCliente' => 'Id Cliente',
            'idQuarto' => 'Id Quarto',
            'data' => 'Data',
            'estado' => 'Estado',
            'perturbar' => 'Perturbar',
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
     * Gets query for [[IdColaborador0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdColaborador0()
    {
        return $this->hasOne(User::class, ['id' => 'idColaborador']);
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
