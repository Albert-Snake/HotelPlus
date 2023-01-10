<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

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
        
     }
}
