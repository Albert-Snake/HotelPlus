<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class ChangeProfileCest
{
    public function _before(FunctionalTester $I)
    {
        /*$I->amLoggedInAs(5);
        $I->amOnPage('user/index/');*/
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->click('Iniciar Sessão');
        $I->fillField('Username', 'Alberto');
        $I->fillField('Password', '123456789');
        $I->click('login-button');
        $I->click('Perfil');
        $I->click('Editar');
        $I->fillField('Email','albertocorreia@mail.com');
        $I->click('Guardar');
        
    }
}
