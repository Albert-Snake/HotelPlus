<?php
namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class ReservarEstadiaCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
    }

    protected function formParamsLogin($username, $password)
    {
        return [
            'LoginForm[username]' => $username,
            'LoginForm[password]' => $password,
        ];
    }

    protected function formParamsReserva($dataInicio, $dataTermo)
    {
        return [
            'Estadias[dataInicio]' => $dataInicio,
            'Estadias[dataTermo]' => $dataTermo,
        ];
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->seeLink('Iniciar Sessão');
        $I->click('Iniciar Sessão');

        $I->submitForm('#login-form', $this->formParamsLogin('TESTE', '123456789'));

        $I->wait(3);
//        $I->see('Logout (TESTE)', '.btn-link');

        $I->seeLink('Estadias');
        $I->click('Estadias');

        $I->wait(3);

        $I->seeLink('Reservar');
        $I->click('Reservar');

        $I->wait(3);

        $I->see('Ver todos os Quartos');
        $I->click('Ver todos os Quartos');

        $I->wait(3);

        $I->seeLink('Fazer Reserva 📖');
        $I->click('Fazer Reserva 📖');

        $I->wait(3);

        $I->submitForm('#w0', $this->formParamsReserva('10/01/2023', '12/01/2023'));

        $I->see('Guardar');
        $I->click('Guardar');

        $I->wait(3);

        $I->see('Estadias', 'h1');

    }
}
