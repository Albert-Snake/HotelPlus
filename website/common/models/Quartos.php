<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quartos".
 *
 * @property int $id
 * @property int $lotacao
 * @property int $nrCamas
 * @property int $nrCasasBanho
 * @property string $acessoDef
 * @property float $valorNoite
 *
 * @property Estadias[] $estadias
 * @property Limpezas[] $limpezas
 */
class Quartos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quartos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lotacao', 'nrCamas', 'nrCasasBanho', 'acessoDef', 'valorNoite'], 'required'],
            [['id', 'lotacao', 'nrCamas', 'nrCasasBanho'], 'integer'],
            [['acessoDef'], 'string'],
            [['valorNoite'], 'number'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lotacao' => 'Lotacao',
            'nrCamas' => 'Nr Camas',
            'nrCasasBanho' => 'Nr Casas Banho',
            'acessoDef' => 'Acesso Def',
            'valorNoite' => 'Valor Noite',
        ];
    }

    /**
     * Gets query for [[Estadias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadias()
    {
        return $this->hasMany(Estadias::class, ['idQuarto' => 'id']);
    }

    /**
     * Gets query for [[Limpezas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLimpezas()
    {
        return $this->hasMany(Limpezas::class, ['idQuarto' => 'id']);
    }
}
