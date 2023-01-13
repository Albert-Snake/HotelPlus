<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class AboutContactCest
{
    public function _before(FunctionalTester $I)
    {
        
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->click('Iniciar Sessão');
        $I->fillField('Username', 'Alberto');
        $I->fillField('Password', '123456789');
        $I->click('login-button');
        $I->click('Sobre');
        $I->click('Contactos');
        
        
    }
}
