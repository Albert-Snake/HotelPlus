<?php

namespace common\tests;

use common\models\Estadias;

class EstadiasTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    //TESTES
    public function testValidations(){
        $estadias = new Estadias();

        //Campo dataPedido
        $estadias->dataPedido = null;
        $this->assertFalse($estadias->validate(['dataPedido']));
        $estadias->dataPedido = "2023-01-02";
        $this->assertTrue($estadias->validate(['dataPedido']));

        //Campo idCliente
        $estadias->idCliente = null;
        $this->assertFalse($estadias->validate(['idCliente']));
        $estadias->idCliente = "teste";
        $this->assertFalse($estadias->validate(['idCliente']));
        $estadias->idCliente = 5;
        $this->assertTrue($estadias->validate(['idCliente']));

        //Campo idQuarto
        $estadias->idQuarto = "teste";
        $this->assertFalse($estadias->validate(['idQuarto']));
        $estadias->idQuarto = null;
        $this->assertFalse($estadias->validate(['idQuarto']));
        $estadias->idQuarto = 303;
        $this->assertTrue($estadias->validate(['idQuarto']));

        //Campo dataInicio
        $estadias->dataInicio = null;
        $this->assertFalse($estadias->validate(['dataInicio']));
        $estadias->dataInicio = "2023-10-20";
        $this->assertTrue($estadias->validate(['dataInicio']));

        //Campo dataTermo
        $estadias->dataTermo = null;
        $this->assertFalse($estadias->validate(['dataTermo']));
        $estadias->dataTermo = "2023-10-20";
        $this->assertTrue($estadias->validate(['dataTermo']));

        //Campo duracao
        $estadias->duracao = null;
        $this->assertFalse($estadias->validate(['duracao']));
        $estadias->duracao = "teste";
        $this->assertFalse($estadias->validate(['duracao']));
        $estadias->duracao = 5;
        $this->assertTrue($estadias->validate(['duracao']));

        //Campo lotacao
        $estadias->lotacao = null;
        $this->assertFalse($estadias->validate(['lotacao']));
        $estadias->lotacao = "teste";
        $this->assertFalse($estadias->validate(['lotacao']));
        $estadias->lotacao = 5;
        $this->assertTrue($estadias->validate(['lotacao']));

        //Campo valorTotal
        $estadias->valorTotal = null;
        $this->assertFalse($estadias->validate(['valorTotal']));
        $estadias->valorTotal = "teste";
        $this->assertFalse($estadias->validate(['valorTotal']));
        $estadias->valorTotal = 100;
        $this->assertTrue($estadias->validate(['valorTotal']));
    }

    public function testInsertEstadia(){
        $estadias = new Estadias();

        $estadias->dataPedido = "2022-10-20";
        $estadias->idCliente = 6;
        $estadias->idQuarto = 303;
        $estadias->dataInicio = "2022-10-20";
        $estadias->dataTermo = "2022-10-25";
        $estadias->duracao = 5;
        $estadias->lotacao = 3;
        $estadias->valorTotal = 100;
        $estadias->save();

        $this->tester->seeRecord('common\models\Estadias', ['dataPedido' => '2022-10-20'], ['idCliente' => 6],
            ['idQuarto' => 303], ['dataInicio' => '2022-10-20'], ['dataTermo' => '2022-10-25'], ['duracao' => 5], ['lotacao' => 3], ['valorTotal' => 100]);
    }

    public function testAlterEstadia(){
        $estadias = new Estadias();

        $estadias->dataPedido = "2022-10-20";
        $estadias->idCliente = 6;
        $estadias->idQuarto = 303;
        $estadias->dataInicio = "2022-10-20";
        $estadias->dataTermo = "2022-10-25";
        $estadias->duracao = 5;
        $estadias->lotacao = 3;
        $estadias->valorTotal = 100;
        $estadias->save();

        $estadia = Estadias::find()
            ->where(['dataPedido' => '2022-10-20', 'idCliente' => 6, 'idQuarto' => 303, 'dataInicio' => '2022-10-20',
                'dataTermo' => '2022-10-25', 'duracao' => 5, 'lotacao' => 3, 'valorTotal' => 100])
            ->one();

        $estadia->dataPedido = "2022-10-21";
        $estadia->dataInicio = "2022-10-21";
        $estadia->duracao = 4;
        $estadia->valorTotal = 150;
        $estadia->save();


        $this->tester->seeRecord('common\models\Estadias', ['dataPedido' => '2022-10-21'], ['idCliente' => 6],
            ['idQuarto' => 303], ['dataInicio' => '2022-10-21'], ['dataTermo' => '2022-10-25'], ['duracao' => 4], ['lotacao' => 3], ['valorTotal' => 150]);

        $this->tester->dontSeeRecord('common\models\Estadias', ['dataPedido' => '2022-10-20'], ['idCliente' => 6],
            ['idQuarto' => 303], ['dataInicio' => '2022-10-20'], ['dataTermo' => '2022-10-25'], ['duracao' => 5], ['lotacao' => 3], ['valorTotal' => 100]);
    }

    public function testDeleteEstadia(){
        $estadias = new Estadias();

        $estadias->dataPedido = "2022-10-20";
        $estadias->idCliente = 6;
        $estadias->idQuarto = 303;
        $estadias->dataInicio = "2022-10-20";
        $estadias->dataTermo = "2022-10-25";
        $estadias->duracao = 5;
        $estadias->lotacao = 3;
        $estadias->valorTotal = 100;
        $estadias->save();

        $estadia = Estadias::find()
            ->where(['dataPedido' => '2022-10-20', 'idCliente' => 6, 'idQuarto' => 303, 'dataInicio' => '2022-10-20',
                'dataTermo' => '2022-10-25', 'duracao' => 5, 'valorTotal' => 100, ])
            ->one();

        $estadia->delete();

        $this->tester->dontSeeRecord('common\models\Estadias', ['dataPedido' => '2022-10-20'], ['idCliente' => 6],
            ['idQuarto' => 303], ['dataInicio' => '2022-10-20'], ['dataTermo' => '2022-10-25'], ['duracao' => 5], ['lotacao' => 3], ['valorTotal' => 100]);
    }

}
