<?php

namespace common\tests;

use common\models\Limpezas;

class LimpezasTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */

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
        $limpezas = new Limpezas();

        //Campo idColaborador
        $limpezas->idColaborador = "teste";
        $this->assertFalse($limpezas->validate(['idColaborador']));
        $limpezas->idColaborador = null;
        $this->assertFalse($limpezas->validate(['idColaborador']));
        $limpezas->idColaborador = 7;
        $this->assertTrue($limpezas->validate(['idColaborador']));

        //Campo idCliente
        $limpezas->idCliente = "teste";
        $this->assertFalse($limpezas->validate(['idCliente']));
        $limpezas->idCliente = null;
        $this->assertFalse($limpezas->validate(['idCliente']));
        $limpezas->idCliente = 6;
        $this->assertTrue($limpezas->validate(['idCliente']));

        //Campo idQuarto
        $limpezas->idQuarto = "teste";
        $this->assertFalse($limpezas->validate(['idQuarto']));
        $limpezas->idQuarto = null;
        $this->assertFalse($limpezas->validate(['idQuarto']));
        $limpezas->idQuarto = 303;
        $this->assertTrue($limpezas->validate(['idQuarto']));

        //Campo data
        $limpezas->data = null;
        $this->assertFalse($limpezas->validate(['data']));
        $limpezas->data = "2023-01-05 00:00:00";
        $this->assertTrue($limpezas->validate(['data']));

        //Campo estado
        $limpezas->estado = null;
        $this->assertFalse($limpezas->validate(['estado']));
        $limpezas->estado = 1;
        $this->assertFalse($limpezas->validate(['estado']));
        $limpezas->estado = "limpo";
        $this->assertTrue($limpezas->validate(['estado']));

        //Campo perturbar
        $limpezas->perturbar = null;
        $this->assertFalse($limpezas->validate(['perturbar']));
        $limpezas->perturbar = 1;
        $this->assertFalse($limpezas->validate(['perturbar']));
        $limpezas->perturbar = "Perturbar";
        $this->assertTrue($limpezas->validate(['perturbar']));

    }

    public function testInsertLimpeza(){
        $limpezas = new Limpezas();

        $limpezas->idColaborador = 7;
        $limpezas->idCliente = 6;
        $limpezas->idQuarto = 304;
        $limpezas->data = "2022-01-14 12:30:00";
        $limpezas->estado = "limpo";
        $limpezas->perturbar = "Perturbar";
        $limpezas->save();

        $this->tester->seeRecord('common\models\Limpezas', ['idColaborador' => 7], ['idCliente' => 6],
            ['idQuarto' => 304], ['data' => '2022-01-14 12:30:00'], ['estado' => 'limpo'], ['perturbar' => 'Perturbar']);
    }

    public function testAlterLimpeza(){
        $limpezas = new Limpezas();

        $limpezas->idColaborador = 7;
        $limpezas->idCliente = 6;
        $limpezas->idQuarto = 304;
        $limpezas->data = "2023-01-09 00:00:00";
        $limpezas->estado = "limpo";
        $limpezas->perturbar = "Perturbar";
        $limpezas->save();

        $limpeza = Limpezas::find()
            ->where(['idColaborador' => 7, 'idCliente' => 6, 'idQuarto' => 304, 'data' => '2023-01-09 00:00:00'])
            ->one();

        $limpeza->idColaborador = 8;
        $limpeza->estado = "por limpar";
        $limpeza->save();


        $this->tester->seeRecord('common\models\Limpezas', ['idColaborador' => 8], ['idCliente' => 6],
            ['idQuarto' => 303], ['data' => '2022-01-14 12:30:00'], ['estado' => 'por limpar'], ['perturbar' => 'Perturbar']);

        $this->tester->dontSeeRecord('common\models\Limpezas', ['idColaborador' => 9], ['idCliente' => 6],
            ['idQuarto' => 303], ['data' => '2022-01-14 12:30:00'], ['estado' => 'limpo'], ['perturbar' => 'Perturbar']);
    }

    public function testDeleteLimpeza(){
        $limpezas = new Limpezas();

        $limpezas->idColaborador = 7;
        $limpezas->idCliente = 6;
        $limpezas->idQuarto = 303;
        $limpezas->data = "2023-01-09 00:00:00";
        $limpezas->estado = "limpo";
        $limpezas->perturbar = "Perturbar";
        $limpezas->save();

        $limpeza = Limpezas::find()
            ->where(['idColaborador' => 7, 'idCliente' => 6, 'idQuarto' => 303, 'data' => '2023-01-09 00:00:00',
                'estado' => 'limpo', 'perturbar' => 'Perturbar'])
            ->one();

        $limpeza->delete();

        $this->tester->dontSeeRecord('common\models\Limpezas', ['idColaborador' => 8], ['idCliente' => 6],
            ['idQuarto' => 303], ['data' => '2022-01-14 12:30:00'], ['estado' => 'limpo'], ['perturbar' => 'Perturbar']);
    }


}
