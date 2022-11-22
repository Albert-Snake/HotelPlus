<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mesas".
 *
 * @property int $id
 * @property int $lotacao
 * @property string $forma
 *
 * @property Mesasmarcacoes[] $mesasmarcacoes
 */
class Mesas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lotacao', 'forma'], 'required'],
            [['id', 'lotacao'], 'integer'],
            [['forma'], 'string'],
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
            'forma' => 'Forma',
        ];
    }

    /**
     * Gets query for [[Mesasmarcacoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMesasmarcacoes()
    {
        return $this->hasMany(Mesasmarcacoes::class, ['idMesa' => 'id']);
    }
}
