<?php


namespace common\tests;

use common\models\Cardapio;

class CardapioTest extends \Codeception\Test\Unit
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
        $cardapios = new Cardapio();

        //Campo categoria
        $cardapios->categoria = null;
        $this->assertFalse($cardapios->validate(['categoria']));
        $cardapios->categoria = 7;
        $this->assertFalse($cardapios->validate(['categoria']));
        $cardapios->categoria = "Carne";
        $this->assertTrue($cardapios->validate(['categoria']));

        //Campo nome
        $cardapios->nome = 6;
        $this->assertFalse($cardapios->validate(['nome']));
        $cardapios->nome = null;
        $this->assertFalse($cardapios->validate(['nome']));
        $cardapios->nome = "Bolo";
        $this->assertTrue($cardapios->validate(['nome']));

        //Campo descricao
        $cardapios->descricao = 5;
        $this->assertFalse($cardapios->validate(['descricao']));
        $cardapios->descricao = null;
        $this->assertFalse($cardapios->validate(['descricao']));
        $cardapios->descricao = "Bolo recheado";
        $this->assertTrue($cardapios->validate(['descricao']));

        //Campo valor
        $cardapios->valor = null;
        $this->assertFalse($cardapios->validate(['valor']));
        $cardapios->valor = "teste";
        $this->assertFalse($cardapios->validate(['valor']));
        $cardapios->valor = 10;
        $this->assertTrue($cardapios->validate(['valor']));
    }

    public function testInsertCardapio(){
        $cardapios = new Cardapio();

        $cardapios->categoria = "Sobremesas";
        $cardapios->nome = "Bolo";
        $cardapios->descricao = "Bolo recheado";
        $cardapios->valor = 5;
        $cardapios->save();

        $this->tester->seeRecord('common\models\Cardapio', ['categoria' => 'Sobremesas'], ['nome' => 'Bolo'],
            ['descricao' => 'Bolo recheado'], ['valor' => 5]);
    }

    public function testAlterCardapio(){
        $cardapios = new Cardapio();

        $cardapios->categoria = "Carne";
        $cardapios->nome = "Bitoque";
        $cardapios->descricao = "Bife de Vaca";
        $cardapios->valor = 7.5;
        $cardapios->save();

        $cardapio = Cardapio::find()
            ->where(['categoria' => 'Carne', 'nome' => 'Bitoque', 'descricao' => 'Bife de Vaca', 'valor' => 7.5])
            ->one();

        $cardapio->categoria = "Peixe";
        $cardapio->descricao = "Bife de Vaca, arroz e ovo estrelado";
        $cardapio->valor = 9.5;
        $cardapio->save();


        $this->tester->seeRecord('common\models\Cardapio', ['categoria' => 'Peixe'], ['nome' => 'Bitoque'],
            ['descricao' => 'Bife de Vaca, arroz e ovo estrelado'], ['valor' => 9.5]);

        $this->tester->dontSeeRecord('common\models\Cardapio', ['categoria' => 'Carne'], ['nome' => 'Bitoque'],
            ['descricao' => 'Bife de Vaca'], ['valor' => 7.5]);
    }

    public function testDeleteCardapio(){
        $cardapios = new Cardapio();

        $cardapios->categoria = "Peixe";
        $cardapios->nome = "Bacalhau";
        $cardapios->descricao = "Bacalhau com batatas";
        $cardapios->valor = 10;
        $cardapios->save();

        $cardapio = Cardapio::find()
            ->where(['categoria' => 'Peixe', 'nome' => 'Bacalhau', 'descricao' => 'Bacalhau com batatas', 'valor' => 10])
            ->one();

        $cardapio->delete();

        $this->tester->dontSeeRecord('common\models\Cardapio', ['categoria' => 'Peixe'], ['nome' => 'Bacalhau'],
            ['descricao' => 'Bacalhau com batatas'], ['valor' => 10]);
    }


}
