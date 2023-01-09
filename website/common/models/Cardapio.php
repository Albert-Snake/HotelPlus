<?php

namespace common\models;

use backend\mosquitto\phpMQTT;
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        //Obter dados do registo em causa
        $msgInsert = $this->nome." foi adicionado ao nosso cardapio. Pelo valor de ".$this->valor."€, aproveite já";
        $msgUpdate = $this->nome." foi atualizado no nosso cardapio. Pelo valor de ".$this->valor."€, aproveite já";
        if ($insert)
            $this->FazPublish("MSG", $msgInsert);
        else
            $this->FazPublish("MSG", $msgUpdate);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $msgDelete = "Com muita pena nossa, ".$this->nome." já não se encontra disponivel";
        $this->FazPublish("MSG",$msgDelete);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        //Foi adicionado um novo arranjo 'dimensao' com 'descricao', por 'preco'€, aproveite enquanto o stock esta em estado: 'status'
        else { file_put_contents("debug.output","Time out!"); }
    }
}
