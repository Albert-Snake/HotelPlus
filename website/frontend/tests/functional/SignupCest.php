<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnRoute(\Yii::$app->homeUrl);
        $I->click('Registar');
        $I->fillField('SignupForm[username]','teste');
        $I->fillField('SignupForm[email]','teste@gmail.pt');
        $I->fillField('SignupForm[nome]','Teste');
        $I->fillField('SignupForm[apelido]','Testes');
        $I->fillField('SignupForm[nif]',919191919);
        $I->fillField('SignupForm[telefone]',987654321);        
        $I->fillField('SignupForm[password]','password_teste');
        $I->click('signup-button');
    }
}
