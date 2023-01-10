<?php

namespace common\tests;

use common\models\Mesasmarcacoes;

class MesasMarcacoesTest extends \Codeception\Test\Unit
{

    protected $tester;

    protected function _before()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    //TESTES
    public function testValidations(){
        $mesasM = new Mesasmarcacoes();

        //Campo idCliente
        $mesasM->idCliente = "teste";
        $this->assertFalse($mesasM->validate(['idCliente']));
        $mesasM->idCliente = null;
        $this->assertFalse($mesasM->validate(['idCliente']));
        $mesasM->idCliente = 5;
        $this->assertTrue($mesasM->validate(['idCliente']));

        //Campo idMesa
        $mesasM->idMesa = "teste";
        $this->assertFalse($mesasM->validate(['idMesa']));
        $mesasM->idMesa = null;
        $this->assertFalse($mesasM->validate(['idMesa']));
        $mesasM->idMesa = 1;
        $this->assertTrue($mesasM->validate(['idMesa']));

        //Campo nrPessoas
        $mesasM->nrPessoas = "teste";
        $this->assertFalse($mesasM->validate(['nrPessoas']));
        $mesasM->nrPessoas = null;
        $this->assertFalse($mesasM->validate(['nrPessoas']));
        $mesasM->nrPessoas = 1;
        $this->assertTrue($mesasM->validate(['nrPessoas']));

        //Campo data
        $mesasM->data = null;
        $this->assertFalse($mesasM->validate(['data']));
        $mesasM->data = "2023-01-05";
        $this->assertTrue($mesasM->validate(['data']));

        //Campo estado
        $mesasM->estado = null;
        $this->assertFalse($mesasM->validate(['estado']));
        $mesasM->estado = 1;
        $this->assertFalse($mesasM->validate(['estado']));
        $mesasM->estado = "entregue";
        $this->assertTrue($mesasM->validate(['estado']));

    }

    public function testInsertUserPackage(){
        $mesasM = new Mesasmarcacoes();

        $mesasM->idCliente = 6;
        $mesasM->idMesa = 1;
        $mesasM->nrPessoas = 5;
        $mesasM->data = "2022-01-14";
        $mesasM->estado = "não entregue";
        $mesasM->save();

        $this->tester->seeRecord('common\models\Mesasmarcacoes', ['idCliente' => 6], ['idMesa' => 1],
            ['nrPessoas' => 5], ['data' => '2022-01-14'], ['estado' => 'não entregue']);
    }

    public function testAlterUserPackage(){
        $mesasM = new Mesasmarcacoes();

        $mesasM->idCliente = 7;
        $mesasM->idMesa = 1;
        $mesasM->nrPessoas = 5;
        $mesasM->data = "2023-01-14";
        $mesasM->estado = "não entregue";
        $mesasM->save();

        $mesaM = Mesasmarcacoes::find()
            ->where(['idCliente' => 7, 'idMesa' => 1, 'data' => '2023-01-14'])
            ->one();

        $mesaM->idCliente = 6;
        $mesaM->estado = "entregue";
        $mesaM->save();


        $this->tester->seeRecord('common\models\Mesasmarcacoes', ['idCliente' => 6], ['idMesa' => 1],
            ['nrPessoas' => 5], ['data' => '2023-01-14'], ['estado' => 'entregue']);

        $this->tester->dontSeeRecord('common\models\Mesasmarcacoes', ['idCliente' => 7], ['idMesa' => 1],
            ['nrPessoas' => 5], ['data' => '2023-01-14'], ['estado' => 'não entregue']);
    }

    public function testDeleteUserPackage(){
        $mesasM = new Mesasmarcacoes();

        $mesasM->idCliente = 8;
        $mesasM->idMesa = 3;
        $mesasM->nrPessoas = 4;
        $mesasM->data = "2023-01-15";
        $mesasM->estado = "não entregue";
        $mesasM->save();

        $mesaM = Mesasmarcacoes::find()
            ->where(['idCliente' => 8, 'idMesa' => 3, 'data' => '2023-01-15'])
            ->one();

        $mesaM->delete();

        $this->tester->dontSeeRecord('common\models\Mesasmarcacoes', ['idCliente' => 8], ['idMesa' => 3],
            ['nrPessoas' => 4], ['data' => '2023-01-15'], ['estado' => 'não entregue']);
    }

}
