<?php

namespace common\tests;

use common\models\Quartos;

class QuartosTest extends \Codeception\Test\Unit
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
        $quartos = new Quartos();

        //Campo id
        $quartos->id = "teste";
        $this->assertFalse($quartos->validate(['id']));
        $quartos->id = null;
        $this->assertFalse($quartos->validate(['id']));
        $quartos->id = 1;
        $this->assertTrue($quartos->validate(['id']));

        //Campo lotacao
        $quartos->lotacao = "teste";
        $this->assertFalse($quartos->validate(['lotacao']));
        $quartos->lotacao = null;
        $this->assertFalse($quartos->validate(['lotacao']));
        $quartos->lotacao = 1;
        $this->assertTrue($quartos->validate(['lotacao']));

        //Campo nrCamas
        $quartos->nrCamas = "teste";
        $this->assertFalse($quartos->validate(['nrCamas']));
        $quartos->nrCamas = null;
        $this->assertFalse($quartos->validate(['nrCamas']));
        $quartos->nrCamas = 1;
        $this->assertTrue($quartos->validate(['nrCamas']));

        //Campo nrCasasBanho
        $quartos->nrCasasBanho = "teste";
        $this->assertFalse($quartos->validate(['nrCasasBanho']));
        $quartos->nrCasasBanho = null;
        $this->assertFalse($quartos->validate(['nrCasasBanho']));
        $quartos->nrCasasBanho = 1;
        $this->assertTrue($quartos->validate(['nrCasasBanho']));

        //Campo acessoDef
        $quartos->acessoDef = null;
        $this->assertFalse($quartos->validate(['acessoDef']));
        $quartos->acessoDef = 1;
        $this->assertFalse($quartos->validate(['acessoDef']));
        $quartos->acessoDef = "sim";
        $this->assertTrue($quartos->validate(['acessoDef']));

        //Campo valorNoite
        $quartos->valorNoite = "teste";
        $this->assertFalse($quartos->validate(['valorNoite']));
        $quartos->valorNoite = null;
        $this->assertFalse($quartos->validate(['valorNoite']));
        $quartos->valorNoite = 200.50;
        $this->assertTrue($quartos->validate(['valorNoite']));

    }

    public function testInsertUserPackage(){
        $quartos = new Quartos();

        $quartos->id = 1;
        $quartos->lotacao = 2;
        $quartos->nrCamas = 2;
        $quartos->nrCasasBanho = 1;
        $quartos->acessoDef = "não";
        $quartos->valorNoite = 150;
        $quartos->save();

        $this->tester->seeRecord('common\models\Quartos', ['id' => 1], ['lotacao' => 2], ['nrCamas' => 2],
            ['nrCasasBanho' => 1], ['acessoDef' => 'não'], ['valorNoite' => 150]);
    }

    public function testAlterUserPackage(){
        $quartos = new Quartos();

        $quartos->id = 1;
        $quartos->lotacao = 4;
        $quartos->nrCamas = 2;
        $quartos->nrCasasBanho = 2;
        $quartos->acessoDef = "sim";
        $quartos->valorNoite = 200;
        $quartos->save();

        $quarto = Quartos::find()
            ->where(['id' => 1])
            ->one();

        $quarto->id = 2;
        $quarto->lotacao = 2;
        $quarto->valorNoite = 100;
        $quarto->save();


        $this->tester->seeRecord('common\models\Quartos', ['id' => 2], ['lotacao' => 2], ['nrCamas' => 2],
            ['nrCasasBanho' => 2], ['acessoDef' => 'sim'], ['valorNoite' => 100]);

        $this->tester->dontSeeRecord('common\models\Quartos', ['id' => 1], ['lotacao' => 4], ['nrCamas' => 2],
            ['nrCasasBanho' => 2], ['acessoDef' => 'sim'], ['valorNoite' => 200]);
    }

    public function testDeleteUserPackage(){
        $quartos = new Quartos();

        $quartos->id = 1;
        $quartos->lotacao = 3;
        $quartos->nrCamas = 2;
        $quartos->nrCasasBanho = 1;
        $quartos->acessoDef = "não";
        $quartos->valorNoite = 150;
        $quartos->save();

        $quarto = Quartos::find()
            ->where(['id' => 1])
            ->one();

        $quarto->delete();

        $this->tester->dontSeeRecord('common\models\Quartos', ['id' => 1], ['lotacao' => 3], ['nrCamas' => 2],
            ['nrCasasBanho' => 2], ['acessoDef' => 'não'], ['valorNoite' => 150]);
    }


}
